# Laravel Office Management System

A comprehensive Laravel-based office management application for managing clients, students, and employees. Built with Laravel 9, Jetstream, and Livewire.

## Features

### 🏢 Client Management
- Add, edit, view, and delete clients
- Track company information and contact details
- Monitor business value and contact history
- Status tracking (Active, Inactive, Pending)
- Complete address management

### 👨‍🎓 Student Management
- Comprehensive student records with unique IDs
- Class and year assignment
- Guardian information tracking
- Fee management (paid and pending)
- Academic status monitoring
- Profile photo support

### 👥 Employee Management
- Complete employee records with unique IDs
- Department and position tracking
- Salary and employment type management
- Emergency contact information
- Skills and notes tracking
- Employment status monitoring

### 🔐 Authentication & Security
- Laravel Jetstream authentication
- Role-based access control
- Secure password handling
- Email verification
- Two-factor authentication support

### 📊 Dashboard & Reporting
- Modern admin dashboard
- Data tables with search and sorting
- Responsive design
- Status badges and indicators
- CRUD operations for all entities

## Installation

### Prerequisites
- PHP 8.0 or higher
- Composer
- Node.js and NPM
- SQLite/MySQL/PostgreSQL

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd workspace
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   # For SQLite (default)
   touch database/database.sqlite
   
   # Run migrations
   php artisan migrate
   
   # Seed sample data
   php artisan db:seed
   ```

6. **Compile assets**
   ```bash
   npm run build
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

The application will be available at `http://localhost:8000`

## Default Login Credentials

After running the seeder, you can use these test accounts:

- **Admin User**
  - Email: `admin@example.com`
  - Password: `password`

- **Manager User**
  - Email: `manager@example.com`
  - Password: `password`

- **Regular User**
  - Email: `user@example.com`
  - Password: `password`

## Database Schema

### Users Table
- Basic user information with role-based access
- Supports admin, manager, and user roles
- Jetstream integration for profiles and security

### Clients Table
- Complete client information
- Company details and contact information
- Business value tracking
- Status management

### Students Table
- Student records with unique IDs
- Class and year relationships
- Guardian information
- Fee tracking system
- Academic status management

### Employees Table
- Employee records with unique IDs
- Department and position information
- Salary and employment details
- Emergency contacts
- Skills tracking

### Supporting Tables
- `student_classes` - Class definitions
- `student_years` - Academic year definitions

## API Endpoints

### Client Management
- `GET /clients` - List all clients
- `POST /clients` - Create new client
- `GET /clients/{id}` - View client details
- `PUT /clients/{id}` - Update client
- `DELETE /clients/{id}` - Delete client

### Student Management
- `GET /students` - List all students
- `POST /students` - Create new student
- `GET /students/{id}` - View student details
- `PUT /students/{id}` - Update student
- `DELETE /students/{id}` - Delete student

### Employee Management
- `GET /employees` - List all employees
- `POST /employees` - Create new employee
- `GET /employees/{id}` - View employee details
- `PUT /employees/{id}` - Update employee
- `DELETE /employees/{id}` - Delete employee

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   └── Backend/
│   │       ├── ClientController.php
│   │       ├── StudentController.php
│   │       ├── EmployeeController.php
│   │       └── Setup/
│   └── Requests/
│       ├── ClientRequest.php
│       ├── StudentRequest.php
│       └── EmployeeRequest.php
├── Models/
│   ├── Client.php
│   ├── Student.php
│   ├── Employee.php
│   ├── StudentClass.php
│   └── StudentYear.php
database/
├── migrations/
│   ├── create_clients_table.php
│   ├── create_students_table.php
│   └── create_employees_table.php
└── seeders/
    ├── DatabaseSeeder.php
    └── UserSeeder.php
resources/
└── views/
    ├── admin/
    └── backend/
        ├── clients/
        ├── students/
        └── employees/
```

## Features in Detail

### Validation
- Comprehensive form validation using Laravel Form Requests
- Custom error messages and field attributes
- Client-side and server-side validation
- Unique email validation for all entities

### Relationships
- Students belong to StudentClass and StudentYear
- Proper foreign key constraints
- Eager loading for performance optimization

### Security
- Authentication middleware on all management routes
- CSRF protection on forms
- SQL injection prevention through Eloquent ORM
- XSS protection through Blade templating

### User Interface
- Modern admin dashboard with sidebar navigation
- Responsive design for mobile and desktop
- Data tables with sorting and search functionality
- Status badges and visual indicators
- Form validation with error display

## Customization

### Adding New Fields
1. Create migration: `php artisan make:migration add_field_to_table`
2. Update model's `$fillable` array
3. Update form request validation rules
4. Modify views to include new fields

### Adding New Roles
1. Update user seeder with new roles
2. Create middleware for role checking
3. Apply middleware to specific routes
4. Update views based on user roles

### Styling
- CSS files located in `public/backend/css/`
- Modify `resources/views/admin/admin_master.blade.php` for layout changes
- Update individual view files for specific page styling

## Testing

### Running Tests
```bash
php artisan test
```

### Sample Data
The application includes comprehensive sample data:
- 3 user accounts with different roles
- 3 student classes and years
- 2 sample clients with business information
- 2 sample employees with complete records
- 2 sample students with academic information

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests for new functionality
5. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support and questions:
- Create an issue in the repository
- Check the Laravel documentation
- Review the Jetstream documentation for authentication features

---

**Built with ❤️ using Laravel, Jetstream, and Livewire**
