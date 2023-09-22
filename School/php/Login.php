<?php

@include 'config.php';

session_start();

if(isset($POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $POST['name']);
    $email = mysqli_real_escape_string($conn, $POST['email']);
    $password = md5($_POST['password']);
    $confirmpassword = md5($_POST['confirmpassword']);

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        header('location:User.php');
    }
    else {
        $error[] = 'Incorrect email or password!';
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auxilium Catholic School</title>

    <link rel="stylesheet" href="Php.css">
</head>
<body>
    <div class="form">
        <form action="" method="post">
            <h3>Login</h3>
            <?php 
            if(isset($error)) {
                foreach($error as $error) {
                    echo '<span class="error-msg">'. $error.'</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="Enter Your Email">
            <input type="password" name="password" required placeholder="Enter Your Password">
             <input type="submit" value="Login" class="form-btn" name="submit">
             <p>Don't have an account? <a href="Registration.php">Register</a></p>
        </form>
    </div>
</body>
</html>