# Project Setup

Follow the steps below to set up and run this project.

## Requirements
- **PHP Version:** PHP 8 or greater
- **Server:** XAMPP or WAMP

## Installation

### Step 1: Clone the Repository
Clone this project into your local development environment using the following command:

```bash
git clone [repository-url]
```

### Step 2: Set Up the Server
- **For XAMPP:** Copy the project folder to `C:/xampp/htdocs/`.
- **For WAMP:** Copy the project folder to `C:/wamp/www/`.

### Step 3: Import the Database
1. Create a new database in your local server (e.g., `tailwebs_task`).
2. Import the SQL file located at `database/tailwebs_task.sql`.

### Step 4: Run the Project
1. Start your server (XAMPP or WAMP).
2. Open your browser and navigate to:

```url
http://localhost/[project_name]
```

The project should now be running.

## Features

### Dashboard
- **Donut Chart Integration:** Displays student marks categorized by ranges (e.g., 90-100, 70-80, 1-60, etc.).
- **Recently Added Students:** Section displaying recently added students.

### Security
The following security measures have been implemented:
- **SQL Injection Protection:** Used parameterized queries to prevent SQL injection.
- **XSS Protection:** Applied `htmlspecialchars()` to sanitize inputs and prevent malicious scripts in forms.

### Responsive Design
This project uses a **Bootstrap** template to ensure the layout is responsive across various devices, providing a seamless experience on all screen sizes.

## Testing Login Credentials
- **Email:** gowtham@gmail.com
- **Password:** gowtham

## Screenshots
### Login Page
![Screenshot (1135)](https://github.com/user-attachments/assets/cb05a15f-7014-4094-af2d-da294ef328ba)

### Register Page
![Screenshot (1136)](https://github.com/user-attachments/assets/309d3440-5404-4939-abb1-99501b2d9159)

### Dashboard Page
![Screenshot (1137)](https://github.com/user-attachments/assets/b5d47709-115f-403c-83a7-5bae06c3cea8)

### Students Page
![Screenshot (1138)](https://github.com/user-attachments/assets/0ad4f1d3-8c47-4924-b1e3-304b14253935)
