# Market Intelligence System

This project is a Market Intelligence System built with Laravel 12 for the backend and Vue 3 with Pinia and Vuetify for the frontend. The system follows SOLID principles, clean code standards, and Test-Driven Development (TDD).

## Features

### 1. Configurable Opening Hours
- Uses `spatie/opening-hours` for flexible scheduling.
- Supports complex opening hours (e.g., open on specific days, closed for lunch breaks, bi-weekly schedules).
- Admins can configure opening hours dynamically.

### 2. Real-time Store Status
- Backend API provides real-time store status (`open` / `closed`).
- Displays next opening time if the store is closed.
- Vue.js widget fetches and displays store status using Axios polling.

### 3. Datepicker for Checking Store Availability
- Allows users to check if a store is open on a specific date.
- If closed, it returns the next available opening time in a human-readable format.
- Vue.js datepicker integrates with this API.

## Tech Stack
- **Backend**: Laravel 12, MySQL/PostgreSQL, `spatie/opening-hours`
- **Frontend**: Vue 3, Pinia, Vuetify
- **Testing**: PHPUnit (Laravel), Jest (Vue)

## Installation

### Backend (Laravel 12)
```sh
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

### Frontend (Vue.js)
```sh
cd frontend
npm install
npm run serve
```
