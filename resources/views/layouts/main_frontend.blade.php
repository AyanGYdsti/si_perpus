<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>{{ $title }}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#0053A0">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">SI-PERPUS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active  text-white" aria-current="page" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="/buku">Buku</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="/login" class="btn btn-outline-light" type="submit">Login</a>
                </form>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer style="background-color:#0053A0">
        <div class="row p-5 text-white">
            <div class="col-4">
                <h1>Tentang Kami</h1>
                <p>Perpustakaan Digital Fakultas Matematika dan Ilmu Pengetahuan Alam Universitas Halu Oleo</p>
            </div>
            <div class="col-4">
                <h1>Kontak Kami</h1>
                <p>Kambu, kendari City, South East Sulawesi 93561 <br>
                    Telpon: xxx-xxxx-xxxx <br>
                    Email : xxxxxxx@gmail.com</p>
            </div>
            <div class="col-4">
                <h1>Maps</h1>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.0757468040033!2d122.51935977497533!3d-4.004850695968871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d988d691442e5fb%3A0x656989bb890a260a!2sFakultas%20Matematika%20dan%20Ilmu%20Pengetahuan%20Alam%20(F-MIPA)%20UHO!5e0!3m2!1sid!2sid!4v1728709791747!5m2!1sid!2sid"
                    width="350" height="220" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @stack('scripts')
</body>

</html>