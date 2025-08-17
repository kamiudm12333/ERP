# Office Management System - Setup Guide

## 🚀 Quick Start

### Prerequisites
- PHP 8.0+ (PHP 8.4 recommended)
- Composer
- Node.js & npm
- SQLite (or MySQL/PostgreSQL)

### Installation Steps

1. **Clone and navigate to the project**
   ```bash
   cd /workspace
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Build frontend assets**
   ```bash
   npm run build
   ```

5. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

6. **Database setup**
   ```bash
   # For SQLite (default)
   touch database/database.sqlite
   
   # For MySQL/PostgreSQL, update .env file with your database credentials
   ```

7. **Run migrations**
   ```bash
   php artisan migrate
   ```

8. **Seed the database with sample data**
   ```bash
   php artisan db:seed
   ```

9. **Start the development server**
   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

## 🔑 Default Login Credentials

- **Admin User**: admin@office.com / password
- **Employee Users**: 
  - john@office.com / password
  - sarah@office.com / password
  - mike@office.com / password

## 📊 Sample Data

The system comes pre-populated with:
- 4 users (1 admin, 3 employees)
- 10 clients (5 active, 5 prospects/inactive)
- 15 students (4 active, 11 inactive/graduated)
- 3 employees (all active)
- 10 projects (4 active, 6 planning/completed)
- 45 tasks (17 pending, 28 in progress/completed)

## 🌐 Access the System

Open your browser and navigate to:
- **Main Application**: http://localhost:8000
- **Dashboard**: http://localhost:8000/dashboard (after login)

## 🛠️ System Features

### Core Modules
- **Dashboard**: Overview of all system entities
- **Client Management**: Add, edit, delete clients
- **Student Management**: Manage student records
- **Employee Management**: Handle employee information
- **Project Management**: Track client projects
- **Task Management**: Manage project tasks

### Key Features
- Responsive design with Tailwind CSS
- Role-based access control
- Search and filtering capabilities
- Data relationships and assignments
- Follow-up tracking for clients
- Progress monitoring for projects

## 🔧 Customization

### Adding New Fields
1. Update the model's `$fillable` array
2. Create a new migration
3. Update controller validation
4. Modify the corresponding views

### Adding New Modules
1. Create model and migration
2. Create controller with CRUD operations
3. Add routes to `routes/web.php`
4. Create views for the new module
5. Update navigation component

## 🚨 Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Check `.env` file configuration
   - Ensure database file exists (SQLite) or service is running (MySQL/PostgreSQL)

2. **Migration Errors**
   - Run `php artisan migrate:fresh` to reset database
   - Check migration files for syntax errors

3. **Asset Build Errors**
   - Run `npm install` to install dependencies
   - Ensure Node.js version is compatible

4. **Permission Issues**
   - Ensure `storage/` and `bootstrap/cache/` directories are writable

## 📚 Next Steps

1. **Customize the system** for your specific needs
2. **Add authentication middleware** for production use
3. **Implement additional features** like reporting and analytics
4. **Set up production environment** with proper security measures
5. **Add automated testing** for critical functionality

## 🆘 Support

For issues or questions:
1. Check the Laravel documentation
2. Review the code comments
3. Check the system logs in `storage/logs/`
4. Create an issue in the repository

---

**Happy managing! 🎉**