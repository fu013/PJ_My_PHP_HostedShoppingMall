<?php
    $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");
    
    $request_user_password = $_POST['request_user_pw'];
    $origin_user_id = $_POST['origin_user_id'];

    $request_user_select = "select * from seungchanshop25.user where user_pw = '$request_user_password' AND user_id = '$origin_user_id'";
    $request_user_select_result = mysqli_query($con, $request_user_select);
    $request_user_select_num =  mysqli_num_rows($request_user_select_result);
    
    if($request_user_select_num) {
        echo "비밀번호가 일치합니다.";
    }
    else {
        echo "기존 비밀번호가 맞지 않습니다.";
    }
?>