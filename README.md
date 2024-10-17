<h1>Project Setup</h1>
Follow the steps below to set up and run this project.

<h1>Requirements</h1>
<p>PHP Version: PHP 8 or greater</p>
<p>Server: XAMPP or WAMP</p>

<h1>Installation</h1>
<h3>Step 1: Clone the Repository</h3> 
<p>Clone this project into your local development environment.</p>

<h3>Step 2: Set Up the Server</h3>
<ul>
  <li>
    <h6>XAMPP:</h6>
    <p>Copy the project folder into C:/xampp/htdocs/.</p>
  </li>
  <li>
    <h6>WAMP:</h6>
    <p>Copy the project folder into C:/wamp/www/.</p>
  </li>
</ul>

<h3>Step 3: Import the Database</h3>
<ul>
  <li><p>Create a new database on your local server (e.g., tailwebs_task).</p></li>
  <li><p>Import the SQL file located at database/tailwebs_task.sql.</p></li>
</ul>

<h3>Step 4: Run the Project</h3>
<ul>
  <li><p>Start your server (XAMPP or WAMP).</p></li>
  <li><p>Open your browser and navigate to http://localhost/[project_name].</p></li>
  <li><p>The project should now be running.</p></li>
</ul>

<h1>Additional Features</h1>

<h3>Dashboard Page:</h3>
<ul>
  <li>
    <h6>Donut Chart Integration:</h6> Displays student marks categorized by ranges (e.g., 90-100, 70-80, 1-60, etc.).
  </li>
  <li>
    <h6>Recently Added Students:</h6> A section displaying recently added students.
  </li>
</ul>

<h3>Security:</h3>
<h6>I implemented security measures to prevent two types of hacking attacks:</h6>
<ul>
  <li><p>SQL Injection: Utilized parameterized queries to prevent this type of attack.</p></li>
  <li><p>XSS Attack: Used the htmlspecialchars function to validate input and prevent malicious scripts from being injected into the login form.</p></li>
</ul>

<h3>Responsive Template:</h3>
<ul>
  <li><p>The project is gadget-friendly. I used a Bootstrap template to ensure responsive design and avoid layout issues on various devices.</p></li>
</ul>

<h3>Testing Login Credentials</h3>
<p>Email: gowtham@gmail.com</p>
<p>Password: gowtham</p>

<h3>Screenshots</h3>

<h6>Login Page</h6>
![Screenshot (1135)](https://github.com/user-attachments/assets/cb05a15f-7014-4094-af2d-da294ef328ba)

<h6>Register Page</h6>
![Screenshot (1136)](https://github.com/user-attachments/assets/309d3440-5404-4939-abb1-99501b2d9159)

<h6>Dashboard Page</h6>
![Screenshot (1137)](https://github.com/user-attachments/assets/b5d47709-115f-403c-83a7-5bae06c3cea8)

<h6>Students Page</h6>
![Screenshot (1138)](https://github.com/user-attachments/assets/0ad4f1d3-8c47-4924-b1e3-304b14253935)
