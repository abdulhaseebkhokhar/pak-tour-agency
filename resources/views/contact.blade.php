<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('css/website.css') }}">
</head>

<body>
@include('partials.header')
    <div class="contact-edit">
        <div class="row">
            <div class="col">
                <img src="images/contact1.webp" alt="Scenic view of Skardu">
            </div>
            <div class="col">
                <img src="images/contact2.jpg" alt="Beautiful mountains in Pakistan">
            </div>
            <div class="col">
                <img src="images/contact3.jfif" alt="Stunning landscape view">
            </div>
        </div>
    </div>

    <h2 style="color: aqua; font-size: 20px; font-family: Kaushan Script, cursive; padding: 2px;">Contact Info</h2>
    <div class="new">
        <p>Plot 104, Ground Floor, Al-Rehman View, Karachi, Pakistan</p>
        <p>Mobile: <strong>03211234567</strong><br>Email: <a href="haseebkhokhar56@gmail.com">haseebkhokhar56@gmail.com</a></p>
    </div>

    @include('partials.footer')
</body>

</html>
