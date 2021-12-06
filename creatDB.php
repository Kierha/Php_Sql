<?php

// Db connection

require 'conDB.php';




//Create photo table

$pdo->exec("CREATE TABLE photo (
    id_photo INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    photo_url text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Table : PHOTO, ';




//Create user table

$pdo->exec("CREATE TABLE user (
    id_user INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_photo int DEFAULT NULL,
    user_FirstName VARCHAR(255) NOT NULL,
    user_LastName VARCHAR(255) NOT NULL,
    user_Password CHAR(255) NOT NULL,
    user_Email VARCHAR(255) NOT NULL,
    user_Phone_number VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_photo) REFERENCES photo (id_photo) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Table : USER, ';



//Create address table

$pdo->exec("CREATE TABLE address (
    id_address INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    Street VARCHAR (255) NOT NULL,
    build_Number int NOT NULL,
    Postal_code int NOT NULL,
    City VARCHAR (255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Table : ADDRESS, ';


//Create product table

$pdo->exec("CREATE TABLE product (
    id_product INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    product_Name VARCHAR (255) NOT NULL,
    product_Description text NOT NULL,
    Product_Price_unit double NOT NULL,
    product_Stock int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Table : PRODUCT, ';


//Create photo_product table

$pdo->exec("CREATE TABLE photo_product (
    id_photo INT NOT NULL,
    id_product INT NOT NULL,
    FOREIGN KEY (id_photo) REFERENCES photo (id_photo) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_product) REFERENCES product (id_product) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Table : PHOTO_PRODUCT, ';


//Create rate table

$pdo->exec("CREATE TABLE rate (
    id_user INT NOT NULL,
    id_product INT NOT NULL,
    rate_score double NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user (id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_product) REFERENCES product (id_product) ON DELETE CASCADE ON UPDATE CASCADE  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Table : RATE, ';


//Create command table

$pdo->exec("CREATE TABLE command (
    id_user INT NOT NULL,
    command_Date DATE NOT NULL,
    info_command text NOT NULL,
    Total_price double NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user (id_user) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Table : RATE, ';


//Create Command_line table

$pdo->exec("CREATE TABLE command_line (
    id_command_line INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_product INT NOT NULL,
    Quantity int NOT NULL,
    Quantity_price double NOT NULL,
    FOREIGN KEY (id_product) REFERENCES product (id_product) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Table : COMMAND_LINE, ';

//Create user_address table

$pdo->exec("CREATE TABLE user_address (
    id_address INT NOT NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user (id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_address) REFERENCES address (id_address) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Table : USER_ADDRESS, ';


//Create cart table

$pdo->exec("CREATE TABLE cart (
    id_user INT NOT NULL,
    id_command_line INT NOT NULL,
    Total_cart double NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user (id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_command_line) REFERENCES command_line (id_command_line) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Table : CART
, ';
