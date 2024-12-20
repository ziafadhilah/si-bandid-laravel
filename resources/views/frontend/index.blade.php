<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CLANDESTINE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .right-link a {
            color: #000;
            text-decoration: none;
            padding: 5px 10px;
            transition: background-color 0.3s;
        }

        .right-link a:hover {
            background-color: #555;
            border-radius: 5px;
            color: white;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .navbar-nav .nav-item {
            align-items: center;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#">STAF INTEL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/activity') }}">AKTIVITAS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="{{ url('#') }}">PAM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="{{ url('#') }}">TER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="{{ url('#') }}">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="{{ url('#') }}">REGISTER</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav right-link">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="{{ url('#') }}">Copyright © Yon Arhanud 7/ABC</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="mt-5">
        <div class="container">
            <div class="row">
                <h2>DAFTAR KEGIATAN</h2>
                @foreach ($getActivityData->sortBy('date') as $data) <!-- Mengurutkan berdasarkan tanggal -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->name }}</h5>
                            <p class="card-text">{{ $data->description }}</p>
                            <p class="card-text">
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::parse($data->date)->format('d M Y') }} - 
                                    {{ \Carbon\Carbon::parse($data->enddate)->format('d M Y') }}
                                </small>
                            </p>
                            <button class="btn btn-outline-primary"
                                onclick="saveTheDate('{{ $data->name }}', '{{ $data->date }}', '{{ $data->enddate }}')">
                                Buat Pengingat
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        function saveTheDate(title, startDate, endDate) {
            const start = new Date(startDate);
            const end = new Date(endDate);
            const event = {
                title: title,
                start: start,
                end: end,  // Menggunakan tanggal selesai yang benar
                description: 'Simpan tanggal di kalender'
            };

            const formatDate = (date) => {
                return date.toISOString().replace(/-|:|\.\d+/g, '').slice(0, 15) + 'Z';
            };

            const url =
                `https://calendar.google.com/calendar/r/eventedit?text=${encodeURIComponent(event.title)}&dates=${formatDate(start)}/${formatDate(end)}&details=${encodeURIComponent(event.description)}`;

            window.open(url, '_blank');
        }
    </script>

    <!-- <script>
            // Fungsi untuk membuat elemen disabled menghindar dari kursor
        function makeDisabledLinksAvoidCursor() {
            const disabledLinks = document.querySelectorAll('.nav-link.disabled');

            disabledLinks.forEach(link => {
                link.addEventListener('mousemove', (e) => {
                    const rect = link.getBoundingClientRect();
                    const mouseX = e.clientX;
                    const mouseY = e.clientY;
                    const centerX = rect.left + rect.width / 2;
                    const centerY = rect.top + rect.height / 2;

                    // Hitung jarak antara kursor dan tengah elemen
                    const deltaX = mouseX - centerX;
                    const deltaY = mouseY - centerY;

                    // Tentukan jarak pergeseran
                    const moveX = deltaX > 0 ? 50 : -50;
                    const moveY = deltaY > 0 ? 30 : -30;

                    // Geser elemen dari posisi semula
                    link.style.transform = `translate(${moveX}px, ${moveY}px)`;
                });

                // Kembalikan posisi elemen ketika kursor keluar dari elemen
                link.addEventListener('mouseleave', () => {
                    link.style.transform = 'translate(0, 0)';
                });
            });
        }

        // Panggil fungsi ini setelah halaman dimuat
        document.addEventListener('DOMContentLoaded', makeDisabledLinksAvoidCursor);

    </script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
