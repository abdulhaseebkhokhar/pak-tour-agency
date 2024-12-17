<nav class="navbar">
    <img src="images/newlogo.png" alt="logo"> <!-- Replace with your logo URL -->
        <h1 class="logo">FROM MOUNTAINS TO DESERTS</h1>
        <ul class="nav-list">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('booking') }}">Booking</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
           
            <li>@if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        <li>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
</li>
        </ul>
    </nav>
