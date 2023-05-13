<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php //connect_createDB
        // put your code here
        $host = 'localhost'; //Машина, на която работи MySQL сървърът
        $dbUser = 'root'; // Потребителско име за MySQL
        $dbPass = ''; // Парола за MySQL
        $dbName = 'real_estate_portal';
        //връзка със сървъра
        if(!$dbConn = mysqli_connect($host, $dbUser, $dbPass)){
        die('Не може да се осъществи връзка със сървъра.');}
       
        
         $sql = 'CREATE Database real_estate_portal';
         if ($queryResource=mysqli_query($dbConn,$sql)){
         echo "Базата данни е създадена. <br>";}
         else {echo "Грешка при създаване на базата данни: " . mysqli_error($dbConn);}
         
         if (!mysqli_select_db($dbConn,$dbName)){
         die('Не може да се селектира базата от данни: '  . mysqli_error($dbConn));}
         mysqli_query($dbConn,"SET NAMES 'UTF8'");
         
         //create_table
         //AUTO_INCREMENT for ids
         
         $sql = "CREATE TABLE Cities (
                city_id INT(10) NOT NULL AUTO_INCREMENT,
                city_name VARCHAR(30) DEFAULT NULL,
                PRIMARY KEY (city_id)
                ) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
         $result = mysqli_query($dbConn,$sql);
         if(!$result){
         die('Грешка при създаване на таблицата: ' . mysqli_error($dbConn));}
         else {echo "Таблица Cities е създадена!"; }
         
         $sql = "CREATE TABLE Types (
                type_id INT(10) NOT NULL AUTO_INCREMENT,
                type_name VARCHAR(30) DEFAULT NULL,
                PRIMARY KEY (type_id)
                ) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
         $result = mysqli_query($dbConn,$sql);
         if(!$result){
         die('Грешка при създаване на таблицата: ' . mysqli_error($dbConn));}
         else {echo "Таблица Types е създадена!"; }
         
        $sql = "CREATE TABLE Sellers (
                seller_id INT(10) NOT NULL AUTO_INCREMENT,
                seller_name VARCHAR(30) DEFAULT NULL,
                telephone VARCHAR(30) DEFAULT NULL,
                PRIMARY KEY (seller_id)
                ) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
         $result = mysqli_query($dbConn,$sql);
         if(!$result){
         die('Грешка при създаване на таблицата: ' . mysqli_error($dbConn));}
         else {echo "Таблица Sellers е създадена!"; }
         
         $sql = "CREATE TABLE Acc_Types (
                acc_type_id INT(10) NOT NULL AUTO_INCREMENT,
                acc_type_name VARCHAR(30) DEFAULT NULL,
                PRIMARY KEY (acc_type_id)
                ) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
         $result = mysqli_query($dbConn,$sql);
         if(!$result){
         die('Грешка при създаване на таблицата: ' . mysqli_error($dbConn));}
         else {echo "Таблица Acc_Types е създадена!"; }
         
         $sql = "CREATE TABLE Accounts (
                acc_id INT(10) NOT NULL AUTO_INCREMENT,
                acc_name VARCHAR(30) DEFAULT NULL,
                acc_password VARCHAR(30) DEFAULT NULL,
                acc_type_id INT(10) DEFAULT NULL,
                PRIMARY KEY (acc_id),
                KEY acc_type_id (acc_type_id)
                ) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
         $result = mysqli_query($dbConn,$sql);
         if(!$result){
         die('Грешка при създаване на таблицата: ' . mysqli_error($dbConn));}
         else {echo "Таблица Accounts е създадена!"; }
         
         $sql ="CREATE TABLE Estates (
                estate_id INT(10) NOT NULL AUTO_INCREMENT,
                price FLOAT(9) DEFAULT NULL,
                quadrature INT(10),
                rooms INT(1) DEFAULT NULL,
                estate_address VARCHAR(100) DEFAULT NULL,
                city_id INT(10) NOT NULL,
                type_id INT(10) NOT NULL,
                furnished BIT DEFAULT false,
                seller_id INT(10) NOT NULL,
                acc_id INT(10) NOT NULL,
                PRIMARY KEY (estate_id),
                KEY city_id (city_id),
                KEY type_id (type_id),
                KEY seller_id (seller_id),
                KEY acc_id (acc_id)
                ) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
        $result = mysqli_query($dbConn,$sql);
        if(!$result){
        die('Грешка при създава Estates на таблицата: ' . mysqli_error($dbConn));}
        else {echo "Таблицата Estates е създадена!"; }
        ?>
    </body>
</html>
