<?php
    $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");
    
    $request_user_email = $_POST['request_user_email'];

    $request_user_select = "select * from seungchanshop25.user where user_email = '$request_user_email'";
    $request_user_select_result = mysqli_query($con, $request_user_select);
    $request_user_select_num =  mysqli_num_rows($request_user_select_result);
    
    if($request_user_select_num) {
        echo "같은 이메일이 이미 존재합니다.;";
    }
    else {
        echo "이 이메일은 사용하셔도 좋습니다.";
    }
?>