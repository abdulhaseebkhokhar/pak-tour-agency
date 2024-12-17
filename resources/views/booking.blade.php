<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="{{ asset('css/website.css') }}">
</head>

<body>
@include('partials.header')

    <section id="booking">
        <h2>Booking</h2>
        <form action="{{ route('book.tour') }}" method="POST">
        @csrf
            <!-- User Information -->
            <input type="text" id="name" name="name" placeholder="Your Name" required>
            <input type="email" id="email" name="email" placeholder="Your Email" required>

            <!-- Select Destination -->
            <label for="destination">Destination:</label>
            <select id="destination" name="destination" required>
                <option value="" disabled selected>Select a destination</option>
                <option value="Skardu">Skardu</option>
                <option value="Murree">Murree</option>
                <option value="Hunza">Hunza</option>
            </select>

           
            </select>

            <!-- Booking Details -->
            <input type="date" id="date" name="booking_date" required>
            <input type="number" id="number_of_people" name="number_of_people" placeholder="Number of People" required min="1">

            <!-- Special Requests -->
            <textarea id="special-requests" name="special_requests" placeholder="Special Requests" rows="5"></textarea>

            <!-- Submit Button -->
            <button type="submit">Book Now</button>
            </form>
        
        <!-- Success Message -->
        <div id="success-message" style="display:none; margin-top: 20px; color: green;">
            Your booking has been successfully submitted!
        </div>
    </section>

@include('partials.footer')

<script>
    // Handle form submission
    document.getElementById('booking-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        // Get form values
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const destination = document.getElementById('destination').value;
        const tour = document.getElementById('tour').value;
        const date = document.getElementById('date').value;
        const specialRequests = document.getElementById('special-requests').value;
        const numberOfPeople = document.getElementById('number_of_people').value;

        // Validate form data
        if (name && email && destination && tour && date && numberOfPeople) {
            // Display success message
            document.getElementById('success-message').style.display = 'block';

            // Clear form fields
            document.getElementById('booking-form').reset();
        } else {
            alert('Please fill out all required fields.');
        }
    });
    
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        let formData = new FormData(this);
        
        fetch("{{ route('book.tour') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                // You can redirect to a success page or clear the form
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });




</body>
</html>
