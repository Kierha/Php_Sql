<?php

//autoload

require 'vendor\fzaninotto\faker\src\autoload.php';

$faker = Faker\factory::create('fr_FR');

require 'conDB.php';

$user = [];
$photo = [];
$product = [];
$address = [];


//Clean Database
$pdo->exec ("SET FOREIGN_KEY_CHECKS = 0");
$pdo->exec ('TRUNCATE TABLE user');
$pdo->exec ('TRUNCATE TABLE photo');
$pdo->exec ('TRUNCATE TABLE product');
$pdo->exec ('TRUNCATE TABLE address');
$pdo->exec ('TRUNCATE TABLE cart');
$pdo->exec ('TRUNCATE TABLE command');
$pdo->exec ('TRUNCATE TABLE rate');
$pdo->exec ('TRUNCATE TABLE photo_product');
$pdo->exec ('TRUNCATE TABLE user_address');
$pdo->exec ('TRUNCATE TABLE command_line');
$pdo->exec ("SET FOREIGN_KEY_CHECKS = 1");

echo 'Database tables clean successfuly !!';

//Create fake photo
for ($i = 0; $i < 100; $i++) {
    $pdo->exec("INSERT INTO photo
                SET 
                    photo_url='{$faker->text($maxNbChars = 10)}'
                    ");
    $photo[] = $pdo->lastInsertId();
}
echo 'Photo table done !';


//Create fake user
$hashPassword = null;
for ($i = 0; $i < 100; $i++) {
    $hashPassword = password_hash($faker->password, PASSWORD_BCRYPT);
    $pdo->exec("INSERT INTO user
                SET  id_photo='{$faker->numberBetween($min = 1, $max = 100)}',
                     user_FirstName='{$faker->userName}',
                     user_LastName='{$faker->Name}',
                     user_Password='{$hashPassword}',
                     user_Email='{$faker->freeEmail}',
                     user_Phone_number='{$faker->e164PhoneNumber}'
              ");

    $user[] = $pdo->lastInsertId();
}
echo 'User table done !';


//Create fake address
for ($i = 0; $i < 100; $i++) {
    $pdo->exec("INSERT INTO address
                SET  Street='{$faker->streetName }',
                     build_Number='{$faker->buildingNumber}',
                     Postal_code='{$faker->postcode}',
                     City ='{$faker->city}'
            ");

    $address[] = $pdo->lastInsertId();
}
echo 'Address table done !';



//Create fake product
for ($i = 0; $i < 100; $i++) {
    $pdo->exec("INSERT INTO product
                SET  product_Name='{$faker->word}',
                     product_Description='{$faker->sentence($nbWords = 10, $variableNbWords = true) }',
                     product_Price_unit='{$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 500)},// 48.8932}',
                     product_Stock ='{$faker->randomDigit}'
            ");

    $product[] = $pdo->lastInsertId();
}
echo 'Product table done !';



//Create fake product_photo_id
for ($i = 0; $i < 100; $i++) {
    $pdo->exec("INSERT INTO photo_product
                SET  id_product='{$faker->numberBetween($min = 1, $max = 100)}',
                     id_photo='{$faker->numberBetween($min = 1, $max = 100)}'
");
    $product_photo[] = $pdo->lastInsertId();
}
echo 'Product table done !';


//Create fake rate
for ($i = 0; $i < 100; $i++) {
    $pdo->exec("INSERT INTO rate
                SET id_user='{$faker->numberBetween($min = 1, $max = 100)}',
                    id_product='{$faker->numberBetween($min = 1, $max = 100)}',
                    rate_score='{$faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 5)}'
");
    $rate[] = $pdo->lastInsertId();
}
echo 'Rate table done !';


//Create fake command
for ($i = 0; $i < 100; $i++) {
    $pdo->exec("INSERT INTO command
                SET id_user='{$faker->numberBetween($min = 1, $max = 100)}',
                    command_Date='{$faker->date} {$faker->time}',
                    info_command='{$faker->sentence($nbWords = 10, $variableNbWords = true) }',
                    Total_price='{$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 2000)},// 48.8932}'
");
    $command[] = $pdo->lastInsertId();
}
echo 'Command table done !';


//Create fake Command_line
for ($i = 0; $i < 100; $i++) {
    $pdo->exec("INSERT INTO command_line
                SET id_product='{$faker->numberBetween($min = 1, $max = 100)}',
                    Quantity='{$faker->randomDigit}',
                    Quantity_price='{$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 2000)},// 48.8932}'                
");
    $command_line[] = $pdo->lastInsertId();
}
echo 'Command_line table done !';


//Create fake User_address_id
for ($i = 0; $i < 100; $i++) {
    $pdo->exec("INSERT INTO user_address
                SET id_user='{$faker->numberBetween($min = 1, $max = 100)}',
                    id_address='{$faker->numberBetween($min = 1, $max = 100)}'
                 
");
    $user_address[] = $pdo->lastInsertId();
}
echo 'User_address table done !';


//Create fake cart
for ($i = 0; $i < 100; $i++) {
    $pdo->exec("INSERT INTO cart
                SET id_user='{$faker->numberBetween($min = 1, $max = 100)}',
                    id_command_line='{$faker->numberBetween($min = 1, $max = 100)}',
                    Total_cart='{$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 2000)},// 48.8932}'    
                 
");
    $cart[] = $pdo->lastInsertId();
}
echo 'Cart table done !';