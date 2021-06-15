<?php
    session_start();
    if( !isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/chat.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" 
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" 
    crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>

            <?php    
            include_once "login/config.php";
            $user_id = mysqli_real_escape_string($conn , $_GET['user_id']);
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}" );
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
                    <a href="user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    <img src="login/images/<?php echo $row['img'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " .$row['lname']?></span>
                        <p><?php echo $row['status']?></p>
                </div>
              </header>
            <div class="chat-box">
                
            
                
            </div>
            <form action="#" class="typing-area" autocomplete="off">
            <input type="text" name="outgoing-id" value="<?php echo $_SESSION['unique_id'] ?>" hidden> 
            <input type="text" name="incoming-id" value="<?php echo $user_id ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="type a message.....">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="js/chats.js"></script>
</body>
</html>