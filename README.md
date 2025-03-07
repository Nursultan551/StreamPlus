<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# StreamPlus Onboarding Application

This application is a multi-step onboarding wizard built with Laravel, Livewire, and Bootstrap 5. It collects user information across several steps, normalizes the data into separate tables (users, addresses, and payments), and preserves state using session-based persistence.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)
- [Deployment](#deployment)
- [Troubleshooting](#troubleshooting)
- [Implemented Features](#implemented-features)
- [Areas for Improvement](#areas-for-improvement)

## Features

- Multi-step onboarding form with dynamic steps based on subscription type.
- Interactive UI using Livewire for real-time validation and state persistence.
- Normalized database design: separate tables for users, addresses, and payments.
- Session-based persistence to retain form data on refresh or back navigation.
- Bootstrap 5 for a responsive, modern UI.

## Requirements

- **PHP**: 8.2 or higher
- **Composer**: For dependency management
- **MySQL** (or another supported relational database)
- **Web Server**: Apache or Nginx (Not required if served locally)

## Installation

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/Nursultan551/StreamPlus.git
   cd StreamPlus
   ```

2. **Install Composer Dependencies:**

   ```bash
   composer install
   ```

## Configuration

1. **Environment File:**

   Copy the example environment file and update it:

   ```bash
   cp .env.example .env
   ```

2. **Generate Application Key:**

   ```bash
   php artisan key:generate
   ```

3. **Database Configuration:**

   In your `.env` file, set your database credentials:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Session and Cache Configuration:**

   Make sure the session driver is set appropriately (e.g., `SESSION_DRIVER=database`).

## Database Setup

1. **Run Migrations:**

   This project uses three migrations to create the necessary tables:

   ```bash
   php artisan migrate
   ```

## Running the Application

- **Local Development:**

  Use Laravel’s built-in server:

  ```bash
  php artisan serve
  ```

  Your application will be accessible at `http://localhost:8000`.

## Deployment

I am not giving deployment instructions since it's not a production ready application, for security reasons


## Troubleshooting

- **Session Persistence:**

  If form state isn’t being retained, verify that your session driver is configured correctly.

- **Caching Issues:**

  If you encounter stale configurations, clear caches:

  ```bash
  php artisan cache:clear
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear
  ```

- **Deployment Errors:**

  Check your web server logs (Apache/Nginx) and Laravel logs (`storage/logs/laravel.log`) for details on any errors during deployment.



---

### Implemented Features

- **Multi-Step Onboarding Form:**  
  The application uses a multi-step wizard to guide users through distinct steps (User Information, Address Information, Payment Information, and Confirmation). This modular design enhances maintainability and improves the user experience.

- **Livewire-Based Dynamic UI:**  
  The onboarding process leverages Livewire components for real-time validation and dynamic state management without full page reloads, providing a seamless and interactive user experience.

- **Session-Based Persistence:**  
  Form data is preserved between steps and page refreshes via session storage. This helps maintain state and avoids loss of user input if the page is refreshed or if the user navigates backward.

- **Normalized Database Structure:**  
  Data is segmented into multiple tables (users, addresses, payments) following best practices for relational databases. This improves data integrity, enables scalability, and facilitates maintenance.

- **Conditional Navigation:**  
  The workflow dynamically adjusts based on user input (e.g., skipping the payment step for Free subscription types). This conditional logic streamlines the user journey.

- **Responsive Design with Bootstrap 5:**  
  The UI uses Bootstrap 5 to ensure that the application is responsive and accessible on various devices.

---

### Areas for Improvement

- **Dynamic fields based on country selected:**  
  - Couldn’t implement due to time constraints.

- **Enhanced Error Handling and User Feedback:**  
  - Implement inline, real-time error feedback in each component to further improve user experience.
  - Consider adding toast notifications or modal dialogs for critical messages (e.g., form submission success or failure).

- **Improved Data Security:**  
  - Encrypt sensitive data like payment details before storing them in the database.
  - Implement stricter validation and possibly integrate a third-party service for payment details to avoid storing sensitive information if you plan to go live.

- **Integration with External APIs:**  
  - For payment processing, integrate with payment gateways (like Stripe or PayPal) to securely handle transactions.
  - Add address validation via third-party APIs to ensure that the address entered is accurate.

- **State Persistence Enhancements:**  
  - Explore client-side persistence using localStorage as a fallback, particularly for longer forms where users might accidentally close their browser.

- **Accessibility Improvements:**  
  - Review the form’s accessibility compliance (e.g., ARIA attributes, keyboard navigation) to ensure that users with disabilities have an optimal experience.
  - Include multi-language support and localization for international users.

- **Testing and Quality Assurance:**  
  - Implement comprehensive unit and feature tests to ensure the onboarding process behaves as expected under various conditions.
  - Consider user acceptance testing (UAT) sessions to gather feedback and refine the workflow.

- **Analytics and Monitoring:**  
  - Integrate analytics tools to monitor user drop-offs and optimize the onboarding process.

- **User Experience (UX) Enhancements:**  
  - Add progress indicators to show users where they are in the onboarding process.
  - Introduce animation or transition effects between steps to make the process feel smoother and more engaging.
  - Overall implementation of unique modern design for better UX

- **Delayed Redirection Post-Submission:**  
  After the final submission, the system dispatches a browser event to redirect users back to the main page after a brief delay, allowing them to see a confirmation message before moving on.

---
