# Mindful Metrics

A modern dashboard application built with Laravel, featuring animated transitions, interactive reports, and a customizable user profile.

## Features

-  **Interactive Dashboard**: Real-time overview of sales, inventory, and customer metrics
-  **Comprehensive Reports**: Detailed analytics with interactive charts
-  **User Profile Management**: Customizable user settings with intuitive interface
-  **Smooth Animations**: Page transitions and UI element animations
-  **Responsive Design**: Optimized for all device sizes

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Running the Application](#running-the-application)
- [Key Pages and Features](#key-pages-and-features)
- [Project Structure](#project-structure)
- [Technologies Used](#technologies-used)
- [Contributing](#contributing)
- [License](#license)

## Requirements

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL or SQLite
- Laravel 10.x requirements

## Installation

1. **Clone the repository**

```bash
git clone https://github.com/ningi265/mindful-metrics.git
cd mindful-metrics
```

2. **Install PHP dependencies**

```bash
composer install
```

3. **Install JavaScript dependencies**

```bash
npm install
```

4. **Create environment file**

```bash
cp .env.example .env
```

5. **Generate application key**

```bash
php artisan key:generate
```

6. **Configure your database in the .env file**

```
DB_CONNECTION=mysql
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=mindful_metrics
# DB_USERNAME=root
# DB_PASSWORD=
```

7. **Run database migrations and seeders**

```bash
php artisan migrate --seed
```

8. **Compile frontend assets**

```bash
npm run dev
```

## Running the Application

1. **Start the development server**

```bash
php artisan serve
```

2. **In a separate terminal, run Vite for hot module replacement**

```bash
npm run dev
```

3. **Access the application**

Open your browser and navigate to [http://localhost:8000](http://localhost:8000)

4. **Login credentials**
-Create your login credentials with this **Path**: `/register`

Example register credentials
- Email: admin@example.com
- Password: securepassword

**Path**: `/login`


## Key Pages and Features

### Dashboard

The main dashboard provides an overview of key metrics including:

- Sales performance indicators
- Current inventory status
- Top-selling products
- Recent customer activity

**Path**: `/dashboard` 

### Reports

The reporting section includes several detailed analytic views:

#### Sales Reports

Comprehensive sales data with filterable date ranges, regional breakdowns, and trend analysis.

**Path**: `/reports/sales`

#### Inventory Reports

Inventory levels, low stock alerts, warehouse distribution, and turnover metrics.

**Path**: `/reports/inventory`

#### Customer Reports

Customer growth trends, segmentation, retention metrics, and behavioral insights.

**Path**: `/reports/customers`

#### Product Analytics

Product performance, variant comparisons, category distribution, and ratings analysis.

**Path**: `/reports/products`

### User Profile

A customizable user profile interface with:

- Personal information management
- Password updates
- Profile picture uploads
- Notification settings
- Activity log

**Path**: `/user-profile`

## Project Structure

```
app/
├── Http/
│   ├── Controllers/         # Application controllers
│   │   ├── Auth/            # Authentication controllers
│   │   ├── DashboardController.php
│   │   ├── ProfileController.php
│   │   ├── ReportsController.php
│   │   └── UserProfileController.php
│   └── Requests/            # Form requests
├── Models/                  # Eloquent models
├── View/
│   └── Components/          # Blade components
│       ├── CardContainer.php
│       ├── DataTable.php
│       ├── LineChart.php
│       ├── PopularItemsList.php
│       ├── StatsCard.php
│       └── ...
resources/
├── css/                     # CSS assets
├── js/                      # JavaScript files
│   └── components/          # JS components
│       └── charts.js        # Chart configurations
├── views/                   # Blade templates
│   ├── auth/                # Authentication views
│   ├── components/          # Blade component templates
│   ├── dashboard.blade.php  # Main dashboard
│   ├── layouts/             # Layout templates
│   ├── profile/             # User profile views
│   └── reports/             # Report views
│       ├── index.blade.php
│       ├── sales.blade.php
│       ├── inventory.blade.php
│       ├── customers.blade.php
│       └── products.blade.php
```

## Technologies Used

- **Backend**:
  - Laravel 10.x
  - PHP 8.1+
  - MySQL

- **Frontend**:
  - Blade templates
  - Alpine.js
  - Chart.js for data visualization
  - Custom CSS animations
  - Tailwind CSS (customized)

- **Development Tools**:
  - Laravel Mix / Vite
  - NPM
  - Git

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

---

Created with ❤️ by [Your Brian]