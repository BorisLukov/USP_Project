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
        $sql = "SELECT * FROM Estates"
                    . " inner join Cities on Estates.city_id=Cities.city_id"
                    . " inner join Types_of_estates on Estates.estate_type_id=Types_of_estates.estate_type_id"
                    . " inner join Sellers on Estates.seller_id=Sellers.seller_id";
        if (isset($_POST["filter"]))
        {
            $city = $_POST["city"];
            $price1 = (float)$_POST["price"];
            $price2 = (float)$price1 + 19999;
            $rooms = $_POST["rooms"];
            
            if($price1 >= 110000 || $price1 == 0){$price2 = 999999;}
            $filter = $sql." where Estates.price between $price1 and $price2";

            if($city != 'none'){
                $filter." and Cities.city_name = '$city'";
            }

            if($rooms != 'none'){
                $filter." and Estates.rooms = $rooms";
            }
            
            $sort_attr=$_POST['sorting'];
                if($sort_attr == 'ascending'){
                    $filter .=" order by Estates.price asc";
                }
                elseif($sort_attr == 'descending'){
                    $filter.=" order by Estates.price desc";
                }
                elseif($sort_attr == 'newest'){
                    $filter.=" order by Estates.estate_id asc";
                }
                elseif($sort_attr == 'oldest'){
                    $filter.=" order by Estates.estate_id desc";
                }
            
                $result =mysqli_query($dbConn, $filter);
                if($result->num_rows)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $show = "<b><h2>Estate price: ".$row['price']."</b></h2><h3>".
                                "Quadrature: ".$row['quadrature'].", Number of rooms: ".$row['rooms'].", Address: ".$row['estate_address'].", City: ".$row['city_name'].
                                "<br> Estate type: ".$row['type_name']." Seller name: ".$row['seller_name'].", Telephone: ".$row['telephone'];
                        if($row['furnished']==1) {echo $show.", Furnished: Yes</h3>";}
                        else {echo $show.", Furnished: No</h3>";}
                    }
                }
        }
        else
        {
            
            if(isset($_POST['sort'])){
                $sort_attr=$_POST['sorting'];
                if($sort_attr == 'ascending'){
                    $sql .=" order by Estates.price asc";
                }
                elseif($sort_attr == 'descending'){
                    $sql.=" order by Estates.price desc";
                }
                elseif($sort_attr == 'newest'){
                    $sql.=" order by Estates.estate_id asc";
                }
                elseif($sort_attr == 'oldest'){
                    $sql.=" order by Estates.estate_id desc";
                }
            }
            
            $result =mysqli_query($dbConn, $sql);
            if($result->num_rows)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $show = "<b><h2>Estate price: ".$row['price']."</b></h2><h3>".
                            "Quadrature: ".$row['quadrature'].", Number of rooms: ".$row['rooms'].", Address: ".$row['estate_address'].", City: ".$row['city_name'].
                            "<br> Estate type: ".$row['type_name']." Seller name: ".$row['seller_name'].", Telephone: ".$row['telephone'];
                    if($row['furnished']==1) {echo $show.", Furnished: Yes<br><hr></h3>";}
                    else {echo $show.", Furnished: No<br><hr></h3>";}
                }
            }
            else
            {echo "No results";}
        }
        ?>
    </div>
        
</body>
</html>