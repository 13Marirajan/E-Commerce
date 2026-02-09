E-Commerce – 3D Model Marketplace

Voxel Vault is a web-based platform for browsing, purchasing, and downloading 3D models.
This project is developed as an academic project and demonstrates full-stack web development concepts including frontend design, backend logic, database integration, and payment gateway integration.

Project Overview

Voxel Vault allows users to:

View available 3D models

Add models to a cart

Complete payment using Razorpay

Download purchased 3D models after successful payment

Technologies Used
Frontend:
  HTML,CSS,JavaScript

Backend:
  PHP,Database,MySQL

Payment Gateway:
  Razorpay (Test Mode)

Server:
  XAMPP (Apache & MySQL)

Database Structure
Table: models
CREATE TABLE models (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    format VARCHAR(50),
    download_link TEXT
);


Payment Flow

  User adds products to the cart
  Cart total is calculated using JavaScript
  User proceeds to checkout
  Payment is processed using Razorpay
  On successful payment, user is redirected to the success page
  Download links are shown for purchased models


How to Run the Project (Step by Step)

  Install XAMPP
  Start Apache and MySQL 
  Copy the project folder to:
  C:\xampp\htdocs\project


Create the database using:
  http://localhost/phpmyadmin


Import or create the models table

Open the browser and visit:
  http://localhost/project/

Project Outcome

Successfully built a complete e-commerce flow for digital products
Implemented database-driven content
Integrated a real payment gateway (Razorpay)
Enabled secure access to download links after payment

Developed By

  Marirajan
  BCA Student
  web developer

Disclaimer

  This project is developed for educational purposes only.
  Razorpay integration is used in test mode.
