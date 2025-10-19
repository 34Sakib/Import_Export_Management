<<<<<<< HEAD
# 🚢 Shipping Management System

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10.x-red?style=for-the-badge&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.1+-blue?style=for-the-badge&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/Bootstrap-5.x-purple?style=for-the-badge&logo=bootstrap" alt="Bootstrap">
  <img src="https://img.shields.io/badge/DataTables-Yajra-green?style=for-the-badge" alt="DataTables">
</p>

A comprehensive **Shipping Management System** built with Laravel 10, featuring a modern admin panel, customer tracking interface, and service management capabilities. Perfect for logistics companies, freight forwarders, and shipping businesses.

## ✨ Features

### 🎛️ **Admin Panel**
- **Service Management**: Full CRUD operations with DataTables integration
- **Image Upload**: Secure file handling with validation
- **Responsive Dashboard**: Modern AdminLTE-based interface
- **Real-time Data**: Server-side processing with Yajra DataTables
- **User Authentication**: Secure admin login system

### 🌐 **Frontend Features**
- **Service Showcase**: Dynamic service display from database
- **Shipment Tracking**: Real-time tracking interface
- **Shipping History**: Complete shipment history management
- **Responsive Design**: Mobile-first approach with Bootstrap
- **Modern UI**: Clean, professional design

### 📦 **Service Types**
- Ocean Freight Shipping
- Air Freight Shipping
- Car Shipping
- Custom Service Management

## 🛠️ Tech Stack

- **Backend**: Laravel 10.x (PHP 8.1+)
- **Frontend**: Bootstrap 5, AdminLTE 3
- **Database**: MySQL/PostgreSQL
- **DataTables**: Yajra Laravel DataTables
- **Authentication**: Laravel Breeze
- **Build Tools**: Vite, TailwindCSS
- **Icons**: Font Awesome, Lucide

## 📋 Requirements

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL/PostgreSQL
- Web Server (Apache/Nginx)

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone <repository-url>
cd shipping-project
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Configuration
Update your `.env` file with database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shipping_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Run Migrations
```bash
php artisan migrate
```

### 6. Create Storage Link
```bash
php artisan storage:link
```

### 7. Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

### 8. Start Development Server
```bash
php artisan serve
```

Visit `http://localhost:8000` to access the application.

## 📁 Project Structure

```
shipping-project/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/           # Admin panel controllers
│   │   └── Frontend/        # Frontend controllers
│   └── Models/
│       └── Service.php      # Service model
├── resources/
│   └── views/
│       ├── backend/         # Admin panel views
│       │   ├── layout/      # Admin layouts
│       │   └── pages/       # Admin pages
│       └── frontend/        # Frontend views
│           ├── services/    # Service pages
│           ├── shipping/    # Shipping pages
│           └── track/       # Tracking pages
├── routes/
│   ├── admin.php           # Admin routes
│   └── web.php             # Frontend routes
└── public/
    └── images/             # Uploaded service images
```

## 🎯 Usage

### Admin Panel Access
1. Navigate to `/admin/login`
2. Use admin credentials to login
3. Access service management at `/admin/service`

### Service Management
- **Create**: Add new services with images and descriptions
- **Read**: View all services in DataTables format
- **Update**: Edit existing service information
- **Delete**: Remove services with confirmation

### Frontend Features
- **Homepage**: Dynamic service showcase
- **Tracking**: Shipment tracking interface
- **Services**: Detailed service pages
- **History**: Shipping history management

## 🔧 Configuration

### DataTables Configuration
The system uses Yajra DataTables for efficient data handling:
- Server-side processing
- Responsive design
- Search and pagination
- Custom action buttons

### Image Upload Settings
- **Allowed formats**: JPEG, PNG, AVIF, JPG, GIF, SVG, WebP
- **Max file size**: 2MB
- **Storage location**: `public/images/`
- **Default image**: `nophoto.png`

## 🎨 Customization

### Adding New Service Types
1. Update the Service model if needed
2. Modify the admin form
3. Update frontend display templates

### Styling Modifications
- Admin panel: Modify AdminLTE themes
- Frontend: Update Bootstrap components
- Custom CSS: Add to respective asset files

## 🔒 Security Features

- CSRF protection on all forms
- File upload validation
- SQL injection prevention
- XSS protection
- Secure authentication

## 📱 Responsive Design

- Mobile-first approach
- Bootstrap 5 grid system
- Responsive DataTables
- Touch-friendly interfaces

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🆘 Support

For support and questions:
- Create an issue in the repository
- Check the Laravel documentation
- Review the DataTables documentation

## 🔄 Updates & Maintenance

- Regular Laravel security updates
- Dependency management with Composer
- Asset optimization with Vite
- Database backup recommendations

---

**Built with ❤️ using Laravel Framework**
=======
# Import_Export_Management
>>>>>>> 4f3442c507316cec0fd0594d5343980b57837ec4
