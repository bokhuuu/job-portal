# Job Portal

## Overview

This project is a comprehensive Laravel application designed to offer advanced functionality for both job seekers and employers. The application allows job seekers to search for, filter, and apply to job listings, while employers can post, manage, and track their job offers. It demonstrates best practices in Laravel development, including advanced querying, file uploads, secure user registration and authentication, role-based access control, reusable Blade components, and more.

## Features

### Job Listings & Applications
- Employers can create, update, list, and soft-delete job offers.
- Dynamic filtering based on job criteria, including job title, description, and company name. Users can filter job offers by salary range, experience level, and other parameters.
- Job seekers can apply for jobs by uploading their CVs and specifying their expected salary.
- Employers can view and manage applications, cancel applications when needed, and handle other application-related tasks.

### Authentication, Authorization & Registration
- Secure login, logout, and session management. Users can remain signed in indefinitely.
- New users register with validation for name, email, password, and password confirmation. Passwords are securely hashed before storage.
- Policies and Gates enforce permissions for creating, updating, and deleting job offers and applications.
- Employers register separately and gain access to specific routes and features via custom middleware.

### File Uploads
- Users can upload CVs (PDF files, max 2MB) when applying for jobs. Files are stored in the local storage, and file paths are saved in the database.

### Reusable Blade Components & UI Enhancements
- Custom Blade components for reusable UI elements that improve maintainability.
- Use of slots and conditional classes for flexible styling and error handling in the UI.
- Lightweight JavaScript library for features like input resetting.

### Soft Deletes & Data Integrity
- Job offers use soft deletes, allowing for data restoration and preventing accidental permanent loss.
- Use of `withTrashed()` to include soft-deleted job offers when necessary.

## Getting Started

### Installation
- git clone git@github.com:bokhuuu/job-portal.git
- cd job-portal
- ./vendor/bin/sail up -d
- ./vendor/bin/sail composer install
- npm install && npm run dev
- ./vendor/bin/sail artisan migrate --seed

## Usage

### For Job Seekers:
- Browse job offers with advanced filtering.
- Apply for jobs by uploading a CV and entering expected salary.
- View application details, including the application time, number of other applicants, and average salary data.

### For Employers:
- Register as an employer if not already registered.
- Post and manage job offers.
- View applications for each job, with the option to edit or delete offers.

### API & Routing Overview
- Authentication Routes: Login, logout, and session management routes.
- Registration Routes: Endpoints for new user registration.
- Employer Routes: Resource routes for employer registration and job management.
- Job Offer & Application Routes: CRUD operations for job offers and resource routes for job applications, with authorization using policies and Gates.

### Policies & Middleware
- JobOfferPolicy: Manages permissions for creating, updating, and deleting job offers.
- Custom Middleware: Restricts access to employer-specific routes. Unauthorized users are redirected to the employer registration page.

### Refactoring & Best Practices
- Reusable Components: Blade components to reduce code duplication and improve maintainability.
- Dynamic Query Filtering: Use of local scopes and eager loading to optimize performance for fetching job offers and related data.
- Soft Deletes: Job offers implement soft deletes for data restoration and prevention of accidental data loss.
