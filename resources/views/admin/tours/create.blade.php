<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form method="POST" action="{{ route('admin.tours.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-6">
                        <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                        <input type="text" id="title" name="title" class="form-control mt-2 p-2 w-full border border-gray-300 rounded-md" required>
                    </div>

                    <div class="form-group mb-6">
                        <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" class="form-control mt-2 p-2 w-full border border-gray-300 rounded-md" required></textarea>
                    </div>

                    <div class="form-group mb-6">
                        <label for="price" class="block text-lg font-medium text-gray-700">Price</label>
                        <input type="number" id="price" name="price" class="form-control mt-2 p-2 w-full border border-gray-300 rounded-md" required>
                    </div>

                    <div class="form-group mb-6">
                        <label for="location" class="block text-lg font-medium text-gray-700">Location</label>
                        <input type="text" id="location" name="location" class="form-control mt-2 p-2 w-full border border-gray-300 rounded-md" required>
                    </div>

                    <div class="form-group mb-6">
                        <label for="image" class="block text-lg font-medium text-gray-700">Image</label>
                        <input type="file" id="image" name="image" class="form-control mt-2 p-2 w-full border border-gray-300 rounded-md">
                    </div>

                    <button type="submit" class="btn btn-create mt-4 px-6 py-3 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 transition duration-300">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* General Form Styles */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-control {
        padding: 0.75rem;
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        font-size: 1rem;
        color: #333;
        background-color: #ffffff;
    }

    .form-control:focus {
        outline: none;
        border-color: #4caf50;
        box-shadow: 0 0 0 1px rgba(76, 175, 80, 0.5);
    }

    /* Button Styles */
    .btn-create {
        background-color: #4caf50;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        display: inline-block;
        padding: 10px 20px;
        transition: background-color 0.3s ease;
    }

    .btn-create:hover {
        background-color: #45a049;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-control {
            padding: 0.6rem;
        }

        .btn-create {
            padding: 12px 24px;
        }
    }
</style>
