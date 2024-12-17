<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">

    <!-- Header -->
    <header class="bg-gray-800 text-white p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h2 class="text-xl font-semibold">Edit Tour</h2>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.tours.update', $tour->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="form-group mb-6">
                            <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                            <input type="text" id="title" name="title" value="{{ $tour->title }}" class="form-control mt-2 p-2 w-full border border-gray-300 rounded-md" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group mb-6">
                            <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" class="form-control mt-2 p-2 w-full border border-gray-300 rounded-md" required>{{ $tour->description }}</textarea>
                        </div>

                        <!-- Price -->
                        <div class="form-group mb-6">
                            <label for="price" class="block text-lg font-medium text-gray-700">Price</label>
                            <input type="number" id="price" name="price" value="{{ $tour->price }}" class="form-control mt-2 p-2 w-full border border-gray-300 rounded-md" required>
                        </div>

                        <!-- Location -->
                        <div class="form-group mb-6">
                            <label for="location" class="block text-lg font-medium text-gray-700">Location</label>
                            <input type="text" id="location" name="location" value="{{ $tour->location }}" class="form-control mt-2 p-2 w-full border border-gray-300 rounded-md" required>
                        </div>

                        <!-- Image -->
                        <div class="form-group mb-6">
                            <label for="image" class="block text-lg font-medium text-gray-700">Image</label>
                            <input type="file" id="image" name="image" class="form-control mt-2 p-2 w-full border border-gray-300 rounded-md">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="bg-blue-500 text-white px-6 py-3 font-semibold rounded-md hover:bg-blue-600 transition duration-300">
                            Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2024 Your Company Name</p>
        </div>
    </footer>

</body>
</html>
