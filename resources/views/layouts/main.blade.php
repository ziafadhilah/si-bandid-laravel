<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI-BANDID</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Full height for sidebar */
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .wrapper {
            flex: 1;
            display: flex;
        }

        #sidebarMenu {
            height: 100vh;
            position: fixed;
            top: 0;
            bottom: 0;
        }

        main {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        #sidebarMenu .logout-btn {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }

        @media (max-width: 767.98px) {
            #sidebarMenu {
                display: none;
            }

            main {
                margin-left: 0;
            }

            .offcanvas {
                display: block;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar untuk tampilan mobile -->
    <nav class="navbar navbar-dark bg-dark d-md-none">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Sidebar untuk tampilan desktop -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
        <div class="position-sticky">
            <div class="d-flex justify-content-center me-md-auto pt-3 pb-3">
                <a href="/" class="text-decoration-none navbar-brand">
                    <span class="fs-3 text-white">SI-BANDID</span>
                </a>
            </div>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#pamSubmenu" role="button"
                        aria-expanded="false" aria-controls="pamSubmenu">
                        <i class="fas fa-edit"></i>
                        PAM
                    </a>
                    <div class="collapse" id="pamSubmenu">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{ url('/haljol') }}" class="nav-link ms-3">HALJOL</a></li>
                            <li><a href="{{ url('/haljol') }}" class="nav-link ms-3">LAP PAM TUBUH PER TW</a></li>
                            <li><a href="{{ url('/haljol') }}" class="nav-link ms-3">LAP ADMIN PER SMT</a></li>
                            <li><a href="{{ url('/haljol') }}" class="nav-link ms-3">SURAT MASUK</a></li>
                            <li><a href="{{ url('/haljol') }}" class="nav-link ms-3">SURAT KELUAR</a></li>
                            <li><a href="{{ url('/haljol') }}" class="nav-link ms-3">LAPSIT</a></li>
                            <li><a href="{{ url('/haljol') }}" class="nav-link ms-3">RENPAM</a></li>
                            <li><a href="{{ url('/haljol') }}" class="nav-link ms-3">BANGSUS</a></li>
                            <li><a href="{{ url('/haljol') }}" class="nav-link ms-3">LITPERS</a></li>
                            <li><a href="{{ url('/haljol') }}" class="nav-link ms-3">NODIS/PENGAJUAN</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-arrow-right-arrow-left"></i>
                        TER
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/activity') }}">
                        <i class="fas fa-calendar-alt"></i>
                        Kegiatan
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-start">
                            <i class="fas fa-power-off"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Offcanvas untuk tampilan mobile -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">SI-BANDID</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('haljol') }}">
                        HALJOL
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Integrations
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-start">
                            <span data-feather="log-out"></span> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    @yield('pagescript')
</body>

</html>
