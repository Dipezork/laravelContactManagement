# Laravel CRUD for Contact Management

This repository contains a Laravel application for managing contacts, implementing the CRUD (Create, Read, Update, Delete) operations. The application provides a user-friendly interface to easily add, view, update, and delete contact information.

## Features

- **Create:** Add new contacts with details such as name, email, phone number, and address.
- **Read:** View the list of all contacts along with their details.
- **Update:** Edit the information of existing contacts, including name, email, phone number, and address.
- **Delete:** Remove unwanted contacts from the system.
- **Search:** Search and filter contacts based on name, email, or phone number.

## Technologies Used

- **Laravel**: A powerful PHP framework for building robust web applications.
- **MySQL**: A relational database management system for storing contact information.
- **HTML/CSS**: Used for creating the user interface and styling the application.
- **Bootstrap**: A popular CSS framework for responsive and modern web design.

## Setup Instructions

1. Clone the repository: `git clone https://github.com/your-username/laravel-contact-management.git`
2. Navigate to the project directory: `cd laravel-contact-management`
3. Install the dependencies: `composer install`
4. Create a copy of the `.env.example` file and rename it to `.env`.
5. Generate a new application key: `php artisan key:generate`
6. Configure the database connection in the `.env` file with your MySQL credentials.
7. Run the database migrations: `php artisan migrate`
8. Start the development server: `php artisan serve`
9. Access the application in your web browser at `http://localhost:8000`.

## Contributing

Contributions are welcome! If you would like to contribute to this project, please follow these guidelines:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and ensure they adhere to the coding standards.
4. Commit your changes and push the branch to your forked repository.
5. Submit a pull request with a detailed description of your changes.

## License

This project is licensed under the [MIT License](LICENSE).

## Contact

If you have any questions or suggestions, feel free to reach out to me at [gabriel.tarozzo@hotmail.com].



## Inserts in MySQL

INSERT INTO recruitment.roles (name, role, created_at, updated_at)
VALUES ('Usuario Comum', 1, NOW(), NOW());

INSERT INTO recruitment.roles (name, role, created_at, updated_at)
VALUES ('Usuario Autenticado', 2, NOW(), NOW());


