# Office Management System

A comprehensive Laravel application for managing clients, students, employees, and projects in your office.

## Features

### 🏢 **Client Management**
- Add, edit, and delete clients
- Track client information (name, company, position, contact details)
- Manage client status (active, inactive, prospect, former)
- Set follow-up reminders and track last contact
- Assign clients to specific users
- Comprehensive address management

### 🎓 **Student Management**
- Manage student profiles with personal information
- Track enrollment dates and academic status
- Organize students by class and year
- Emergency contact information
- Student assignment to users

### 👥 **Employee Management**
- Complete employee profiles and records
- Track hire dates, positions, and departments
- Salary management
- Employee status tracking
- Emergency contact information

### 📋 **Project Management**
- Create and manage projects
- Link projects to clients, students, and employees
- Track project status, priority, and budget
- Set start and end dates
- Project assignment management

### 📊 **Dashboard & Analytics**
- Overview statistics for all entities
- Recent activity tracking
- Upcoming follow-up reminders
- Quick action buttons
- Visual data representation

## Technology Stack

- **Backend**: Laravel 9
- **Frontend**: Blade templates with Tailwind CSS
- **Authentication**: Laravel Jetstream with Fortify
- **Database**: MySQL/PostgreSQL
- **UI Components**: Modern, responsive design

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd office-management-system
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database configuration**
   - Update `.env` file with your database credentials
   - Run migrations: `php artisan migrate`
   - Seed the database: `php artisan db:seed`

5. **Build assets**
   ```bash
   npm run build
   ```

6. **Start the application**
   ```bash
   php artisan serve
   ```

## Database Structure

### Core Tables
- `users` - System users and administrators
- `clients` - Client information and management
- `students` - Student profiles and academic data
- `employees` - Employee records and HR data
- `projects` - Project management and tracking
- `student_classes` - Academic class organization
- `student_years` - Academic year management

### Key Relationships
- Clients can be assigned to users
- Students belong to classes and years
- Employees can be assigned to projects
- Projects can involve clients, students, and employees

## Usage

### Accessing the System
1. Navigate to the application URL
2. Login with your credentials
3. Access the dashboard for an overview

### Managing Clients
- View all clients: `/clients`
- Add new client: `/clients/create`
- Edit existing client: `/clients/{id}/edit`
- View client details: `/clients/{id}`

### Managing Students
- View all students: `/students`
- Add new student: `/students/create`
- Edit existing student: `/students/{id}/edit`
- View student details: `/students/{id}`

### Managing Employees
- View all employees: `/employees`
- Add new employee: `/employees/create`
- Edit existing employee: `/employees/{id}/edit`
- View employee details: `/employees/{id}`

### Managing Projects
- View all projects: `/projects`
- Add new project: `/projects/create`
- Edit existing project: `/projects/{id}/edit`
- View project details: `/projects/{id}`

## API Endpoints

The system provides RESTful API endpoints for all major entities:

- `GET /api/clients` - List all clients
- `POST /api/clients` - Create new client
- `GET /api/clients/{id}` - Get client details
- `PUT /api/clients/{id}` - Update client
- `DELETE /api/clients/{id}` - Delete client

Similar endpoints exist for students, employees, and projects.

## Customization

### Adding New Fields
1. Create a new migration: `php artisan make:migration add_field_to_table`
2. Update the model's `$fillable` array
3. Update the views and forms
4. Update validation rules in controllers

### Adding New Entities
1. Create the model: `php artisan make:model EntityName -m`
2. Create the controller: `php artisan make:controller EntityNameController`
3. Add routes to `routes/web.php`
4. Create the necessary views

## Security Features

- CSRF protection on all forms
- Input validation and sanitization
- User authentication and authorization
- Secure password handling
- SQL injection prevention

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support and questions, please contact the development team or create an issue in the repository.

---

**Built with ❤️ using Laravel and modern web technologies**
