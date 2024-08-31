<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI-BANDID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="mt-5">
        <div class="container">
            @foreach ($getActivityData as $data)
                <p class="fs-3">{{ $data->name }}</p>
                <p class="fs-6">{{ $data->description }}</p>
                <p class="fs-6">{{ $data->date }}</p>
                <button class="btn btn-outline-primary"
                    onclick="saveTheDate('{{ $data->name }}', '{{ $data->date }}')">Save The Date</button>
            @endforeach
        </div>
        <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    </section>
    <script>
        function saveTheDate(title, startDate, endDate) {
            const start = new Date(startDate);
            // const end = new Date(endDate);

            const event = {
                title: title,
                start: start,
                // end: end,
                description: 'Save the date for this event!',
            };

            // Format dates for Google Calendar URL
            const formatDate = (date) => {
                return date.toISOString().replace(/-|:|\.\d+/g, '').slice(0, 15) + 'Z';
            };

            // Create Google Calendar URL
            const url =
                `https://calendar.google.com/calendar/r/eventedit?text=${encodeURIComponent(event.title)}&dates=${formatDate(start)}/&details=${encodeURIComponent(event.description)}`;

            // Open the URL in a new tab
            window.open(url, '_blank');
        }
    </script>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
