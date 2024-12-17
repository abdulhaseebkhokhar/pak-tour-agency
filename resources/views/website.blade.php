<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Mountains To Deserts</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website.css') }}">
   
</head>

<body>
 
@include('partials.header')

    <header style="background-image: url('{{ asset('images/mountains.png') }}');">
        <div class="header-content">
            <h2>Discover Pakistan: Where Adventure Meets Culture</h2>
            <div class="line"></div>
            <h1>Your Journey Begins Here</h1>

        </div>
    </header>
         <!-- Search Bar Section -->
         <section id="search-bar" class="search-bar-container">
        <form id="search-form" class="search-form">
            <input type="text" name="query" id="search-input" placeholder="Search for a tour..." class="search-input" required>
            <button type="submit" class="search-btn">Search</button>
        </form>
    </section>

    <!-- Search Results Section -->
    <section class="search-results" id="search-results">
        <h3>Search Results:</h3>
        <ul id="results-list"></ul>
    </section>

  

    <section>
        <div class="title">
            <h1>Upcoming Events</h1>
            <div class="line"></div>
        </div>
        <div class="row">
            <div class="col">
                <img src="https://th.bing.com/th/id/OIP.5xsu5sUmzGyaPs7bMMPU9AHaE8?rs=1&pid=ImgDetMain.png" alt="K2 Camping Trip">
                <h4>K2 Camping Trip</h4>
                <p>15 days</p>
            </div>
            <div class="col">
                <img src="https://th.bing.com/th/id/OIP.QfME1oDlbXixlFssIu8gRgAAAA?rs=1&pid=ImgDetMain.png" alt="Kashmir Mountains Hiking">
                <h4>Kashmir Mountains Hiking</h4>
                <p>20 days</p>
            </div>
        </div>
    </section>

    <section id="about">
        <h2>About Us</h2>
        <p>We offer the best tours to explore the breathtaking landscapes and rich culture of Pakistan. Our experienced guides ensure you have an unforgettable adventure, whether you're hiking through the mountains or exploring the deserts. Join us for an experience of a lifetime!</p>
    </section>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // On form submission, perform AJAX request
            $('#search-form').on('submit', function (e) {
                e.preventDefault();

                var query = $('#search-input').val();

                // Check if query is not empty
                if (query.length > 0) {
                    $.ajax({
                        url: '{{ route("tour.search") }}',  // URL for the search
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function (response) {
                            if (response.success && response.tours.length > 0) {
                                var resultsHtml = '';
                                response.tours.forEach(function (tour) {
                                    resultsHtml += '<li>' + tour.title + ' - ' + tour.description + '</li>';
                                });

                                $('#results-list').html(resultsHtml);
                                $('#search-results').show();
                            } else {
                                $('#results-list').html('<li>No tours found</li>');
                                $('#search-results').show();
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                            $('#results-list').html('<li>Error occurred while searching. Please try again.</li>');
                            $('#search-results').show();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
