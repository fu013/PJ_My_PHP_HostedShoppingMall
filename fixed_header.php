<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>INDEX</title>
     <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <link rel="stylesheet" href="css/fixed_header.css">
     <script>
     $(document).ready(function(){
        $(function() {
            var $firstMenu = $('.fixed_header > .fixed_header_wrap > nav > ul > li'),
                $header = $('.fixed_header'),
                 $headerHeight = $header.outerHeight();

        $firstMenu.mouseenter(function() {
            var $subHeight = $(this).outerHeight(true);
                $header.stop().animate({height: $subHeight + 'px'},300);
        })
        $firstMenu.mouseleave(function() {
        $header.stop().animate({height: $headerHeight + 'px'},300);
        })
        // li 개수의 총 높이값을 측정해 개수에 따라 자동으로 서브메뉴의 높이값을 맞춰주는 JS문

         $(window).scroll(function(){ 
            var height = $(document).scrollTop(); //실시간으로 스크롤의 높이를 측정
         if(height > 300) { 
            $('.follow_logo').css('display', 'block');
            $('.follow_logo').css('position', 'fixed');
            $('.follow_logo').css('top', '0');
            $('.fixed_header').css('position', 'fixed');
            $('.fixed_header').css('top', '100px'); 
         }
         else if(height < 300) { 
            $('.follow_logo').css('display', 'none');
            $('.follow_logo').css('position', 'absolute');
            $('.fixed_header').css('position', 'absolute');
            $('.fixed_header').css('top', '300px');
         } 
       })
        // 스크롤바의 높이값이 375 이하로 내려가면 fixed_header를 고정시키고 375 이상으로 올라가면 고정을 해제하는 JS문
    });
});    
     </script>
</head>
<body>

    <h2 class="follow_logo" style="position: absolute; height: 100px; line-height: 100px; text-align: center; width: 100%; min-width: 1400px;  z-index: 99; display: none;  background: #fff; margin: 0; padding: 0; color: #999; font-weight: 300;"><img src="img/LOGO.png" style="position: relative; top: 8px; visibility: hidden;"><a href="index.php">seungchan_shop</a></h2>

	<header class="fixed_header" style="min-width: 1400px;">
        <!-- 카테고리 부분 -->
        <div class="fixed_header_wrap">
            <nav>
                <ul>
                    <li>
                        <a href="#" name="Category_Name">BEST</a>
                        <a href="like_top.php">TOP좋아요</a>
                        <a href="view_top.php">TOP조회수</a>
                    </li>
                    <li>
                        <a href="" name="Category_Name">SHIRT</a>
                        <a href="T-shirt.php">T-셔츠</a>
                        <a href="hoodie.php">후드티</a>
                    </li>
                    <li>
                        <a href="#" name="Category_Name">PANTS</a>
                        <a href="slacks.php">슬렉스</a>
                        <a href="jean.php">청바지</a>
                    </li>
                    <li>
                        <a href="#" name="Category_Name">SHOES</a>
                        <a href="shoes.php">운동화</a>
                        <a href="slippers.php">슬리퍼</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>