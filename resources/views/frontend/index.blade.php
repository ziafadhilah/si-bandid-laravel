<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI-BANDID</title>
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
                <a class="navbar-brand" href="#">PAMUJI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/activity') }}">Activity</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav right-link">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="{{ url('#') }}">Copyright © Yon Arhanud 7/ABC</a>
                        </li>
                    </ul>
                       <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/users') }}">Users</a>
                        </li>
                    -->
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
                            <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($data->date)->format('d M Y') }}</small></p>
                            <button class="btn btn-outline-primary"
                                onclick="saveTheDate('{{ $data->name }}', '{{ $data->date }}')">Save The Date</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        function saveTheDate(title, startDate) {
            const start = new Date(startDate);
            const event = {
                title: title,
                start: start,
                description: 'Save the date for this event!',
            };

            const formatDate = (date) => {
                return date.toISOString().replace(/-|:|\.\d+/g, '').slice(0, 15) + 'Z';
            };

            const url =
                `https://calendar.google.com/calendar/r/eventedit?text=${encodeURIComponent(event.title)}&dates=${formatDate(start)}/&details=${encodeURIComponent(event.description)}`;

            window.open(url, '_blank');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
