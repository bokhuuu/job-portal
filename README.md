# Job Portal

## Overview

This job portal project is a comprehensive Laravel application designed to offer advanced functionality for both job seekers and employers. The application allows job seekers to search for, filter, and apply to job listings, while employers can post, manage, and track their job offers. The project demonstrates best practices in Laravel development, including advanced querying, file uploads, user authentication, role-based access control, Blade components, and more.

## Features

### Job Listings & Applications

-   **Job Offers**: Employers can create, update, list, and soft-delete job offers.
-   **Advanced Filtering**: Dynamic filtering based on job criteria, including job title, description, and company name. Users can filter job offers by salary range, experience level, and other parameters.
-   **Job Applications**: Job seekers can apply for jobs by uploading their CVs and specifying their expected salary.
-   **Application Management**: Employers can view and manage applications, cancel applications when needed, and handle other application-related tasks.

### Authentication & Authorization

-   **User Authentication**: Login, logout, and session management. Users can remain signed in for an indefinite period.
-   **Employer Registration**: Employers register separately and gain access to specific routes and features through custom middleware.
-   **Role-Based Access Control**: Policies and Gates enforce permissions for creating, updating, and deleting job offers and applications.

### File Uploads

-   **CV Uploads**: Users can upload CVs (PDF files, max 2MB) when applying for jobs. Files are stored in the local storage, and file paths are saved in the database.

### Reusable Blade Components & UI Enhancements

-   **Blade Components**: Custom Blade components for reusable UI elements that improve maintainability.
-   **Dynamic Data Passing**: Use of slots and conditional classes for flexible styling and error handling in the UI.
-   **Alpine.js Integration**: Lightweight JavaScript library for features like input resetting.

### Soft Deletes & Data Integrity

-   **Soft Delete Functionality**: Job offers use soft deletes, allowing for data restoration and preventing accidental permanent loss.
-   **Eager Loading with Trashed Data**: withTrashed() to include soft-deleted job offers when necessary.

## Last Commit Changes

-   Implemented **user registration** with validation for **name**, **email**, **password**, and **password confirmation**.
-   Registered the new user with a hashed password.
-   Automatically logged the newly registered user using `Auth::login()`.
-   Redirected the user to the **job offers page** after successful registration and login.

## Getting Started

### Installation

1. Clone the repository:
   git clone git@github.com:bokhuuu/job-portal.git
   cd job-portal

2. Start the Dockerized Environment (Laravel Sail):
   ./vendor/bin/sail up -d
3. Install Dependencies:
   ./vendor/bin/sail composer install
   npm install && npm run dev
4. Configure Environment Variables: Duplicate .env.example as .env and update your database, mail, and other configurations.

5. Run Migrations & Seeders:
   ./vendor/bin/sail artisan migrate --seed

## Usage

### For Job Seekers:

-   Browse job offers with advanced filtering.
-   Apply for jobs by uploading a CV and entering expected salary.
-   View application details, including the application time, number of other applicants, and average salary data.

### For Employers:

-   Register as an employer if not already registered.
-   Post and manage job offers.
-   View applications for each job, with the option to edit or delete offers.

### API & Routing Overview

-   Authentication Routes: Login, logout, and session management routes.
-   Employer Routes: Resource routes for employer registration and job management.
-   Job Offer & Application Routes: CRUD operations for job offers and resource routes for job applications, with authorization using policies and Gates.

### Policies & Middleware

-   JobOfferPolicy: Manages permissions for creating, updating, and deleting job offers.
-   Custom Middleware: Restricts access to employer-specific routes. Unauthorized users are redirected to the employer registration page.

### Refactoring & Best Practices

-   Reusable Components: Blade components to reduce code duplication and improve maintainability.
-   Dynamic Query Filtering: Use of local scopes and eager loading to optimize performance for fetching job offers and related data.
-   Soft Deletes: Job offers implement soft deletes for data restoration and prevention of accidental data loss.
