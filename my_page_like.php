<?php include "info/like_pagination.php";?>
<?php
  $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");
  session_start();
  if(isset($_SESSION["login_user_id"])) { 
      $user_id = $_SESSION["login_user_id"];
      $sql = $like_select = "select * from seungchanshop25.user_like where user_id = '$user_id' order by created_at desc".' '.$sqlLimit;
      $result = mysqli_query($con, $sql);
  } else {
      $user_id = '';
  }
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device=width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>INDEX</title>
        <link
            rel="stylesheet"
            href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/my_page.css">
        <link rel="stylesheet" href="css/my_page_like.css">
    </head>
    <body>

        <?php include "header.php";?>
        <?php include "fixed_header.php";?>
        <?php include "auth/auth_member.php";?>
        <?php include "mypage_common.php";?>

        <div class="content">
            <h2>좋아요 (이미지 클릭시 이동)</h2>
            <div class="like_div">
                <ul>

                    <!-- 좋아요 페이지 상품하나 -->
                    <?php
              while($like_array =  mysqli_fetch_array($result)) {
                echo "
                      <li class='like_product'>
                        <div class='inner_img'>
                          <a href=shop_info.php?post_no=$like_array[product_autoNum]>
                            <img src=$like_array[main_img_dir_name] style='width: 200px; height: 200px;'>
                          </a>
                          <input type='checkbox' class='check_box'>
                        </div>
                        <ul>
                          <li class='product'>상품명 : $like_array[product_name]</li>
                          <li class='size'>사이즈 : $like_array[product_size]</li>
                          <li class='price'>가격 : $like_array[product_price]원</li>
                        </ul>
                    </li>
                    ";
               }
            ?>

                </ul>
                <div class="button_territory">
                    <!-- <button class="btn_select_all">전체선택</button>
                    <button class="btn_select_only">전체선택 해제</button>
                    <button class="btn_select_delete">선택상품 삭제</button> -->
                </div>
            </div>
            <div class="container">
                <?=$paging?>
            </div>
        </div>
    </div>
</section>

<?php include "footer.php";?>
</body>
</html>