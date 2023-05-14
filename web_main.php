<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Portal</title>
    <link rel="stylesheet" href="style_main.css">
    <link rel="stylesheet" href="form_style.css">
</head>
<body>
    <div class="buttons">
            <button onclick="document.getElementById('id01').style.display='block'" class="login_form">Login</button>
             <button onclick="document.getElementById('id02').style.display='block'" class="register_form">Register</button>
    </div> 
    
        <!--login-->
        <div id="id01" class="login-box">
          <form class="modal-content animate" method="post">
            <div class="Xcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              <h2>Login Form</h2>
            </div>

            <div class="user-box">
              <input  type="text" name="acc_name" required>
              <label><b>Username</label>
            </div>
            <div class="user-box">
              <input  type="password" name="acc_password" required>
              <label><b>Password</label>
            </div>

            <div class="button-form">
                <button type="reset" class="resetbtn">Reset</button>
                <button type="submit" name="login" class="loginbtn">Login</button>

                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
          </form>
        </div>
        <!--register-->
        <div id="id02" class="login-box">
          <form class="modal-content animate" method="post">
            <div class="Xcontainer">
              <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
              <h2>Registration Form</h2>
            </div>

            <div class="user-box">
              <input  type="text" name="acc_name" required>
              <label><b>Name</label>
            </div>

            <div class="user-box">
              <input  type="text" name="acc_password" required>
              <label><b>Phone number</label>
            </div>

            <div class="user-box">
              <input  type="text" name="seller_name" required>
              <label><b>Username</label>
            </div>
            <div class="user-box">
              <input  type="password" name="telephone" required>
              <label><b>Password</label>
            </div>

            <div class="button-form">
                <button type="reset" class="resetbtn">Reset</button>
                <button type="submit" name="register"  class="registerbtn">Register</button>

                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
          </form>
        </div>

        <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>

        <script>
        // Get the modal
        var modal = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>
             
            
            <?php
                include "web_project.php";
                include "config.php";
                
                if (isset($_POST["login"]))
                {
                    $acc_name = $_POST['acc_name'];

                    $_SESSION['username'] = $acc_name;

                    $acc_password = $_POST['acc_password'];
                    $sql = "SELECT * from accounts where acc_name = '".$acc_name."' AND acc_password = '".$acc_password."'limit 1";
                    $result = mysqli_query($dbConn,$sql);
                    if(mysqli_num_rows($result)==1){
                        echo '<script>window.location="welcome_page.php"</script>';
                    }
                    else{
                        echo "You have entered an invalid information.";
                    }
                }
                
                if (isset($_POST["register"]))
                {
                    $acc_name = $_POST['acc_name'];
                    $acc_password = $_POST['acc_password'];

                    $seller_name = $_POST['seller_name'];
                    $telephone = $_POST['telephone'];

                    if( !empty($acc_name)&&!empty($acc_password)&&!empty($seller_name)&&!empty($telephone))
                    {
                        $sql = "INSERT INTO Sellers (seller_name, telephone)"
                                . " VALUES ('$seller_name','$telephone') ";
                        $result = mysqli_query($dbConn,$sql);
                        if (!$result) die('Грешка!!!');

                        $sql = "INSERT INTO Accounts (acc_name, acc_password, acc_type_id)"
                                . " VALUES ('$acc_name','$acc_password',1) ";
                        $result = mysqli_query($dbConn,$sql);
                        if (!$result) die('Грешка!!!');
                        echo '<script>window.location="welcome_page.php"</script>';
                    }
                    else  echo "Не сте въвели всички данни!!!";

                }
                
            ?>
           
</body>
</html>