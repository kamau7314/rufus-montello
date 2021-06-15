<?php
    session_start();

    if(isset($_session['unique_id'])){
        header("location: users.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" 
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" 
    crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Message App</header>
            <form action="#">
                <div class="error-txt"></div>
                
                    <div class="field input">
                        <label>Email address:</label>
                        <input type="email" name="email" placeholder="Enter Your Email">
                    </div>
                    <div class="field input">
                        <label>Password:</label>
                        <input type="password" name="password" placeholder="Enter Your Password">
                        <i class="fas fa-eye"></i>
                    </div>
                    
                    <div class="field button">
                        <input type="submit" value="Continue to Chat" >
                    </div>
                

            </form>

            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>

        </section>
    </div>
    <script src="js/pass-show.js"></script>
    <script src="js/logins.js"></script>
</body>
</html>