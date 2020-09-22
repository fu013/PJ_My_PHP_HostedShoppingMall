<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>header</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    
    <?php include "login.php";?>
    <?php include "auth/auth_member.php";?>
    <!-- 맨위 메뉴부분 -->
	<header class="main_header">
        <div class="header_wrap">
            <nav>
                <ul>
                    <li>
                        <a href="#a" class="login_open">로그아웃</a>
                    </li>
                    <li>
                        <a href="my_page.php">마이페이지</a>
                    </li>
                    <li>
                        <a href="Q&A.php">Q&A</a>
                    </li>
                    <li>
                        <a href="basket.php">장바구니</a>
                    </li>
                    <li>
                        <input type="text" name="search" class="search_input">
                        <span class="search_icon"><i class="xi-magnifier"></i></span>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

            <!-- 로고 & 제작팀 -->
        <div class="logo_div">
           <ul onclick="location.href='index.php' ">
               <li><img src="img/LOGO.png" alt="logo"></li>
               <li><h2 style="font-weight: 300;">TLC TEAM</h2></li>
           </ul>
        </div>
</body>
</html>