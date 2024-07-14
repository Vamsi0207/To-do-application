# Todo Application

Todo is a web application that allows users to manage their to-do tasks. Users can register, log in, add tasks, update tasks, and delete tasks. The application is built using HTML, CSS, JavaScript, PHP, and MySQL.

## Features

- **User Authentication**: Users can register and log in securely.
- **CRUD Operations**: Create, read, update, and delete tasks.
- **User-Specific Tasks**: Each user has their own set of tasks.

## Installation

To run this application locally, follow these steps:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/Vamsi0207/To-do-application
   cd todo-application
### Set up the database:

1. **Create a MySQL database:**

   - Create a new MySQL database using your preferred method.

2. **Import the database schema:**

   - Import the below create commands into your MySQL database to create the necessary tables.
     
### Configure the database connection:

1. **Update the database configuration:**

   - Update the following database configuration variables in `*.php` with your MySQL database credentials:
   - Here you can directly use your required credentials.
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USERNAME', 'your_username');
     define('DB_PASSWORD', 'your_password');
     define('DB_NAME', 'your_database_name');
     ```

## Running the Application

1. **Ensure you have a web server environment:**

   - Make sure you have a web server environment set up (e.g., XAMPP, WAMP, or any PHP server).

2. **Start the server:**

   - Start your web server.

3. **Access the application:**

   - Open your web browser and navigate to the URL where your application is hosted.

## Usage

- **Registration**: Create a new account with a unique username and password.
- **Login**: Access your account securely.
- **Add Tasks**: Create new tasks with a title and description.
- **Update Tasks**: Modify task details or mark them as completed.
- **Delete Tasks**: Remove tasks from your list.
