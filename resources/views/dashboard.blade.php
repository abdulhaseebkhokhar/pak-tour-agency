<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Laravel') }}</title>
        <style>
            /* General Reset and Base Styles */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #f7fafc; /* Light background for the page */
                color: #333;  /* Dark text color for readability */
                line-height: 1.6;
            }

            /* Header Section */
            header {
                background-color: #ffffff; /* White background for the header */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                padding: 16px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            header h2 {
                font-size: 24px;
                color: #333;
            }

            /* Logout Button Styles */
            form button {
                padding: 10px 20px;
                background-color: #f44336; /* Red color */
                color: white;
                border: none;
                border-radius: 5px;
                font-weight: bold;
                cursor: pointer;
                transition: background-color 0.3s ease;
                text-align: center;
            }

            form button:hover {
                background-color: #d32f2f;
            }

            /* Main Content */
            main {
                padding: 40px 10px;
            }

            /* Admin Panel Section */
            .admin-panel-container h1 {
                font-size: 2rem;
                color: #333;
                text-align: center;
                margin-bottom: 30px;
            }

            /* Admin Table Section */
            .admin-table-section h2 {
                font-size: 1.5rem;
                color: #333;
                margin-bottom: 10px;
            }

            /* Tables Styling */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th, td {
                padding: 12px;
                border: 1px solid #e2e8f0;
                text-align: left;
            }

            th {
                background-color: #f7fafc;
                color: #333;
                font-weight: bold;
            }

            tr:hover {
                background-color: #f1f1f1;
            }

            /* Action Buttons in Tables */
            .btn-edit {
                background-color: #4caf50;
                color: white;
                padding: 8px 16px;
                border-radius: 5px;
                text-align: center;
                text-decoration: none;
            }

            .btn-edit:hover {
                background-color: #45a049;
            }

            .btn-delete {
                background-color: #f44336;
                color: white;
                padding: 8px 16px;
                border-radius: 5px;
                text-align: center;
                text-decoration: none;
            }

            .btn-delete:hover {
                background-color: #d32f2f;
            }

            .btn-create {
                background-color: #2196f3;
                color: white;
                padding: 8px 16px;
                border-radius: 5px;
                text-decoration: none;
            }

            .btn-create:hover {
                background-color: #1976d2;
            }

            /* Footer Styles */
            footer {
                background-color: #333;
                color: white;
                padding: 20px 0;
                text-align: center;
                margin-top: 50px;
            }

            footer a {
                color: #f44336;
                text-decoration: none;
                margin: 0 10px;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                header {
                    flex-direction: column;
                    text-align: center;
                }

                .admin-panel-container h1 {
                    font-size: 1.5rem;
                    margin-bottom: 20px;
                }

                .admin-table-section h2 {
                    font-size: 1.2rem;
                }

                table {
                    font-size: 14px;
                }

                .btn {
                    font-size: 14px;
                    padding: 8px 16px;
                }
            }
        </style>
        
        <!-- Tailwind CSS (Optional) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <!-- Header -->
        <header class="bg-white shadow p-4">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard
                </h2>
                </div>
                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" class="mb-4">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 transition duration-300">Logout</button>
                </form>
            </div>
        </header>

        <!-- Main Content -->
        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <!-- Admin Panel Section -->
                        <div class="admin-panel-container">
                            <h1>Admin Panel</h1>

                            <!-- Users Table Section -->
                            <div class="admin-table-section mt-8">
                                <h2>User Data</h2>
                                <table class="min-w-full table-auto">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 border">Id</th>
                                            <th class="px-4 py-2 border">Name</th>
                                            <th class="px-4 py-2 border">Email</th>
                                            <th class="px-4 py-2 border">Created</th>
                                            <th class="px-4 py-2 border">Reg Date</th>
                                            <th class="px-4 py-2 border">Request</th>
                                            <th class="px-4 py-2 border">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td class="px-4 py-2 border">{{$loop->iteration}}</td>
                                            <td class="px-4 py-2 border">{{$user->name}}</td>
                                            <td class="px-4 py-2 border">{{$user->email}}</td>
                                            <td class="px-4 py-2 border">{{$user->created_at}}</td>
                                            <td class="px-4 py-2 border">
                                                <button class="btn btn-edit px-4 py-2 bg-blue-500 text-white rounded">Edit</button>
                                                <button class="btn btn-delete px-4 py-2 bg-red-500 text-white rounded">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Tour Management Section -->
                            <div class="admin-table-section mt-8">
                                <h2>Tour Management</h2>
                                <a href="{{ route('admin.tours.create') }}" class="btn btn-create px-4 py-2 bg-green-500 text-white rounded">Create New Tour</a>

                                <table class="min-w-full table-auto mt-4">
                                    <thead>
                                        <tr>
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
                                                <a href="{{ route('admin.tours.edit', $tour->id) }}" class="btn btn-edit px-4 py-2 bg-blue-500 text-white rounded">Edit</a>
                                                <form action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-delete px-4 py-2 bg-red-500 text-white rounded">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
