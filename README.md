# 🚀 Project Management System API (Laravel)

---

## 📌 Overview

This is a **Mini Project Management System API** built using Laravel.
It includes:

* 🔐 Authentication
* 📁 Project Management
* 📌 Task Assignment
* 🔍 Filtering
* 🔒 Authorization

---

## ⚙️ Setup Instructions

### 1️⃣ Clone the Repository

```bash id="cln1"
git clone https://github.com/mahendramahawar29/Project-Management.git
cd Project-Management
```

---

### 2️⃣ Install Dependencies

```bash id="dep2"
composer install
```

---

### 3️⃣ Setup Environment File

```bash id="env3"
cp .env.example .env
```

---

### 4️⃣ Configure Database

Open `.env` file and update:

```env id="db4"
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project_management
DB_USERNAME=root
DB_PASSWORD=
```

👉 **Important:**

* Create a database in phpMyAdmin named: `project_management`

---

### 5️⃣ Generate Application Key

```bash id="key5"
php artisan key:generate
```

---

### 6️⃣ Run Migrations (Create Tables)

```bash id="mig6"
php artisan migrate
```

---

### 7️⃣ (Optional) Run Seeders

```bash id="seed7"
php artisan migrate --seed
```

👉 This will insert dummy data if seeders are available.

---

### 8️⃣ Install Sanctum (if not already installed)

```bash id="san8"
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

---

### 9️⃣ Run the Server

```bash id="srv9"
php artisan serve
```

👉 API will be available at:

```
http://127.0.0.1:8000/api
```

---

## 🔐 Authentication Note

After login, use the token in headers:

```http id="authh"
Authorization: Bearer YOUR_TOKEN
Content-Type: application/json
```

---

## 🔐 Authentication APIs

### 🟢 Register

**POST** `/api/register`

Headers:

```http id="regH"
Content-Type: application/json
```

Body:

```json id="regB"
{
  "name": "Mahendra",
  "email": "test@gmail.com",
  "password": "123456"
}
```

---

### 🟢 Login

**POST** `/api/login`

Headers:

```http id="logH"
Content-Type: application/json
```

Body:

```json id="logB"
{
  "email": "test@gmail.com",
  "password": "123456"
}
```

Response:

```json id="logR"
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

```http id="commonH"
Authorization: Bearer TOKEN
Content-Type: application/json
```

---

## 📁 Project APIs

### 🟢 Create Project

**POST** `/api/projects`

Headers:

```http id="p1"
Authorization: Bearer TOKEN
Content-Type: application/json
```

Body:

```json id="p2"
{
  "title": "Project 1",
  "description": "Test project"
}
```

---

### 🟢 Get All Projects

**GET** `/api/projects`

Headers:

```http id="p3"
Authorization: Bearer TOKEN
```

---

### 🟢 Get Single Project

**GET** `/api/projects/{id}`

Headers:

```http id="p4"
Authorization: Bearer TOKEN
```

---

### 🟢 Update Project

**PUT** `/api/projects/{id}`

Headers:

```http id="p5"
Authorization: Bearer TOKEN
Content-Type: application/json
```

---

### 🔴 Delete Project

**DELETE** `/api/projects/{id}`

Headers:

```http id="p6"
Authorization: Bearer TOKEN
```

---

## 📌 Task APIs

### 🟢 Create Task

**POST** `/api/tasks`

Headers:

```http id="t1"
Authorization: Bearer TOKEN
Content-Type: application/json
```

Body:

```json id="t2"
{
  "project_id": 1,
  "title": "Task 1",
  "status": "pending",
  "assigned_to": 1,
  "due_date": "2026-03-30"
}
```

---

### 🟢 Get Tasks

**GET** `/api/tasks`

Headers:

```http id="t3"
Authorization: Bearer TOKEN
```

---

### 🔍 Filters

* By status → `/api/tasks?status=pending`
* By assigned user → `/api/tasks?assigned_to=1`
* By due date → `/api/tasks?due_date=2026-03-30`

---

### 🟢 Get Single Task

**GET** `/api/tasks/{id}`

Headers:

```http id="t4"
Authorization: Bearer TOKEN
```

---

### 🟢 Update Task

**PUT** `/api/tasks/{id}`

Headers:

```http id="t5"
Authorization: Bearer TOKEN
Content-Type: application/json
```

---

### 🔴 Delete Task

**DELETE** `/api/tasks/{id}`

Headers:

```http id="t6"
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

**Mahendra Mahawar**
