<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query and price filter from the request
        $query = $request->input('query');
        $price = $request->input('price');
    
        // Start with the base query for all tours
        $tours = Tour::query();
    
        // If there's a search query, filter by title or description
        if ($query) {
            $tours = $tours->where('title', 'like', "%$query%")
                           ->orWhere('description', 'like', "%$query%");
        }
    
        // If there's a price filter, filter by price
        if ($price) {
            $tours = $tours->where('price', '<=', $price);
        }
    
        // Apply pagination after filtering
        $tours = $tours->paginate(10);
    
        // Return the view with the filtered or all tours
        return view('admin.tours.index', compact('tours'));
    }
    

    public function create()
    {
        return view('admin.tours.create');
    }

    public function store(Request $request)
{
    // Validate incoming data
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'location' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // If validation fails, the above code will automatically redirect back with errors
    // No need to manually check validation errors in this case

    // Create a new tour instance
    $tour = new Tour();
    $tour->title = $request->input('title');
    $tour->description = $request->input('description');
    $tour->price = $request->input('price');
    $tour->location = $request->input('location');
    
    // Handle image upload if provided
    if ($request->hasFile('image')) {
        try {
            $tour->image = $request->file('image')->store('tour_images');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['image' => 'Error uploading the image. Please try again.']);
        }
    }

    // Save the tour to the database
    try {
        $tour->save();
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['database' => 'Error saving the tour. Please try again.']);
    }

    // Redirect back with a success message
    return redirect()->route('admin.tours.index')->with('success', 'Tour created successfully!');
}


    public function edit($id)
    {
        $tour = Tour::findOrFail($id);
        return view('admin.tours.edit', compact('tour'));
    }

    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'location' => 'required',
            'image' => 'nullable|image',
        ]);

        $tour->title = $request->title;
        $tour->description = $request->description;
        $tour->price = $request->price;
        $tour->location = $request->location;
        
        // Handle image update
        if ($request->hasFile('image')) {
            $tour->image = $request->file('image')->store('tour_images');
        }

        $tour->save();

        return redirect()->route('admin.tours.index')->with('success', 'Tour updated successfully!');
    }

    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->delete();
        return redirect()->route('admin.tours.index')->with('success', 'Tour deleted successfully!');
    }

    public function search(Request $request)
    {
        // Get the search query from the form
        $query = $request->input('query');
    
        // Search the tours based on the title or description
        $tours = Tour::where('title', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%")
                    ->get();
    
        // Return the results as a JSON response
        if ($tours->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No tours found'
            ]);
        }
    
        return response()->json([
            'success' => true,
            'tours' => $tours
        ]);
    }
    public function bookTour(Request $request)
    {
        // Handle the booking here (save it to the database, etc.)
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'destination' => 'required|string',
            'tour_id' => 'required|exists:tours,id',
            'date' => 'required|date',
            'special_requests' => 'nullable|string',
        ]);

        // You could store the booking in a database if necessary
        // Booking::create($validated);
        
        return response()->json(['success' => true, 'message' => 'Booking successful!']);
    }
    public function showBookingForm()
    {
        // Fetch all tours from the database
        $tours = Tour::all();
        
        // Pass tours to the view
        return view('booking', compact('tours'));  // Passes $tours to the booking view
    }
    

}
