Discount Code Uploader
This is a simple web application that allows users to upload a CSV file containing discount codes and saves them in the database. The application is built using the Laravel PHP framework and utilizes MySQL as the database developed by Shahrukh Mirza Nawandish.

Requirements
PHP 7.4 or higher
MySQL 5.7 or higher
Composer

Installation
Clone the repository to your local machine
Navigate to the project directory and run composer install to install the dependencies
Copy the .env.example file to .env and update the database credentials
Generate an application key by running php artisan key:generate
Run the migrations to create the necessary database tables by running php artisan migrate
Serve the application by running php artisan serve and visit http://localhost:8000 in your web browser

Usage
Visit the home page at http://localhost:8000
Fill in the form with the required details and select a CSV file to upload
Click on the "Upload" button to save the discount codes to the database
A success message will be displayed if the upload was successful, otherwise an error message will be displayed
Contributing

if you want to execute without frontend write the below code in terminal. The CSV file is in Storage/app folder:
php artisan db:seed --class=DiscountCodeSeeder

Database Details:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=coupons
DB_USERNAME=root
DB_PASSWORD=

Tables:
campaign
discount_codes

If you would like to contribute to this project, please follow these steps:

Fork the repository
Create a new branch for your feature or bug fix
Make your changes and commit them
Push your changes to your fork
Create a pull request

License
This project is open-sourced software licensed under the MIT license.

Step 1: Setting up the Database
I would start by creating a new database for the project, which would contain two tables: "Campaigns" and "DiscountCodes". The "Campaigns" table would have columns for the campaign ID, name, start and end dates, and any other relevant information. The "DiscountCodes" table would have columns for the discount code ID, the campaign ID it's related to, the code itself, and any other relevant information (such as usage statistics).

I would create these tables using a database migration tool, such as Laravel's built-in migration system, to ensure that they can easily be created and modified as needed.

Step 2: Parsing the CSV File
Next, I would write a PHP script to read the CSV file and insert each discount code into the database. I would use a library like League\Csv to parse the CSV file and iterate over each row. For each row, I would insert a new record into the "DiscountCodes" table, using the campaign ID and discount code value from the CSV file.

If you have any questions regarding this project please send mail to shahreukh@gmail.com