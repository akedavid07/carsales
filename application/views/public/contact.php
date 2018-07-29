<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/build/css/login.css'); ?>">
</head>

<body>
    <div class="loginPage" style="width:400px">    
        <header>
            <h2>Contact</h2>
        </header>
        <?php echo validation_errors(); ?>
        
        <form action="mailto:admin@felanmotors.com" method="POST">
            <input placeholder="Name" type="text" name="firstname">
            <input placeholder="Phone Number" type="text" name="phone_number">
            <input placeholder="Email" type="email" name="email">
            <textarea placeholder="Message" name="password" style="width:315px;height:200px;border:1px solid #dedede"></textarea>
            <section class="links">
                <button class="button"><span>Send Message</span></button>
                <br><br>
            </section>
        </form>
    </div>
</body>
</html>