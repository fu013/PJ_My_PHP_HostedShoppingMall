<?php
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
    if(isset($_SESSION["login_user_name"])) {
        $user_name = $_SESSION["login_user_name"];
    } else {
        $user_name = '';
    }
    if(isset($_SESSION["login_user_grade"])) {
        $user_grade = $_SESSION["login_user_grade"];
    } else {
        $user_grade = '';
    }
?>
<!-- 세션은 30분주기로 저장 -->
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device=width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>header</title>
        <link
            rel="stylesheet"
            href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/header.css">
    </head>
    <body>
        <?php include "login.php";?>
        <?php 
        if (!$user_id) { // 로그인정보가 세션에없을때
    ?>
        <!-- 맨위 메뉴부분 -->
        <header class="main_header">
            <div class="header_wrap">
                <nav>
                    <ul>
                        <li>
                            <a href="#a" class="login_open">로그인</a>
                        </li>
                        <li>
                            <a href="sign_up.php">회원가입</a>
                        </li>
                        <li>
                            <a href="basket.php">장바구니</a>
                        </li>
                        <li>
                            <a href="Q&A.php">Q&A</a>
                        </li>
                        <!-- 나중에 재개 -->
                        <!-- <li>
                            <input type="text" name="search" class="search_input">
                            <span class="search_icon">
                                <i class="xi-magnifier"></i>
                            </span>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </header>
    <?php
} else if ($user_grade == 9) {
?>
        <header class="main_header">
            <div class="header_wrap">
                <nav>
                    <ul>
                        <li>
                            <a href="action/logout.php" class="">로그아웃[<?=$user_id?>]</a>
                        </li>
                        <li>
                            <a href="admin_index.php" class="admin_index.php">관리자 페이지</a>
                        </li>
                        <li>
                            <a href="my_page_like.php">마이페이지[<?=$user_nickname?>][관리자]</a>
                        </li>
                        <li>
                            <a href="Q&A.php">Q&A</a>
                        </li>
                        <li>
                            <a href="basket.php">장바구니</a>
                        </li>
                        <!-- 나중에 재개 -->
                        <!-- <li>
                            <input type="text" name="search" class="search_input">
                            <span class="search_icon">
                                <i class="xi-magnifier"></i>
                            </span>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </header>

    <?php
} else {
?>
        <header class="main_header">
            <div class="header_wrap">
                <nav>
                    <ul>
                        <li>
                            <a href="action/logout.php" class="">로그아웃[<?=$user_id?>]</a>
                        </li>
                        <li>
                            <a href="my_page_like.php">마이페이지[<?=$user_nickname?>]</a>
                        </li>
                        <li>
                            <a href="Q&A.php">Q&A</a>
                        </li>
                        <li>
                            <a href="basket.php">장바구니</a>
                        </li>
                        <!-- 나중에 재개 -->
                        <!-- <li>
                            <input type="text" name="search" class="search_input">
                            <span class="search_icon">
                                <i class="xi-magnifier"></i>
                            </span>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </header>
        <?php
}
?>

        <!-- 로고 & 제작팀 -->
        <div class="logo_div">
            <ul onclick="location.href='index.php' ">
                <li></li>
                <li>
                    <h2 style="font-weight: 300;">seungchan_shop</h2>
                </li>
            </ul>
        </div>
    </body>
</html>