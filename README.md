# pak-tour-agency


## Project Overview

Pak Tour Agency is a travel management web application that provides users with a platform to explore various tours, make bookings, and search for tours based on different criteria such as location, price, and tour title. The project is implemented with **Laravel** as the backend framework and uses **AJAX** to provide dynamic search functionality. The system allows for CRUD operations, user management, and interaction through APIs to manage tour-related data.

## Project Features

- **CRUD Implementation**:  
  - **Create**: Users can create new tours via the admin panel.
  - **Read**: Users can view available tours with filtering capabilities.
  - **Update**: Admins can update tour details.
  - **Delete**: Admins can delete existing tours.
  
- **Relationship Implementation**:  
  - Tours are related to bookings, ensuring that users can book specific tours.

- **AJAX Integration**:  
  - Dynamic search functionality is implemented using AJAX for searching tours without reloading the page.

- **API Implementation**:  
  - Exposes data for tour listing, search, and booking through a dedicated API for external access.

## Setup Instructions

1. **Clone the Repository**:  
   First, clone the repository to your local machine using the following command:
   ```bash
   git clone <repository_url>
   cd pak-tour-agency
   ```

2. **Install Dependencies**:  
   Make sure you have [Composer](https://getcomposer.org/) and [PHP](https://www.php.net/) installed. Run the following command to install the required dependencies:
   ```bash
   composer install
   ```

3. **Environment Configuration**:  
   Copy the `.env.example` file to `.env` and set up your database configuration:
   ```bash
   cp .env.example .env
   ```

4. **Generate Application Key**:  
   Generate the application key using the following Artisan command:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**:  
   Make sure to run the database migrations to set up the required tables:
   ```bash
   php artisan migrate
   ```

6. **Start the Development Server**:  
   You can now start the development server:
   ```bash
   php artisan serve
   ```

7. **Access the Application**:  
   Open your browser and go to `http://127.0.0.1:8000` to view the application.

## Usage Guide

- **Admin Panel**:  
  Admins can log in using predefined credentials and access the admin panel to manage tours. In the admin panel, they can add new tours, update existing tours, or delete them.

- **User Interaction**:  
  Users can browse the available tours, use the search functionality to filter results by tour name, description, or price, and book a tour.

- **AJAX Search**:  
  The search bar uses AJAX to dynamically filter the tours based on user input without requiring page reloads.

- **Booking**:  
  Users can book a tour by selecting a tour and filling out the booking form. The booking will be saved and displayed accordingly.

## Database Migrations

The project includes migrations for the following modules:

- **Tours**: Contains the details for each tour such as title, description, price, and location.
- **Bookings**: Stores information about user bookings including tour ID, user details, and booking date.

To migrate the database, run the following command:
```bash
php artisan migrate
```

## Code Quality

- The code follows best practices and includes detailed comments for clarity.
- Code duplication is avoided by using reusable functions where applicable.
- Proper validation, error handling, and security measures are in place.

## Frontend Standards

- The user interface is polished and user-friendly.
- All unnecessary sections and dead links have been removed.
- The frontend is responsive and designed to provide a seamless experience across devices.

## Project Completion

This project is fully completed with the following functionality implemented:

- CRUD operations for tours.
- Dynamic AJAX search for filtering tours.
- API implementation for managing and interacting with tours and bookings.
- Database migrations to ensure proper schema structure.



Thank you for reviewing the **Pak Tour Agency** project!

