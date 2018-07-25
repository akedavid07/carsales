<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/build/css/login.css'); ?>">
</head>

<body>
    <div class="loginPage">    
        <header>
            <h2>Dealers Registeration</h2>
        </header>
        <?php echo validation_errors(); ?>
        
        <form action="register" method="POST">
            <input placeholder="Firstname" type="text" name="firstname">
            <input placeholder="Lastname" type="text" name="lastname">
            <input placeholder="Phone Number" type="text" name="phone_number">
            <input placeholder="Email" type="email" name="email">
            <input placeholder="Password" type="password" name="password">
            <section class="links">
                <button class="button"><span>Register</span></button>
                <br><br>
            </section>
        </form>
    </div>
</body>
</html>