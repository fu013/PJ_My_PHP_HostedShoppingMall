<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>INDEX</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/sign_up.css">
</head>
<body>
 	<?php include "header.php";?>
    <?php include "fixed_header.php";?>

    <section>
        <div class="sign_up_wrapper">
          <h2 style="font-weight: 300;">회원가입</h2>
          <ul class="agreement_photo">
                   <li><i class="xi-document" style="opacity: 0.4;"></i></li>
                   <li><i class="xi-user-plus-o" style="opacity: 0.4;"></i></li>
                   <li><i class="xi-registered" style="opacity: 1.0;"></i></li>
                 </ul>
            <div class="complete">
              <h3>회원가입이 완료되었습니다!<br></h3>
              <a href="index.php" style="background: orange; color: white; width: 240px; height: 80px; line-height: 80px; display: block; margin: 0 auto;">메인페이지로 이동</a>
            </div>
        </div>
    </section>

    <?php include "footer.php";?>
</body>
</html>