Project Setup
Follow the steps below to set up and run this project.

Requirements
PHP Version: PHP 8 or greater
Server: XAMPP or WAMP
Installation
Step 1: Clone the Repository
Clone this project into your local development environment.

Step 2: Set Up the Server
XAMPP:
Copy the project folder into C:/xampp/htdocs/.
WAMP:
Copy the project folder into C:/wamp/www/.
Step 3: Import the Database
Create a new database on your local server (e.g., tailwebs_task).
Import the SQL file located at database/tailwebs_task.sql.
Step 4: Run the Project
Start your server (XAMPP or WAMP).
Open your browser and navigate to http://localhost/[project_name].
The project should now be running.

Additional Features

Dashboard Page:
Donut Chart Integration: Displays student marks categorized by ranges (e.g., 90-100, 70-80, 1-60, etc.).
Recently Added Students: A section displaying recently added students.

Security:
I implemented security measures to prevent two types of hacking attacks:
a. SQL Injection: Utilized parameterized queries to prevent this type of attack.
b. XSS Attack: Used the htmlspecialchars function to validate input and prevent malicious scripts from being injected into the login form.
Responsive Template:
The project is gadget-friendly. I used a Bootstrap template to ensure responsive design and avoid layout issues on various devices.

Testing Login Credentials
Email: gowtham@gmail.com
Password: gowtham

Screenshots

Login Page
![Screenshot (1135)](https://github.com/user-attachments/assets/cb05a15f-7014-4094-af2d-da294ef328ba)

Register Page
![Screenshot (1136)](https://github.com/user-attachments/assets/309d3440-5404-4939-abb1-99501b2d9159)

Dashboard Page
![Screenshot (1137)](https://github.com/user-attachments/assets/b5d47709-115f-403c-83a7-5bae06c3cea8)

Students Page
![Screenshot (1138)](https://github.com/user-attachments/assets/0ad4f1d3-8c47-4924-b1e3-304b14253935)
