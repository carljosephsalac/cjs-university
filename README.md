# CJS University Web App

A web-based application designed to manage student records, enabling users to download and upload student data seamlessly. This project is built using Laravel, Laravel Excel, Tailwind CSS, and Flowbite, and is hosted on InfinityFree

## Features

- **Student Record Management**: Easily upload and download student records in various formats.
- **User Authentication**: Secure login and registration system.
- **User Authorization**: Students can only view records, while teachers can modify them.
- **Responsive Design**: Optimized for various screen sizes with Tailwind CSS.
- **Excel Integration**: Export and import student data using Laravel Excel.

## Installation

Follow the steps below to set up the project locally:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/carljosephsalac/cjs-university.git
   cd cjs-university
2. **Install dependencies:**

   ```bash
   composer install
   npm install
3. **Copy the .env file and configure your environment:**

   ```bash
   cp .env.example .env
   ```
   Update the .env file with your database credentials and other necessary configurations.

4. **Generate application key:**

   ```bash
   php artisan key:generate
    
5. **Run migrations:**

   ```bash
   php artisan migrate
6. **Run the development server:**

   ```bash
   php artisan serve
   ```
   The application will be accessible at http://localhost:8000.

## Usage

- **Adding Student Records**: Add student records by clicking the add button.
- **Downloading Student Records**: Export student records by clicking the download button.
- **Uploading Student Records**:  Import student records by clicking the upload button.

## Technologies Used

- **Laravel**: The PHP framework used to build the application.
- **Laravel Excel**: A package for exporting and importing Excel files.
- **Tailwind CSS**: A utility-first CSS framework for styling.
- **Flowbite**: A component library built on Tailwind CSS for additional UI elements.

## Hosting
- This project is hosted on InfinityFree, providing free hosting services for PHP and MySQL applications.

## Contributing
1. Fork the repository.
2. Create a new branch (git checkout -b feature-branch).
3. Commit your changes (git commit -m 'Add some feature').
4. Push to the branch (git push origin feature-branch).
5. Open a pull request.

## Contacts
- **Email**: salaccarljoseph@gmail.com
- **Messenger**: https://www.facebook.com/carl15joseph/
