<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
| Routes are loaded by the RouteServiceProvider.
|
*/

// Home Route
Route::get('/', function () {
    return view('website'); // Points to website.blade.php for homepage
})->name('home');

// Booking Route
Route::get('/booking', function () {
    return view('booking'); // Points to booking.blade.php for booking page
})->name('booking');

// Contact Route
Route::get('/contact', function () {
    return view('contact'); // Points to contact.blade.php for contact page
})->name('contact');

// Contact Route
Route::get('/adminpanel', function () {
    return view('adminpanel'); // Points to contact.blade.php for admin panel page
})->name('adminpanel');



use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function() {
        Route::resource('tours', TourController::class);
    });
    Route::get('/search-tours', [TourController::class, 'search'])->name('tour.search');
   

    Route::post('/book-tour', [TourController::class, 'bookTour'])->name('tour.book');
    use App\Http\Controllers\BookingController;
    Route::get('views/booking', [TourController::class, 'showBookingForm'])->name('booking.form');
    Route::post('/book-tour', [TourController::class, 'bookTour'])->name('book.tour');

// Route to handle the booking form submission
Route::post('/bookings', [TourController::class, 'store'])->name('tour.store');
Route::middleware('auth')->group(function () {
    Route::get('tour/{tourId}/book', [BookingController::class, 'showBookingForm'])->name('tour.book');
    Route::post('tour/book', [BookingController::class, 'storeBooking'])->name('tour.store');
    Route::get('booking/success', [BookingController::class, 'bookingSuccess'])->name('booking.success');
});

// Profile Routes (Only accessible to authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';