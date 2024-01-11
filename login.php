<?php
require 'connection.php';
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user_table WHERE username = '$usernameemail' OR email='$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row["password"]){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }else{
    echo
    "<script> alert('User not registered yet'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>  
  <style>
    *{
    margin: 0;
    padding: 0;
    font-family: 'poppins', sans-serif;
    box-sizing: border-box;
    text-decoration: none;
}


.hero{
    height: 100vh;
    width: 100%;
    background-image: linear-gradient(rgba(204, 152, 152, 0.7), #899ad5);
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 40px;
}

h2{
    left: 0;
    justify-content: center;
    position: absolute;
    top: 0;
    margin-left: 37%;
    margin-top: 3%;
}

form{
    width: 80%;
    max-width: 600px;
    height: 80%;
}
input{
    width: 60%;
    padding: 10px;
    outline: 0;
    border: 1px solid #fff;
    background: transparent;
    font-size: 15px;
    border-radius: 3px;
}
.input-group{
    margin-bottom: 20px;
    position: relative;
}

label{
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    padding: 10px;
    color: #fff;
    cursor: text;
    transition: 0.2s;
}
input:focus~label,
input:valid~label{
    top: -35px;
    font-size: 14px;
}
button{
    padding: 10px 0;
    color: #fff;
    outline: none;
    background-color: transparent;
    border: 1px solid white;
    width: 60%;
    cursor: pointer;
    border-radius: 2px;
}

a{
  position: absolute;
  align-items: center;
  justify-content: start;
  bottom: 0;
  margin-bottom: 25%;
  margin-left: 31%;
}

@media (max-width: 767px) {
    form {
      max-width: 100%;
      padding: 0 20px;
      font-size: 12px;
      transition: 0.2s;
    }

    h2{
        text-align: center;
        font-size: 20px;
        margin-top: 60px;
        margin-left: 150px;
    }
  
    input,
    label,
    button {
      padding: 8px; 
    }
    .row1{
        display: flex;
        position: absolute;
        margin-top: 320px;
        font-size: 10px;
        margin-left: 80px;

    }
    input:focus~label{
        font-size: 10px;
        top: -20px;
    }
    a{
      font-size: 12px;
      margin-bottom: 380px;
      margin-left: 80px;
    }
  }

  </style>
</head>
<body>
  <h2>Login</h2>

  <div class="hero">

  <form action="" class="" method="POST" autocomplete="off">

    <div class="input-group">
      <input type="text" name="usernameemail" id="usernameemail" required value=""><br>
      <label for="usernameemail">Username or Email: </label>
    </div>
  <div class="input-group">
    <input type="password" name="password" id="password" name="password" required value=""><br>
    <label for="password">Password</label>
  </div>
 
  <button type="submit" name="submit">Login</button>
  </form><br>
  </div>
  <a href="signup.php">Create an account</a>
</body>
</html>