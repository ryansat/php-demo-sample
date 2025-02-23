```markdown:/Users/satria/Documents/GitHub/php-demo-sample/README.md
# PHP Contact Management System

A simple contact management system built with PHP and MySQL.

## Features

- User Authentication (Admin and Customer Service roles)
- Contact Management
- WhatsApp Integration
- Google Contacts Sync
- Responsive Design

## Project Structure

```

php-demo-sample/
├── src/
│ ├── config/
│ │ └── Database.php
│ ├── controllers/
│ │ ├── AuthController.php
│ │ └── DashboardController.php
│ ├── core/
│ │ ├── App.php
│ │ └── Controller.php
│ ├── database/
│ │ ├── migrations/
│ │ │ ├── CreateUsersTable.php
│ │ │ └── CreateActivationFormsTable.php
│ │ └── MigrationManager.php
│ ├── models/
│ │ └── User.php
│ ├── public/
│ │ └── index.php
│ └── views/
│ ├── auth/
│ │ └── login.php
│ ├── dashboard/
│ │ └── index.php
│ └── layouts/
│ └── main.php
├── Dockerfile
├── docker-compose.yml
├── apache.conf
└── rebuild.sh

````

## Prerequisites

- Docker
- Docker Compose

## Getting Started

1. Clone the repository:
```bash
git clone https://github.com/yourusername/php-demo-sample.git
cd php-demo-sample
````

2. Start the application:

```bash
./rebuild.sh
```

This will:

- Build Docker containers
- Start the services
- Run database migrations
- Seed initial data

3. Access the application:

- Main application: http://localhost:8080
- phpMyAdmin: http://localhost:8081

## Default Credentials

- Admin User:

  - Username: admin
  - Password: password123

- Customer Service User:
  - Username: cs_user1
  - Password: password123

## Docker Services

The application uses three Docker containers:

1. **Web (PHP+Apache)**

   - PHP 8.2 with Apache
   - Handles application logic and web server
   - Port: 8080

2. **MySQL Database**

   - MySQL 8.0
   - Stores application data
   - Port: 3306

3. **phpMyAdmin**
   - Database management interface
   - Port: 8081

## Development

### Database Migrations

Migrations are located in `src/database/migrations/`. To add a new migration:

1. Create a new PHP file in the migrations directory
2. Extend the migration class with up() method
3. Run migrations using the rebuild script

### Adding New Features

1. **Controllers**: Add new controllers in `src/controllers/`
2. **Models**: Add new models in `src/models/`
3. **Views**: Add new views in `src/views/`
4. **Routes**: Update routing in `src/core/App.php`

### Rebuilding the Application

After making changes, rebuild using:

```bash
./rebuild.sh
```

## Project Components

### Core Components

1. **App.php**: Main routing and application bootstrap
2. **Controller.php**: Base controller with common functionality
3. **Database.php**: Database connection management

### MVC Structure

- **Models**: Handle data and business logic
- **Views**: Handle presentation and UI
- **Controllers**: Handle request flow and user input

### Authentication

- Role-based access control (Admin/CS)
- Session management
- Secure password hashing

## Security Features

- Password hashing
- SQL injection prevention (PDO)
- XSS protection
- CSRF protection
- Secure session handling

## Contributing

1. Fork the repository
2. Create a feature branch
3. Commit changes
4. Push to the branch
5. Create a Pull Request

## License

MIT License

```

```
