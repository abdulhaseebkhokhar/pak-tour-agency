<!-- delete.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Deletion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">

    <!-- Header -->
    <header class="bg-gray-800 text-white p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h2 class="text-xl font-semibold">Confirm Deletion</h2>
            <a href="{{ route('admin.tours.index') }}" class="bg-gray-500 px-6 py-3 text-white font-semibold rounded-md hover:bg-gray-600 transition duration-300">
                Back to Tours
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Confirmation Message -->
                    <h3 class="text-2xl font-semibold mb-4">Are you sure you want to delete the tour?</h3>
                    <p class="mb-4">Once deleted, this action cannot be undone.</p>
                    
                    <div class="flex space-x-4">
                        <!-- Cancel Button -->
                        <a href="{{ route('admin.tours.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition duration-300">
                            Cancel
                        </a>

                        <!-- Delete Form -->
                        <form action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">
                                Delete Tour
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2024 Haseeb Tourism</p>
        </div>
    </footer>

</body>
</html>
