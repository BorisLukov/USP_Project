<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content type" content="text/html;charset=windows=1251">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style_main.css">
        <link rel="stylesheet" href="form_style.css">
    </head>
    <body>
        <div class="buttons">
            <form action="#" method="post">
                <b>Welcome <?php echo $_SESSION['username']; ?><br></b>
                <button type="submit" name ="logout" class="logout">Logout</button>
                </form>
                <button type="submit" class="add" onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Add Estates</button>
        </div> 
        
        <div id="id03" class="login-box">
          <form class="modal-content animate" method="post">
            <div class="Xcontainer">
              <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
              <h2>Add Estate Form</h2>
            </div>

            <div class="user-box">
              <input  type="number" step="0.01" name="price" required>
              <label><b>Price</label>
            </div>
            <div class="user-box">
              <input  type="number" name="size" required>
              <label><b>Quadrature</label>
            </div>
              <div class="user-box">
              <input  type="number" name="rooms" required>
              <label><b>Number of rooms</label>
            </div>
            <div class="user-box">
              <input  type="text" name="address" required>
              <label><b>Address</label>
            </div>
              
              City: <select name="city",id="cities">
            <option value="1">Shumen</option>
            <option value="2">Varna</option>
            <option value="3">Burgas</option>
            <option value="4">Sofia</option>
            <option value="5">Plovdiv</option>
            <option value="6">Veliko Tarnovo</option>
            </select>
              
            </select>
                Types: <select name="type",id="types">
                <option value="1">house</option>
                <option value="2">apartment</option>
            </select>
                Furnished:
                    Yes <input type="radio" name="furnished" value="true"/>
                    No <input type="radio" name="furnished" value="false" checked="true"/>

            <div class="button-form">
                <button type="reset" class="resetbtn">Reset</button>
                <button type="submit" name="add" class="loginbtn">Add Estate</button>
                <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
          </form>
        </div>
        
        <script>
        // Get the modal
        var modal = document.getElementById('id03');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>
        
        <?php
        // put your code here
        include "config.php";
        include "web_project.php";
        if (isset($_POST["logout"]))
        {
            unset($_SESSION['username']);
                session_destroy();
                echo '<script>window.location="web_main.php"</script>';
        }
        
        if(isset($_POST['add'])){
            $city = $_POST['city'];
           $price = $_POST['price'];
           $size = $_POST['size'];
           $rooms = $_POST['rooms'];
           $address = $_POST['address'];
           $type = (int)$_POST['type'];
           $furnished = $_POST['furnished'];
           $sql = "SELECT acc_id FROM accounts WHERE acc_name ='".$_SESSION['username']."'";
           $result = mysqli_query($dbConn,$sql);
           
           if($result -> num_rows){
                while($row=mysqli_fetch_assoc($result)){
                    $acc_id = (int)$row['acc_id'];
                }
           }

            if (!empty($price)&&!empty($size)&&!empty($rooms)&&!empty($address)&&!empty($city)&&!empty($type))
            {
                $sql = "INSERT INTO Estates (price, quadrature, rooms, estate_address, city_id, estate_type_id, furnished, seller_id ,acc_id) VALUES ($price, $size, $rooms, '$address', $city, $type, $furnished, $acc_id, $acc_id)";
                $result = mysqli_query($dbConn,$sql);
                if (!$result) die('Грешка!!!');
                echo "Добавихте един запис.";
            }
            else  echo "Не сте въвели всички данни!!!";
        }
        ?>
    </body>
</html>