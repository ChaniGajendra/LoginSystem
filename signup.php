<?php
require 'connection.php'
?>
<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $address = $_POST["address"];
    $phone_number = $_POST["phone_number"];
    $duplicate = mysqli_query($conn, "SELECT * FROM user_table WHERE name='$name' OR email='$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script>alert ('Username or Email has Already Taken');</script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO user_table values('', '$name', '$username','$email','$password', '$address', '$phone_number')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Registration Successfull'); </script>";

        }else{
            echo
            "<script> alert('Password Does not match'); </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
   
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="hero">

    
    <h2>Registration</h2>
    <form action="" class="registration-form" method="post" autocomplete="off">

    <div class="row">
    <div class="input-group">
            <input type="text" name="name" id="name" required value="" ><br>
            <label for="name">Name: </label>
        </div>
        <div class="input-group">
            <input type="text" name="username" id="username" required value=""><br>
            <label for="username">User Name: </label>
        </div>
    </div>

    <div class="row">
    <div class="input-group">
            <input type="email" name="email" id="email" required><br>
            <label for="email">Email Id: </label>
        </div>
       <div class="input-group">
           <input type="password" name="password" id="password" required value=""><br>
           <label for="password">Password: </label>
       </div>

    </div>
       
    <div class="row">
    <div class="input-group">
           <input type="password" name="confirmpassword" id="confirmpassword" required value=""><br>
           <label for="confirmpassword">Confirm Password: </label>
       </div>
        <div class="input-group">
            <input type="text" name="address" id="address" required value=""><br>
            <label for="address">Address: </label>
        </div>
    </div>
      
        <div class="input-group">
            <input type="text" name="phone_number" id="phone" required value=""><br>
            <label for="Phone">Phone Number: </label><br><br>
        </div>
        
        <button type="submit" name="submit">Submit</button><br>
    </form>
    <div class="row1">
        <p>Already have an account?</p>
    <a href="login.php">Login</a>
    </div>
    
    </div>
</body>
</html>