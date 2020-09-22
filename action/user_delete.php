<?php
	header('Content-Type: text/html; charset=utf-8');
    $delete_user_id = $_POST['delete_user_id'];

    $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");
    $sql = "delete FROM seungchanshop25.user WHERE user_id= '$delete_user_id'";

    mysqli_query($con, $sql);
?>