# Laravel 10 FileUpload Project

## Overview

This is a Laravel 10 FileUpload project . 

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 8.2
- Composer
- Node.js (for frontend dependencies)
- A database (MySQL)


Postmen
![postman](https://github.com/user-attachments/assets/05f794e3-eb27-4950-a850-4827e50ec2c3)

Home
![home](https://github.com/user-attachments/assets/99493303-a1f6-427a-b021-cf7fa3752ee9)



## Installation

Follow these steps to install the project:

### 1. Clone the Repository

```bash
git clone https://github.com/Kunalverma320/fileupload.git
cd fileupload

2. Install Dependencies
Install the PHP dependencies using Composer:

composer install

3. Environment Configuration
Copy the .env.example file to .env:

cp .env.example .env


Open the .env file and configure your database and application settings. Update the following fields accordingly:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password


Generate Application Key
Generate a new application key:

php artisan key:generate



Run Migrations
Run the database migrations to create the necessary tables:

php artisan migrate


Serve the Application
You can now serve the application using the built-in PHP server:

php artisan serve






