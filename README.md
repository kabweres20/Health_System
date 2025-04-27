Health Information System
Project Description
The Health Information System is a web-based application designed to manage health programs and client information. The system allows doctors to create and manage health programs, register clients, and enroll them in programs. It also provides features for managing and viewing client profiles. The system follows an API-first approach to ensure easy integration with other systems.

This application is built using Laravel as the backend framework, Bootstrap for the frontend design, and other technologies such as HTML, CSS, JavaScript, and MQL. The system offers a user-friendly interface and is optimized for responsiveness, using a golden and purple color theme.

Features
Client Management: Doctors can register clients and manage their profiles.

Program Management: Doctors can create, edit, and manage health programs.

Client Enrollment: Clients can be enrolled in multiple programs.

Search Functionality: Search clients by name or age.

API Access: Clients' information can be accessed via an API endpoint for integration with other systems.

Technologies Used
Backend: Laravel (PHP)

Frontend: HTML, CSS, Bootstrap, JavaScript

Database: MySQL

Version Control: Git, GitHub

Installation and Setup
To run the Health Information System on your local machine, follow the steps below:

Prerequisites
PHP: Ensure you have PHP (version 8.0 or higher) installed on your machine.

Composer: Laravel uses Composer for dependency management. Install Composer from getcomposer.org.

MySQL: Install MySQL to run the database for the system.

Git: Ensure Git is installed to clone the repository.

Steps to Run the Project
Clone the Repository

Open your terminal or command prompt and clone the repository from GitHub:


git clone https://github.com/kabweres20/Health_System.git
Navigate to the Project Directory

Change into the project directory:


cd Health_System
Install Dependencies

Install the required PHP dependencies using Composer:


composer install
Set Up Environment File

Copy the .env.example file to create a new .env file:


cp .env.example .env
Open the .env file and configure your database connection settings:


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=health_system
DB_USERNAME=root
DB_PASSWORD=
Make sure to create the database in MySQL before proceeding.

Generate Application Key

Generate the application key for Laravel:


php artisan key:generate
Migrate the Database

Run the database migrations to set up the necessary tables:


php artisan migrate
Serve the Application

Start the Laravel development server:


php artisan serve
By default, the application will be available at http://127.0.0.1:8000.

Access the Application

Open your browser and navigate to http://127.0.0.1:8000 to access the Health Information System.

Usage
Once the application is running, you can:

Register a client: Go to the client registration page to add new clients to the system.

Create and manage health programs: Doctors can create, edit, and delete health programs.

View and edit client profiles: View individual client profiles and edit their details as needed.

Search clients: Use the search functionality to filter clients by name or age.

API Access: Retrieve client profiles through the API endpoint: GET /api/clients/{client_id}.
