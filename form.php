<?php

    $name = '';
    $number = '';
    $gender = '';
    $email = '';
    $password = '';
    $confirm_password = '';

    $name_error = '';
    $numerror = '';
    $gender_error= '';
    $email_error= '';
    $pass_error = '';
    $c_pass_error = '';

    



    if((isset($_GET['name']) && isset($_GET['number']) && isset($_GET['gender']) && isset($_GET['email']) && isset($_GET['password']) && isset($_GET['confirm_password']))){

        $control = 1;
        $name = $_GET['name'];
        $number = $_GET['number'];
        $gender = $_GET['gender'];
        $email = $_GET['email'];;
        $password = $_GET['password'];
        $confirm_password = $_GET['confirm_password'];

        print_r($_GET);

        
        if($name == ''){
            $name_error = "Name required.";
        }
        if($number == ''){
            $numerror = "Contact number required.";
        }
        if($gender == ''){
            $gender_error= "Gender required.";
        }
        if($email == ''){
            $email_error= "Email required.";
        }
        if($password == ''){
            $pass_error = "Password required.";
        }
        else if(strlen($password)<6){
             $pass_error = "Password must contain at least 6 characters.";
        }
        if($confirm_password == ''){
            $c_pass_error = "Confirmation required.";
        }
        else if(strlen($confirm_password)<6){
            $c_pass_error = "Password must contain at least 6 characters.";
       }
        

    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">
<div class="head">Sign-Up</div>
<form action="" class="form" method="GET">

    <label for="name" class="label">Full name: </label>
    <input type="text" class="input" name="name" value="<?php echo $name ?>" required>
    <div class="error">
        <?php
            echo $name_error;
        ?>
        </div>
    

    <label for="contact" class="label">Contact: </label>
    <input type="number" class="input" name="number" value="<?php echo $number ?>"  required>
    <div class="error"> 
        <?php
            echo $numerror;
          ?>
          </div>
   

    <label for="gender" class="label">Gender: </label>
    <div class="radio"><input type="radio" class="input" name="gender" value="male">Male</div>
    <div class="radio"><input type="radio" class="input" name="gender" value="female">Female</div>
    <div class="radio"><input type="radio" class="input" name="gender" value="others">Others</div>
    <div class="error">
        <?php
            echo $gender_error;
           ?>
           </div>
    

    <label for="email" class="label">Email: </label>
    <input type="email" class="input" name="email" value="<?php echo $email ?>"  required>
    <div class="error">
        <?php
            echo $email_error;
           ?>
           </div>
    

    <label for="pass: " class="label">Password: </label>
    <input type="password" class="input" name="password" min="6" value="<?php echo $password ?>"  required>
    <div class="error">
        <?php
            echo $pass_error;
           ?>
           </div>
    

    <label for="c_pass" class="label">Confirm password: </label>
    <input type="password" class="input" name="confirm_password" min="6" value="<?php echo $confirm_password ?>"  required>
    <div class="error">
        <?php
            echo $c_pass_error;
           ?>
           </div>

    <div class="button">
    <button type="submit" id="button">
        Complete registration
    </button>
    </div>
</form>
</div>

</body>
</html>