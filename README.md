# Office Management System

A comprehensive Laravel-based office management system for managing clients, students, employees, projects, and tasks.

## Features

### 🏢 **Client Management**
- Add, edit, and delete client records
- Track client status (active, inactive, prospect, former)
- Assign clients to employees
- Set follow-up dates and track contact history
- Store company information and contact details

### 🎓 **Student Management**
- Manage student enrollment and records
- Track student status (active, inactive, graduated, transferred)
- Assign students to classes and academic years
- Store emergency contact information
- Assign students to employees for guidance

### 👥 **Employee Management**
- Complete employee profiles with personal information
- Track employment details (position, department, salary)
- Hierarchical structure with supervisors and subordinates
- Link employees to user accounts for system access
- Assign employees to clients and students

### 📋 **Project Management**
- Create and track projects for clients
- Monitor project progress and status
- Set budgets and track actual costs
- Assign projects to employees
- Track project priorities and deadlines

### ✅ **Task Management**
- Break down projects into manageable tasks
- Assign tasks to employees
- Track task status and progress
- Set due dates and estimate hours
- Monitor task completion

### 📊 **Dashboard & Analytics**
- Overview of all system entities
- Quick statistics and metrics
- Recent activities and updates
- Upcoming follow-ups and overdue tasks
- Quick action buttons for common operations

## Technology Stack

- **Backend**: Laravel 9.x
- **Frontend**: Blade templates with Tailwind CSS
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Jetstream with Sanctum
- **UI Components**: Custom responsive design

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

4. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

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
- `users` - System user accounts
- `clients` - Client information and relationships
- `students` - Student records and academic information
- `employees` - Employee profiles and work details
- `projects` - Project definitions and tracking
- `tasks` - Individual task management
- `student_classes` - Academic class definitions
- `student_years` - Academic year management

### Key Relationships
- Clients can have multiple projects
- Projects can have multiple tasks
- Employees can be assigned to clients, students, and projects
- Students belong to classes and academic years
- Employees can have supervisors and subordinates

## Usage

### Getting Started
1. Access the system through your web browser
2. Log in with your credentials
3. Navigate to the dashboard for an overview
4. Use the navigation menu to access different modules

### Adding New Records
- **Clients**: Navigate to Clients → Add New Client
- **Students**: Navigate to Students → Add New Student
- **Employees**: Navigate to Employees → Add New Employee
- **Projects**: Navigate to Projects → Create New Project
- **Tasks**: Navigate to Tasks → Create New Task

### Managing Relationships
- Assign employees to clients and students
- Link projects to clients
- Create tasks within projects
- Set up employee hierarchies

## Customization

### Adding New Fields
1. Update the relevant model's `$fillable` array
2. Create a new migration for the database changes
3. Update the controller validation rules
4. Modify the corresponding views

### Adding New Modules
1. Create a new model and migration
2. Create a controller with CRUD operations
3. Add routes to `routes/web.php`
4. Create views for the new module
5. Update the navigation component

## Security Features

- CSRF protection on all forms
- Input validation and sanitization
- Role-based access control
- Secure authentication with Laravel Sanctum
- Soft deletes for data recovery

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support and questions, please open an issue in the repository or contact the development team.

---

**Built with ❤️ using Laravel and modern web technologies**
