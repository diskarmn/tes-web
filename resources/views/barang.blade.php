<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f2a54a3122.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <title>{{ $title }}</title>
</head>

<body>
    <div class="container p-5">
        <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
        </div>
    <h1>{{ $title }} saat ini</h1>

    @if ($barang)
    <table class="table"  data-aos="zoom-in" data-aos-easing="ease-in-back" data-aos-delay="150" data-aos-offset="0">
        <thead>
          <tr>
            <th scope="col">no</th>
            <th scope="col">satuan</th>
            <th scope="col">kategori</th>
            <th scope="col">kode</th>
            <th scope="col">nama</th>
            <th scope="col">jumlah</th>
            <th scope="col">id akun</th>
          </tr>
        </thead>
        <tbody>
            @foreach($barang as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>

                <td>{{ $item->nama_satuan  }}</td>
                <td>{{ $item->nama_kategori  }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->id_user_insert }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @else
        <p>Tidak ada barang yang tersedia.</p>
    @endif
    <form action="{{ route('tambahbarang') }}" method="POST"  data-aos="fade-down">
        @csrf
        <div class="wadah">
            <div class="col-3 mb-3">
                <select class="form-select" aria-label="Default select example" name="kategori" required>
                    <option  selected>Kategori Barang</option>
                    @foreach ($kategori_barang as $kategori)
                        <option value="{{ $kategori->kode }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3 mb-1">
                <select class="form-select" aria-label="Default select example" name="satuan" required>
                    <option selected>Satuan Barang</option>
                    @foreach ($satuan_barang as $satuan)
                        <option value="{{ $satuan->kode }}">{{ $satuan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3 mb-1">
                <label for="kode">kode barang</label>
                    <input class="form-control form-control-sm" id="kode" name="kode" type="text" required
                        placeholder="kode" aria-label=".form-control-sm example">
            </div>
            <div class="col-3 mb-1">
                <label for="nama">nama barang</label>
                    <input class="form-control form-control-sm" id="nama" name="nama" type="text" required
                        placeholder="nama" aria-label=".form-control-sm example">
            </div>
            <div class="col-3">
                <label for="jumlah">jumlah</label>
                    <input class="form-control form-control-sm" id="jumlah" name="jumlah" type="number"
                        placeholder="jumlah" aria-label=".form-control-sm example">
            </div>
            <div class="col-3 mb-1">
                <label for="id">id user anda {{ $id_user }}</label>
                    <input class="form-control form-control-sm"  readonly id="id" name="id" type="number" value="{{ $id_user }}"
                        placeholder="id = {{ $id_user }}" aria-label=".form-control-sm example">
            </div>
        </div>
        <button type="submit" class=" btn btn-primary">Tambah Data</button>
    </form>
</div>
<div class="mt-3 position-absolute top-0 end-0" data-aos="fade-down">
    <div class="d-flex flex-column p-5 align-items-center justify-content-end">
        <div class="kanankiri d-flex flex-row">
            <i style="font-size:200%; " class="fa-solid fa-user"></i>
            <h2 class="text-secondary mx-1">{{ $user }}</h2>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
       <script>

        AOS.init();
        document.addEventListener("DOMContentLoaded", function () {
            var carousels = document.querySelectorAll('#carouselExampleFade');
            carousels.forEach(function (carousel) {
                new bootstrap.Carousel(carousel, {
                    interval: 2000
                });
            });
        });
    </script>
</body>

</html>
