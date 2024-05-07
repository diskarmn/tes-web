<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f2a54a3122.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Data Pengguna</h1>
        <a href="{{ route('barang') }}" class="btn btn-primary">Ke halaman Barang</a>



        <div class="card mt-3">
            <div class="card-body" data-aos="fade-down"   >
                @if ($data)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nama Jalan</th>
                                <th scope="col">Email</th>
                                <th scope="col">Profesi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nama_jalan }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->nama_profesi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $data->links() }}
                    </div>
                @else
                    <h1>data belum ada</h1>
                @endif
            </div>
        </div>


        <form method="POST"  data-aos="zoom-in" data-aos-easing="ease-in-back" data-aos-delay="150" data-aos-offset="0"
         action="{{ route('RandomUser') }}" class="mt-3">
            @csrf
            <p><b>klik tombol untuk menambah satu data secra acak</b>
            </p>
            <button type="submit" class="btn btn-primary">Klik</button>
        </form>
        <form method="POST" data-aos="zoom-in" data-aos-easing="ease-in-back" data-aos-delay="150" data-aos-offset="0"
         action="{{ route('RandomUserBanyak') }}" class="mt-3">
            @csrf
            <p><b>klik tombol untuk menambah 25 data acak sekaligus</b>
            </p>
            <button type="submit" class="btn btn-primary">Klik +25 </button>
        </form>
        @if($profesi)
        <table class="table table-bordered mt-5" data-aos="fade-down">
            <thead>
                <tr>
                    <th scope="col">Nama Profesi</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profesi as $item)
                    <tr>
                        <td>{{ $item->nama_profesi }}</td>
                        <td>{{ $item->jumlah }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>data belum ada</p>
        @endif





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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
