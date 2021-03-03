<!-- 회원수정 데이터 받기 -->
<?php
    header('Content-Type: text/html; charset=utf-8');
    $user_id = $_POST["user_id"]; // 포스트방식으로 value값을 받아온다 해당네임의
    $user_nickname = $_POST["user_nickname"];
    $user_pw = $_POST["user_pw"];
    $user_name = $_POST["user_name"];
    $user_birth = $_POST["user_birth"];
    $user_email = $_POST["user_email"];
    $user_phone1 = $_POST["user_phone1"];
    $user_phone2 = $_POST["user_phone2"];
    $user_phone3 = $_POST["user_phone3"];
    $origin_user_id = $_POST["origin_user_id"];
    $user_phone = $user_phone1.$user_phone2.$user_phone3;

    $con = mysqli_connect("localhost","seungchanshop","tmdcks2416!","seungchanshop");
    // [아이피], [아이디], [비밀번호], [DB명], [포트]);

    $sql = "update seungchanshop.user SET user_id = '$user_id', user_nickname = '$user_nickname', user_pw = '$user_pw', user_name = '$user_name', user_birth = '$user_birth', user_email = '$user_email', user_phone = '$user_phone' WHERE user_id = '$origin_user_id'";

    mysqli_query($con, $sql);
    mysqli_close($con)
?>