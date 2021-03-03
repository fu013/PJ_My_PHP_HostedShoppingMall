<?php
    $con = mysqli_connect("localhost","seungchanshop","tmdcks2416!","seungchanshop");

    $request_user_id = $_POST['request_user_id'];

    $request_user_select = "select * from seungchanshop.user where user_id = '$request_user_id'";
    $request_user_select_result = mysqli_query($con, $request_user_select);
    $request_user_select_num =  mysqli_num_rows($request_user_select_result);
    
    if($request_user_select_num) {
        echo "같은 아이디가 이미 존재합니다.;";
    }
    else {
        echo "이 아이디는 사용하셔도 좋습니다.";
    }
?>