<?php
  $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");
  // 세션 유저 정보 가져오기 
  session_start();
  if(isset($_SESSION["login_user_id"])) { 
      $user_id = $_SESSION["login_user_id"];
  } else {
      $user_id = '';
  }
  if(isset($_SESSION["login_user_nickname"])) { 
    $user_nickname = $_SESSION["login_user_nickname"];
  } else { 
    $user_nickname = '';
  }
  if(isset($_SESSION["login_user_grade"])) {
    $user_grade = $_SESSION["login_user_grade"];
  } else {
      $user_grade = '';
  }
  if ($user_grade == 9) {
    $grade = '관리자';
  }
  else if ($user_grade == 1) {
    $grade = '멤버';
  }
  global $grade;

  $user_select = "select * from seungchanshop25.user where user_id = '$user_id'";
  $user_select_result = mysqli_query($con, $user_select);
  $user_select_array =  mysqli_fetch_array($user_select_result);

  $view_arr = explode(",",$_COOKIE['goods_view']);
  unset($view_arr[0]); // [1]부터 시작하므로 0번쨰 Null 배열인덱스 삭제후 rearrange
  $view_arr = array_values($view_arr);
  $view_count = count($view_arr);
  
  $like_count = "select count(*) like_count from seungchanshop25.user_like";
  $like_count_result = mysqli_query($con, $like_count);
  $like_count_array =  mysqli_fetch_array($like_count_result);
  $like_count_row = $like_count_array['like_count'];

  $jjim_count = "select count(*) jjim_count from seungchanshop25.user_jjim";
  $jjim_count_result = mysqli_query($con, $jjim_count);
  $jjim_count_array =  mysqli_fetch_array($jjim_count_result);
  $jjim_count_row = $jjim_count_array['jjim_count'];

  $qna_count = "select count(*) qna_count from seungchanshop25.qna";
  $qna_count_result = mysqli_query($con, $qna_count);
  $qna_count_array =  mysqli_fetch_array($qna_count_result);
  $qna_count_row = $qna_count_array['qna_count'];
?>

<section class="mypage">
    <div class="my_page_wrapper">
        <h2>마이페이지</h2>
        <div class="my_page_box_wrapper">
            <div class="grade_box">
                <p>
                    <span class="blue" style="color: blue"><?=$user_nickname?></span>님의 등급은
                    <span class="red"><?=$grade?></span><br>
                    입니다.</p>
            </div>
            <div class="info_box">
                <ul>
                    <dl>
                        <dt>좋아요</dt>
                        <dd>
                            <span class="blue" style="color: blue"><?=$like_count_row?>건</span></dd>
                    </dl>
                    <dl>
                        <dt>최근본페이지</dt>
                        <dd>
                            <span class="blue" style="color: blue"><?=$view_count?>건</span></dd>
                    </dl>
                    <dl>
                        <dt>찜목록</dt>
                        <dd>
                            <span class="blue" style="color: blue"><?=$jjim_count_row?>건</span></dd>
                    </dl>
                    <dl>
                        <dt>Q&A</dt>
                        <dd>
                            <span class="blue" style="color: blue"><?=$qna_count_row?>건</span></dd>
                    </dl>
                </ul>
            </div>
        </div>
    </div>

    <div class="my_menu_wrapper">

        <div class="my_menu">
            <dl>
                <dt>상품관리</dt>
                <dd>
                    <a href="my_page_like.php">좋아요</a>
                </dd>
                <dd>
                    <a href="my_page_currentpage.php">최근 본 상품</a>
                </dd>
            </dl>

            <dl>
                <dt>활동관리</dt>
                <dd>
                    <a href="Q&A.php">Q&A</a>
                </dd>
                <dd>
                    <a href="my_page_dibs.php">찜 목록</a>
                </dd>
            </dl>

            <dl>
                <dt>정보관리</dt>
                <dd>
                    <a href="my_page_info_fix.php">회원정보 수정</a>
                </dd>
                <dd>
                    <a href="my_page_withdrawal.php">회원탈퇴</a>
                </dd>
            </dl>
        </div>
        <div class="my_menu_info">
            <ul>
                <li>아이디: <?=$user_select_array['user_id']?></li>
                <li>닉네임: <?=$user_select_array['user_nickname']?></li>
                <li>이름: <?=$user_select_array['user_name']?></li>
                <li>성별: <?=$user_select_array['user_gender']?></li>
                <li>생일: <?=$user_select_array['user_birth']?></li>
                <li>가입일: <?=$user_select_array['created_at']?></li>
                <li>휴대폰: <?=$user_select_array['user_phone']?></li>
                <li>이메일: <?=$user_select_array['user_email']?></li>
            </ul>
        </div>