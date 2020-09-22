<!--  회원가입 데이터 받기 -->
  <?php
    header('Content-Type: text/html; charset=utf-8');
    $user_id = $_POST["user_id"]; // 포스트방식으로 value값을 받아온다 해당네임의
    $user_nickname = $_POST["user_nickname"];
    $user_pw = $_POST["user_pw"];
    $user_name = $_POST["user_name"];
    $user_birth = $_POST["user_birth"];
    $user_gender = $_POST["user_gender"];
    $user_email = $_POST["user_email"];
    $user_phone1 = $_POST["user_phone1"];
    $user_phone2 = $_POST["user_phone2"];
    $user_phone3 = $_POST["user_phone3"];
    $user_phone = $user_phone1.$user_phone2.$user_phone3;
    $user_grade = $_POST["user_grade"];
    if ( $user_grade == 9 ) {
      $comment = '관리자';
    }
    else if ( $user_grade == 1 ) {
      $comment = '멤버';
    }
    global $comment;


   $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");
    // [아이피], [아이디], [비밀번호], [DB명], [포트]);
    $user_register = "insert into seungchanshop25.user(user_id, user_nickname, user_pw, user_name, user_birth, user_gender, user_email, user_phone, user_grade, comment)";
    $user_register .= "values('$user_id', '$user_nickname', '$user_pw', '$user_name','$user_birth','$user_gender','$user_email', '$user_phone', $user_grade, '$comment')";
    // 유저 등급 default 는 1 => 일반멤버
    mysqli_query($con, $user_register);
    // $sql 에 저장된 명령 실행
    mysqli_close($con); 
    // 실행 종료s
?>