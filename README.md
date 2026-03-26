# 🚀 Project Management System API (Laravel)

## 📌 Overview

This is a **Mini Project Management System API** built using Laravel.
It includes authentication, project management, task assignment, filtering, and authorization.

---

## ⚙️ Setup Instructions

### 1. Clone the repository

```bash
git clone https://github.com/mahendramahawar29/project-management-api.git
cd project-management-api
```

### 2. Install dependencies

```bash
composer install
```

### 3. Setup environment file

```bash
cp .env.example .env
```

Update database credentials in `.env`

### 4. Generate key

```bash
php artisan key:generate
```

### 5. Run migrations

```bash
php artisan migrate
```

(Optional: if seeders added)

```bash
php artisan migrate --seed
```

### 6. Run server

```bash
php artisan serve
```

---

## 🔐 Authentication APIs

### Register

POST `/api/register`

Headers:

```http
Content-Type: application/json
```

Body:

```json
{
  "name": "Mahendra",
  "email": "test@gmail.com",
  "password": "123456"
}
```

---

### Login

POST `/api/login`

Headers:

```http
Content-Type: application/json
```

Body:

```json
{
  "email": "test@gmail.com",
  "password": "123456"
}
```

Response:

```json
{
  "status": true,
  "message": "Login successful",
  "data": {
    "token": "TOKEN"
  }
}
```

---

## 🔑 Common Headers (For Protected APIs)

All below APIs require:

```http
Authorization: Bearer TOKEN
Content-Type: application/json
```

---

## 📁 Project APIs

### Create Project

POST `/api/projects`

Headers:

```http
Authorization: Bearer TOKEN
Content-Type: application/json
```

Body:

```json
{
  "title": "Project 1",
  "description": "Test project"
}
```

---

### Get All Projects

GET `/api/projects`

Headers:

```http
Authorization: Bearer TOKEN
```

---

### Get Single Project

GET `/api/projects/{id}`

Headers:

```http
Authorization: Bearer TOKEN
```

---

### Update Project

PUT `/api/projects/{id}`

Headers:

```http
Authorization: Bearer TOKEN
Content-Type: application/json
```

---

### Delete Project

DELETE `/api/projects/{id}`

Headers:

```http
Authorization: Bearer TOKEN
```

---

## 📌 Task APIs

### Create Task

POST `/api/tasks`

Headers:

```http
Authorization: Bearer TOKEN
Content-Type: application/json
```

Body:

```json
{
  "project_id": 1,
  "title": "Task 1",
  "status": "pending",
  "assigned_to": 1,
  "due_date": "2026-03-30"
}
```

---

### Get Tasks

GET `/api/tasks`

Headers:

```http
Authorization: Bearer TOKEN
```

---

### Filters

* By status
  `/api/tasks?status=pending`

* By assigned user
  `/api/tasks?assigned_to=1`

* By due date
  `/api/tasks?due_date=2026-03-30`

---

### Get Single Task

GET `/api/tasks/{id}`

Headers:

```http
Authorization: Bearer TOKEN
```

---

### Update Task

PUT `/api/tasks/{id}`

Headers:

```http
Authorization: Bearer TOKEN
Content-Type: application/json
```

---

### Delete Task

DELETE `/api/tasks/{id}`

Headers:

```http
Authorization: Bearer TOKEN
```

---

## 🔐 Authorization

* Only project owner can update/delete project
* Only assigned user or project owner can update task

---

## ✨ Features

* Laravel Sanctum Authentication
* RESTful APIs
* Clean JSON responses
* Filtering (status, user, date)
* Authorization checks
* Validation

---

## 📌 Assumptions

* User must be authenticated to access project & task APIs
* Tasks are always linked to a project
* Assigned user must exist in users table

---

## 🧑‍💻 Author

Mahendra Mahawar
