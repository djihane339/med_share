# med_share
A web application for medicine donation management.
# 💊 Teryaq - Medicine Sharing Platform

## 📝 Project Description
Teryaq is a web-based full-stack application designed to manage the donation and distribution of surplus medications. The platform serves as a digital intermediary between donors (individuals or pharmacies) and recipients. By providing a real-time inventory system, Teryaq aims to reduce medical waste, save costs, and support community healthcare by ensuring that unexpired medicines reach those who need them most.

---

## 🛠️ Technologies Used
The system is built using a modern modular architecture:
* Backend: PHP 8.1 (Server-side logic, session management, and CRUD operations).
* Database: MySQL (Relational data storage for medicines, users, and pharmacies).
* Frontend: * HTML5 & CSS3: For structural integrity and responsive, mobile-first design.
    * Vanilla JavaScript: For real-time client-side interactivity and asynchronous filtering (Live Search).
* Version Control: GitHub for repository management and code documentation.

---

## ⚙️ Setup and Execution Instructions

### Prerequisites
* XAMPP or WAMP server installed.
* A web browser (Chrome, Firefox, or Edge).

### Installation Steps
1.  Download the Project:
    * Clone this repository or download the ZIP file.
    * Place the project folder in your local server directory (e.g., C:/xampp/htdocs/Teryaq/).

2.  Database Configuration:
    * Open phpMyAdmin (http://localhost/phpmyadmin).
    * Create a new database named med_share_db.
    * Import the provided SQL file (e.g., med_share_db.sql) into the new database.
    * Ensure your config.php file matches your local database credentials (host, username, password).

3.  Running the Application:
    * Open the XAMPP Control Panel and start Apache and MySQL.
    * Navigate to the project in your browser: http://localhost/Teryaq/index.php.

---

## 💻 Contribution
Developed by Student Developer as part of the Web Development Course Project.
