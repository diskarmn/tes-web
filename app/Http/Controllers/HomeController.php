<?php

namespace App\Http\Controllers;

use App\Models\TabelBarang;
use Illuminate\Http\Request;
use App\Models\HasilResponse;
use App\Models\TabelSatuanBarang;
use Illuminate\Support\Facades\DB;
use App\Models\TabelKategoriBarang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller

{
    public function home(){
        if (auth()->check()) {
            $title = "home";
            $user = Auth::user()->name;
            $data = DB::table('hasil_responses')
                    ->join('jenis_kelamin', 'hasil_responses.jenis_kelamin', '=', 'jenis_kelamin.id')
                    ->join('tabel_profesi', 'hasil_responses.profesi', '=', 'tabel_profesi.id')
                    ->select('hasil_responses.id', 'jenis_kelamin.jenis_kelamin', 'hasil_responses.nama',
                     'hasil_responses.nama_jalan', 'hasil_responses.email', 'tabel_profesi.nama_profesi')
                     ->simplePaginate(5);
            $profesi = DB::table('hasil_responses')
                     ->join('jenis_kelamin', 'hasil_responses.jenis_kelamin', '=', 'jenis_kelamin.id')
                     ->join('tabel_profesi', 'hasil_responses.profesi', '=', 'tabel_profesi.id')
                     ->select('tabel_profesi.nama_profesi', DB::raw('COUNT(*) as jumlah'))
                     ->groupBy('tabel_profesi.nama_profesi')
                     ->get();


            return view('index', ['title' => $title, 'data' => $data,'profesi'=>$profesi,'user'=>$user]);
        } else {
            return redirect()->route('login');
        }
    }

    public function RandomUser(){
        $response = Http::get('https://randomuser.me/api/');
        $jenisKelamin = $response['results'][0]['gender'] == 'female' ? 2 : 1;
        $nama = $response['results'][0]['name']['first'] . ' ' . $response['results'][0]['name']['last'];
        $namaJalan = $response['results'][0]['location']['street']['name'];
        $email = $response['results'][0]['email'];
        $plainJson = json_encode($response);
        $angkaKurang = substr_count(md5($plainJson), '0') +
                        substr_count(md5($plainJson), '1') +
                        substr_count(md5($plainJson), '2') +
                        substr_count(md5($plainJson), '3') +
                        substr_count(md5($plainJson), '4') +
                        substr_count(md5($plainJson), '5') +
                        substr_count(md5($plainJson), '6');
        $angkaLebih = substr_count(md5($plainJson), '8') +
                       substr_count(md5($plainJson), '9');
          $profesi = rand(1, 5);


        HasilResponse::create([
            'jenis_kelamin' => $jenisKelamin,
            'nama' => $nama,
            'nama_jalan' => $namaJalan,
            'email' => $email,
            'angka_kurang' => $angkaKurang,
            'angka_lebih' => $angkaLebih,
            'profesi' => $profesi,
            'plain_json' => $plainJson
        ]);
        return redirect()->back();
        // return response()->json(['message' => 'Data has been saved successfully']);
    }
    public function RandomUserBanyak(){
        $responses = Http::get('https://randomuser.me/api/?results=25')['results'];

        foreach ($responses as $response) {
            $jenisKelamin = $response['gender'] == 'female' ? 2 : 1;
            $nama = $response['name']['first'] . ' ' . $response['name']['last'];
            $namaJalan = $response['location']['street']['name'];
            $email = $response['email'];
            $plainJson = json_encode($response);
            $angkaKurang = substr_count(md5($plainJson), '0') +
                            substr_count(md5($plainJson), '1') +
                            substr_count(md5($plainJson), '2') +
                            substr_count(md5($plainJson), '3') +
                            substr_count(md5($plainJson), '4') +
                            substr_count(md5($plainJson), '5') +
                            substr_count(md5($plainJson), '6');
            $angkaLebih = substr_count(md5($plainJson), '8') +
                            substr_count(md5($plainJson), '9');
            $profesi = rand(1, 5);

            HasilResponse::create([
                'jenis_kelamin' => $jenisKelamin,
                'nama' => $nama,
                'nama_jalan' => $namaJalan,
                'email' => $email,
                'angka_kurang' => $angkaKurang,
                'angka_lebih' => $angkaLebih,
                'profesi' => $profesi,
                'plain_json' => $plainJson
            ]);
        }

        return redirect()->back();
    }



    public function barang()
    {
        $title = "Barang";
        $id_user = Auth::id();
        $user = Auth::user()->name;
        $kategori_barang = TabelKategoriBarang::all();
        $satuan_barang = TabelSatuanBarang::all();
        $barang = TabelBarang::join('tabel_kategori_barang', 'tabel_barang.kd_kategori', '=', 'tabel_kategori_barang.kode')
            ->join('tabel_satuan_barang', 'tabel_barang.kd_satuan', '=', 'tabel_satuan_barang.kode')
            ->select('tabel_barang.*', 'tabel_kategori_barang.nama as nama_kategori','tabel_satuan_barang.nama as nama_satuan')
            ->get();


        return view('barang', compact('title', 'kategori_barang', 'satuan_barang','id_user','barang','user'));
    }
    public function tambahbarang(Request $request){
        $request->validate([
            'kategori' => 'required',
            'satuan' => 'required',
            'kode' => 'required|unique:tabel_barang,kode_barang|min:2|max:6',
            'nama' => 'required|unique:tabel_barang,nama|min:2|max:20',
            'jumlah' => 'nullable|integer|min:0|max:100',
            'id' => 'nullable|integer',
        ]);
        // dd($request->all());
        $barang = new TabelBarang();
        $barang->kd_kategori = $request->kategori;
        $barang->kd_satuan = $request->satuan;
        $barang->kode_barang = $request->kode;
        $barang->nama = $request->nama;
        $barang->jumlah = $request->jumlah;
        $barang->id_user_insert = $request->id;
        $barang->save();

        return redirect()->back()->with('success', 'Data barang berhasil ditambahkan');
    }

}
