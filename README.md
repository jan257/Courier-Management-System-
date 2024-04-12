# Rapid Delivery: Courier Management System

## Overview

Rapid Delivery Management System is a web-based application designed to facilitate courier services by providing features for placing courier orders, tracking delivery status, and collecting user feedback. The system is built using PHP and MySQL, ensuring robustness, scalability, and security.

## Features

- **User Authentication**: Secure login mechanism to authenticate users and maintain session integrity.
- **Place Courier Orders**: Users can place new courier orders by providing necessary details such as sender information, recipient information, and package details.
- **Track Delivery Status**: Real-time tracking of delivery status to keep users informed about the progress of their courier orders.
- **Feedback Submission**: Allows users to provide feedback on their delivery experience, enabling continuous improvement of service quality.
- **Responsive Design**: Utilizes Bootstrap framework for responsive and mobile-friendly user interfaces, ensuring optimal user experience across devices.

  ## Technologies Used

- **Frontend**: HTML, CSS, Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **Framework**: Bootstrap 5
- **Web Server**: Apache
- **Version Control**: Git


## Installation

1. Clone the repository to your local machine or download the ZIP file of the project.
   
~~~
git clone https://github.com/jan257/Courier-Management-System-.git
~~~

2. Install XAMPP or a similar web server software if you haven't already.

3. Start the Apache and MySQL modules in XAMPP.

4. Create a new database in PHPMyAdmin or a similar tool.

- Open your MySQL client or command line interface. Run the following command to create a new database named "cms":
        

~~~
  CREATE DATABASE cms;
~~~
    
    
- If MySQL you are using then use the Database we created above "cms". To use that database give command 

~~~
  use cms;
~~~
- Now we'll start creating the Tables for our Database.
    
    - Creating a "users" Table.

    ~~~ 
        CREATE TABLE `users` (
        `sno` int NOT NULL AUTO_INCREMENT,
        `username` varchar(20) NOT NULL,
        `email` varchar(25) DEFAULT NULL,
        `password` varchar(25) NOT NULL,
        `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
         PRIMARY KEY (`sno`),
        UNIQUE KEY `email` (`email`)
        );
    ~~~
    
    - Creating a "place_courier"  Table.

    ~~~
        CREATE TABLE `place_courier` (
        `name` varchar(20) NOT NULL,
        `email` varchar(25) NOT NULL,
        `phone` bigint NOT NULL,
        `sadd` varchar(50) NOT NULL,
        `radd` varchar(50) NOT NULL,
        `date` date NOT NULL,
        PRIMARY KEY (`email`,`phone`),
        UNIQUE KEY `uk_phone` (`phone`),
        FOREIGN KEY (`email`) REFERENCES `users`(`email`) ON DELETE CASCADE
        );

    ~~~


    - Creating a "feedback" Table.

    ~~~
        CREATE TABLE `feedback` (
        `name` varchar(25) NOT NULL,
        `phone` bigint NOT NULL,
        `feedback` varchar(200) NOT NULL,
        UNIQUE KEY `phone` (`phone`),
        FOREIGN KEY (`phone`) REFERENCES place_courier(`phone`) ON DELETE CASCADE
        );

    ~~~

    - Creating a "tracking" Table.

    ~~~
        CREATE TABLE tracking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    courier_id VARCHAR(20),
    location VARCHAR(255),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50));

    ~~~

    - Creating a "staff" Table.

    ~~~
        CREATE TABLE `staff` (
        `sno` int NOT NULL AUTO_INCREMENT,
        `name` varchar(20) NOT NULL,
        `phone` bigint NOT NULL,
        `address` varchar(50) NOT NULL,
        `govid` varchar(50) NOT NULL,
        PRIMARY KEY (`govid`),
        UNIQUE KEY `phone` (`phone`),
        KEY `sno` (`sno`)
        );
    ~~~
    
5. Move the project files (login folder) into the htdocs folder in your XAMPP installation directory.

    - Inside the login folder, go to partials, then to _dbconnect(php file).
    - Change the username and password accordingly to your MySQL.

6. Now Open your web browser and navigate to ""http://localhost/login/signup.php"".

7. Do Signup to the website and then Login.
   - Now open the MySQL and query the "users" Table 
    ~~~
    Select * from users;
    ~~~
It will show the registered users. (**CREATE Operation** is performed here and when the user doing **Signup** to the website).

It reads the data from the database (Users Table), and then performs the desired operation (**READ Operation**).

_Similarly, Place Courier and Check for delivery will work(Create and Read operations).
Check for delivery status will show the delivery status after 24 Hours._


- To check in MySQL(cms) database the details which user entered in place courier form, write the query given below :

    ~~~
    Select * from place_courier;
    ~~~


8. Now, Feedback feature allows the user to give the feedback for the User Experience.
If the user wants to delete his/her feedback or to edit the feedback, we provided the feature of *Delete Feedback* which performs the **DELETE Operation**

**"Only the user who has signed up and logged in can place a courier and provide Feedback."**

_All the operations whatever the user will do will be updated on the database. You can query the database and check for the operations._

- To check the feedback given/deleted by the user in MySQL (cms) Database, write the query given below:

    ~~~
    Select * from feedback;
    ~~~
 


9. Now, staff registration can also be completed here. If a user mistakenly entered incorrect details or wishes to update their information, they can do so here.(**UPDATE Operation**)
- To check the updated staff details in MySQL (cms) Database, write the query given below:

    ~~~
    Select * from staff;
    ~~~
10. Now, To retrieve the details of all courier shipments from the tracking table, you can use the following SQL query.
    -This query will return all rows from the tracking table, displaying information about each courier shipment, including the courier ID, location, status, and timestamp.
    
    ~~~
     Select * from tracking;
    ~~~


## Usage

1. Register or login to the system using valid credentials.
2. Place a new courier order by providing sender information, recipient information, and package details.
3. Track the status of your courier order using the tracking ID provided upon order placement.
4. Provide feedback on your delivery experience to help improve service quality.


## Author

- [Jahnavi P](https://github.com/jan257)

## Support

For support, email jahnavi03p@gmail.com .





