<?php
$conn = mysqli_connect("localhost" ,"root" , "" ,"chat" );
if(!$conn){
    echo "DAtabase connected" . mysqli_connect_error();
}
