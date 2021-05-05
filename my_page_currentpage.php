<?php
  $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");
  $view_arr = explode(",",$_COOKIE['goods_view']);
  unset($view_arr[0]); // [1]부터 시작하므로 0번쨰 Null 배열인덱스 삭제후 rearrange
  $view_arr = array_values($view_arr);
?>
<?php include "info/currentpage_pagination.php";?>
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
        <link rel="stylesheet" href="css/my_page_currentpage.css">
    </head>
    <body>

        <?php include "header.php";?>
        <?php include "fixed_header.php";?>
        <?php include "auth/auth_member.php";?>
        <?php include "mypage_common.php";?>

        <div class="content">
            <h2>최근 본 상품 (이미지 클릭시 이동)</h2>
            <div class="current_div">
                <ul>

                    <!-- 상품 하나 -->
                    <?php
              for($i=$firstLimit; $i < $secondLimit; $i++) { // array의 key_value 값을 첫번째 인덱스부터 끝번째 배열까지 수행해야 끝나는 while 문
                $val = $view_arr[$i];
                $current_select = "select product_autoNum, p.product_no, p.product_size, p.product_name, p.product_price, im.main_img_dir_name, p.created_at 
                FROM product p inner join images_main im on p.product_no = im.product_no where product_autoNum = $val order by created_at desc";
                $current_select_result = mysqli_query($con, $current_select);
                $current_select_array = mysqli_fetch_array($current_select_result); // 수행할때마다 해당value값에 해당하는 product_autoNum 번호의 데이터베이스 값을 배열 형식으로 가져온다.
                echo "
                    <li class='current_product'>
                        <div class='inner_img'>
                            <a href='/seungchan/shop_info.php?post_no=$val'><img src='{$current_select_array['main_img_dir_name']}'><input type='checkbox' class='check_box'></a>
                        </div>
                        <ul>
                            <li class='product'>상품명 : {$current_select_array['product_name']}</li>
                            <li class='size'>사이즈 : {$current_select_array['product_size']}</li>
                            <li class='price'>가격 : {$current_select_array['product_price']}</li>
                        </ul>
                    </li>
                     ";
            }
            ?>

                </ul>
                <div class="button_territory">
                    <!-- <button class="btn_select_only">전체선택</button>
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