<?php include "info/top_view_pagination.php";?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>INDEX</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/shop.css">
    <style>
      .view { color: red;}
    </style>
</head>
<body>

    <?php include "header.php";?>
    <?php include "fixed_header.php";?>
        
    <section>
      <div class="category_title">
        <h1> TOP 조회수 </h1>
      </div>
    	<ul class="shop_gallery">
        <?php include "info/post_info.php";?>
    	</ul>
    </section>

    <div class="container">           
      <?=$paging?>
    </div>
    <?php include "footer.php";?>
</body>
</html>