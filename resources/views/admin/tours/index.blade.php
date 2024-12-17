<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tours</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">

    <!-- Header -->
    <header class="bg-gray-800 text-white p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h2 class="text-xl font-semibold">Manage Tours</h2>
            <a href="{{ route('admin.tours.create') }}" class="bg-green-500 px-6 py-3 text-white font-semibold rounded-md hover:bg-green-600 transition duration-300">
                Create Tour
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <!-- Search Bar -->
<div class="flex justify-between mb-4">
    <form id="search-form" method="GET" action="{{ route('admin.tours.index') }}" class="flex space-x-4">
        <input type="text" name="query" id="search-input" class="px-4 py-2 border border-gray-300 rounded-md" placeholder="Search for a tour..." value="{{ request('query') }}">
        
        <!-- Price Input Field -->
        <input type="number" name="price" id="price-input" class="px-4 py-2 border border-gray-300 rounded-md" placeholder="Max Price" value="{{ request('price') }}">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
            Search
        </button>
    </form>
</div>


                    <!-- Tours Table -->
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 border">Title</th>
                                <th class="px-4 py-2 border">Description</th>
                                <th class="px-4 py-2 border">Price</th>
                                <th class="px-4 py-2 border">Location</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tours as $tour)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $tour->title }}</td>
                                    <td class="px-4 py-2 border">{{ Str::limit($tour->description, 50) }}</td>
                                    <td class="px-4 py-2 border">{{ $tour->price }}</td>
                                    <td class="px-4 py-2 border">{{ $tour->location }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('admin.tours.edit', $tour->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $tours->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2024 Haseeb tourism</p>
        </div>
    </footer>

</body>
</html>
