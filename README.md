# Employee-Management
Employee Attendance Maintance
This project is based on laravel framework. Admin has all privilege where as employee has certain restriction to access.By default You can register as an employee: http://127.0.0.1:8000/register
Screenshots
Login page![Screenshot (4)](https://github.com/MJTHENU/Employee-Management/assets/121682198/a4571432-f51c-46b8-a24d-99d0721ce280)
![Screenshot (3)](https://github.com/MJTHENU/Employee-Management/assets/121682198/a6ad038d-281a-43a6-aedb-c0fa899affad)
![Screenshot (2)](https://github.com/MJTHENU/Employee-Management/assets/121682198/c06aeebe-4e42-4375-90a7-cf45f3c166a6)
![Screenshot (1)](https://github.com/MJTHENU/Employee-Management/assets/121682198/9b0851b2-8246-4ebb-bf11-e480599d68f5)
Installation
This project is for employee management.Employee can register himself and employee can assign a salary for employee...

Clone the repo
git clone [https://](https://github.com/MJTHENU/Employee-Management.git)

Employee Attendance System
Features
 CRUD Positions (Manage Job Positions)
 CRUD Users (Admins, Operators, and Employees)
 CRUD Holidays (Manage Holidays)
 CRUD Attendances (Track Employee Attendance with QR Codes or Buttons)
 Utilizes Datatables (Powered by Livewire)
 Export Data to Excel and CSV Formats
 And More...
Installation Instructions
Prerequisites
- Git
- Composer
- PHP v8.1

# First, clone the repository via command line (cmd, bash, or other terminals)
git clone https://github.com/sgnd/employee-attendance-system.git

# Navigate to the project folder
cd employee-attendance-system

# Install all required packages
composer install

# Copy example env to .env and configure the file by specifying the database name (DB_DATABASE), username, and password
cp .env.example .env

# Generate a new application key, run migrations, seed the database, and start the development server:
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve

# Finally, open your web browser
http://localhost:8000
