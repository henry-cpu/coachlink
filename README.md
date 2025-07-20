# CoachLink - Training Management Platform

Welcome to CoachLink — a full training management platform with a complete Laravel backend.

CoachLink is a smart training management platform that connects coaches and patients through personalized programs, guided sessions, and machine-based workouts. Designed for gyms, physiotherapy centers, and sports facilities, it enables efficient training planning, progress tracking, and session assignment — all within a structured Laravel backend

---

## 🚀 Tech Stack

- PHP 8.3
- Laravel 11
- PostgreSQL 17
- Blade Templates (upcoming)
- TailwindCSS (upcoming)
- GPT API Integration (upcoming)
- Fully configured Seeder & Factory system
- Clean backend architecture for progressive development

---

## ⚙️ Project Setup (Development Environment)

### 1️⃣ Clone the repository

```bash
git clone <your-repo-url>
cd coachlink
```

### 2️⃣ Install PHP dependencies

```bash
composer install
```

### 3️⃣ Prepare environment file

Copy the example file `.env.example` and configure your local database connection:

```bash
cp .env.example .env
```

Update PostgreSQL connection parameters:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=coachlink_db
DB_USERNAME=postgres
DB_PASSWORD=your_password_here
```

### 4️⃣ Generate Laravel application key

```bash
php artisan key:generate
```

### 5️⃣ Create the PostgreSQL database

```bash
createdb coachlink_db
```

### 6️⃣ Run migrations and seeders

```bash
php artisan migrate:fresh --seed
```

---

## 🗄️ Seeded Data

- **Users:** Admin, Coaches, Patients
- **Coach-Patient Relations**
- **Machines with Status**
- **Exercises linked to Machines**
- **Programs with linked Exercises**
- **Sessions generated for Coaches**
- **Programs assigned to Sessions**
- **Patients assigned to Sessions**

---

## 📊 Main Entities Structure

- Users
- CoachPatient
- Machines
- Exercises
- Programs
- ProgramExercises (pivot)
- Sessions
- ProgramSessions (pivot)
- SessionAssignments (pivot)

---

## 🚧 Upcoming Development Tasks

- Frontend interface (Breeze + Blade + TailwindCSS)
- AI integration (GPT Recommendation System)
- REST API with authentication (Laravel Sanctum / Passport)
- Full roles and permissions management
- Complete technical documentation (work in progress)
- Deployment on test environment

---

## 📄 Notes

> This project is built as a technical preparation demo, using randomized data generated via Laravel Factories and Seeders.

---

## 💡 Authors & Contribution

- Developed by Harold Henry Mbe Ndefo
- Laravel architecture designed and structured with ChatGPT assistance

---

## 📦 Git Note

> Sensitive files like `.env`, `/vendor`, and `/node_modules` are properly excluded via `.gitignore`.
