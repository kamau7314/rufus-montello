<?php
    session_start();

    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) ){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($sql) > 0){//if email already exist
                    echo "$email - this email already exist";

                }else{
                    //checking if user uploaded a file or not
                    if(isset($_FILES['image'])){//if file is uploaded
                        $img_name = $_FILES['image']['name'];//getting user uploaded image name
                        $img_type = $_FILES['image']['type'];//getting user upload image type
                        $tmp_name = $_FILES['image']['tmp_name'];//temporary name used to save a file in folder

                        //now we getting the last name extension like jpg or png
                        $img_explode = explode('.', $img_name);
                        $img_ext = end($img_explode);//getting the extension of a user upload

                        $extenstions = ['png' , 'jpeg' , 'jpg'];//these are some valid img extentions
                        if(in_array($img_ext, $extenstions) == true){//if user uploaded img ext is mathched with any array extension
                            $time = time();//this will return the current time
                             
                            //now move the uploaded image to our particular folder because the images are not stored on th database
                            //only the url are stored in the database
                            $new_img_name = $time.$img_name;
                           if( move_uploaded_file($tmp_name , "images/" .$new_img_name)){
                                    $status = "Active now";
                                    $random_id = rand(time(), 100000);//creating random id for user

                            //now you insert data into tables
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                            VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                                if($sql2){
                                        $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                        if(mysqli_num_rows($sql3) > 0){
                                            $row = mysqli_fetch_assoc($sql3);
                                            $_SESSION['unique_id'] = $row['unique_id'];
                                            
                                            echo "success";
                                        }
                                }else{
                                    echo "something went wrong";
                                }

                        }
                        }else{
                            echo "please upload an image file -jpeg, jpg, png";
                        }
                        
                    }else{
                        echo "please upload an image";
                    }
                }

            }else{
                echo "$email - this is not a valid email";
            }
    }else{
        echo "all inputs are requird";
    }