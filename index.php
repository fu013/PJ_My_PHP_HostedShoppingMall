<!DOCTYPE html>
<html lang="ko">
<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	   <meta name="viewport" content="width=device=width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
	   <title>INDEX</title>
     <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
     <link rel="stylesheet" href="css/index.css">
     <script>
     $(document).ready(function(){

       $('.slider').bxSlider({
           auto:true
       });

     });  
     </script>
     <!-- bx-slider 연동 -->
</head>
<body>
	<?php include "header.php";?>
  <?php include "fixed_header.php";?>

<!-- CONTENT 시작 -->
<section>
  <!-- 베스트상품 슬라이더 -->
	<div class="slider_news">
      <div class="slider">
          <div><img src="img/slider_img_1.jpg" width="100%" alt=""></div>
          <div><img src="img/slider_img_2.jpg" width="100%" alt=""></div>
          <div><img src="img/slider_img_3.jpg" width="100%" alt=""></div>
      </div>
  </div>

  <!-- 신상품 4개 + 1개 정렬-->
  <div class="wrap">
    <div class="left_wrap">
      <div class="square_1">
        <img src="img/square_1.jpg" alt="">
      </div>
      <div class="square_2">
        <img src="img/square_2.jpg" alt="">
      </div>
      <div class="square_3">
        <img src="img/square_3.jpg" alt="">
      </div>
      <div class="square_4">
        <img src="img/square_4.jpg" alt="">
      </div>
    </div>
      <div class="larger_one">
        <img src="img/main_square.jpg" alt="">
    </div>
  </div>
</section>
  <?php include "footer.php";?>
</body>
</html>