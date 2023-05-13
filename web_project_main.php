<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Portal</title>
    <link rel="stylesheet" href="main_page_style.css">
    <link rel="stylesheet" href="style_main.css">
</head>
<body>
    <div class="header_of_site">
        <h1>Real Estate Portal</h1>       
    </div>

    <form action="#" method="post">

    <div class="sorting">
        <p>Order by:
            <select name="sorting",id="sorting">
                <option value="ascending">Order by price (ascending)</option>
                <option value="descending">Order by price (descending)</option>
                 <option value="newest">Order by newest</option>
                <option value="oldest">Order by oldest</option>
            </select>
            <input type="submit" name="sort" value="Sort">
        </p>
    </div>

   
    <div class="filtering">
        <p>select a city:</p>
        <div class="filterbox">
        <input type="radio" name="city" value="Shumen"> Shumen<br>
        <input type="radio" name="city" value="Varna"> Varna<br>
        <input type="radio" name="city" value="Burgas"> Burgas<br>
        <input type="radio" name="city" value="Sofia"> Sofia<br>
        <input type="radio" name="city" value="Plovdiv"> Plovdiv<br>
        <input type="radio" name="city" value="Veliko Tarnovo"> Veliko Tarnovo<br>
        <input type="radio" name="city" value="none" checked> none<br>
        </div>
        <br>
        <p>select a price range:</p>
        <div class="filterbox">
        <input type="radio" name="price" value="10000"> 10k - 29 999 lv.<br>
        <input type="radio" name="price" value="30000"> 30k - 49 999 lv.<br>
        <input type="radio" name="price" value="50000"> 50k - 69 999 lv.<br>
        <input type="radio" name="price" value="70000"> 70k - 89 999 lv.<br>
        <input type="radio" name="price" value="90000"> 90k - 109 999 lv.<br>
        <input type="radio" name="price" value="110000"> 110k+ lv.<br>
        <input type="radio" name="price" value="0" checked> none<br>
        </div>
        <br>
        <p>Select number of rooms:</p>
        <div class="filterbox">
            <input type="radio" name="rooms" value="1"> one<br>
            <input type="radio" name="rooms" value="2"> two<br>
            <input type="radio" name="rooms" value="3"> three<br>
            <input type="radio" name="rooms" value="4"> four<br>
            <input type="radio" name="rooms" value="5"> five<br>
            <input type="radio" name="rooms" value="6"> six<br>
            <input type="radio" name="rooms" value="7"> seven<br>
            <input type="radio" name="rooms" value="8"> eight<br>
            <input type="radio" name="rooms" value="9"> nine<br>
            <input type="radio" name="rooms" value="none" checked> none<br>

        </div>
        <br><input type="submit" name="filter" value="Filter"/>
        
        
    </div>
       
    <div class="background"></div>

    <div class="apartments">
        <?php
        include "config.php";
        ?>
    </div>