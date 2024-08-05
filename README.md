# Company Profile Project

This project is a comprehensive company profile website that includes features such as product listings, product categories, a blog site, and an organizational structure section. The project is built using Laravel for the backend, Tailwind CSS for frontend styling, and MySQL for database management.

## Features

- **Company Profile**: Detailed information about the company.
- **Products**: A list of products offered by the company.
- **Product Categories**: Categorization of products for easy navigation.
- **Blog Site**: A platform for posting and viewing company-related blog posts.
- **Organizational Structure**: Display of the company's organizational hierarchy.

## Technology Stack

- **Backend Framework**: Laravel
- **Frontend Styling**: Tailwind CSS
- **Database Management System**: MySQL

## Project Structure

- **app**: Contains the core code of the application.
- **public**: The directory that contains public assets such as images, stylesheets, and scripts.
- **resources**: Contains views and raw assets like Tailwind CSS configuration.
- **routes**: Defines the routes for the application.
- **database**: Contains database migrations and seeds.
- **config**: Configuration files for the application.

## Key Directories and Files

- **app/Http/Controllers**: Contains the controllers for handling requests.
- **app/Models**: Contains the Eloquent models.
- **resources/views**: Blade templates for the frontend.
- **routes/web.php**: Routes for the web application.
- **database/migrations**: Database schema definitions.
- **tailwind.config.js**: Tailwind CSS configuration file.

## Screenshot

![Dashboard Screenshot](https://i.ibb.co.com/sWGr6Jw/biostark.png)

## Environment Variables

Ensure you set up the following environment variables in your `.env` file:

- `DB_CONNECTION=mysql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `DB_DATABASE=your_database_name`
- `DB_USERNAME=your_database_user`
- `DB_PASSWORD=your_database_password`
