  <!--  로그인 아이디/비밀번호 데이터 받기 및 데이터베이스값과 비교&확인 -->
  <?php
    header('Content-Type: text/html; charset=utf-8');
    $login_id = $_POST["login_id"];
    $login_pw = $_POST["login_pw"];

    $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");
    $sql = "select * from user where user_id = '$login_id'";
    $result = mysqli_query($con, $sql); // 사용자가 로그인을 요청해온 아이디값을 변수에 담는다.
    $num_match = mysqli_num_rows($result); // 해당아이디에 매치되는 컬럼값을 가진 로우 개수를 세서 저장함.
    
    if (!$num_match) { // 로우 개수가 존재하지 않는다면 아이디값이 없다는것이므로
      echo "
          <script>
               window.alert('등록되지 않은 아이디입니다.');
               history.go(-1);
          </script>
      ";
    } else { // 로우 개수가 존재한다면, => 사용자가 요청한 아이디값이 DB상에 존재한다면,
        $row = mysqli_fetch_array($result); // 해당아이디값 컬럼의 row행을 배열형식으로 가져온다. 그리고 변수에 담는다.
        $db_pass = $row["user_pw"]; // 해당 로우의 user_pw 컬럼값을 변수에 담는다.
        mysqli_close($con);

        if ($login_pw != $db_pass) { // 사용자가 제출한 비밀번호값이 DB상의 비밀번호가 다르다면
          echo "
            <script>
                 window.alert('비밀번호가 틀립니다.');
                 location.href = '/index.php';
            </script>
        ";
        exit;
        // 이 구문은 스크립트 실행을 종료하는 역할을 합니다. 만약 문자열을 인수로
        // ()에 해당 문자열을 브라우저에 출력하고 스크립트를 종료시킬 것이다.
    } else { // 요청한 아이디값이 존재하고, 비밀번호도 일치할경우 세션을 스타트한다. 그리고 DB에서 회원정보를 세션으로 가져온다.
        session_start(); // 로그인 아이디,닉네임,패스워드로 사용자가 보낸 id값과 일치하는 값이 속한 로우에 있는 user 정보값을 세션에 로그인정보로써 넘긴다. 
        $_SESSION["login_user_id"] = $row["user_id"];
        $_SESSION["login_user_nickname"] = $row["user_nickname"];
        $_SESSION["login_user_name"] = $row["user_name"];
        $_SESSION["login_user_grade"] = $row["user_grade"];

        echo "
            <script>
                alert('로그인 되었습니다.');
                location.href = '/index.php';
            </script>
        ";
      }
    }
  ?>
