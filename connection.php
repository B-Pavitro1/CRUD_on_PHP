<?php
$conn = mysqli_connect("localhost","root","","userinfo");
if($conn){
    echo "connection success";
}
else{
    echo "connection unsuccess";
}
?>  