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
        <section class="form signup">
            <header>Message App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">This is an error message!</div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name:</label>
                        <input type="text" name="fname" placeholder="First name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name:</label>
                        <input type="text" name="lname" placeholder="Last name" required>
                    </div>
                    </div>
                    <div class="field input">
                        <label>Email address:</label>
                        <input type="email" name="email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="field input">
                        <label>Password:</label>
                        <input type="password" name="password" placeholder="Enter Your Password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label>Select Image</label>
                        <input type="file" name="image" required >
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to Chat" >
                    </div>
                

            </form>

            <div class="link">Already have an account ? <a href="login.php">login now</a></div>

        </section>
    </div>

    <script src="js/pass-show.js"></script>
    <script src="js/sign.js"></script>
</body>
</html>