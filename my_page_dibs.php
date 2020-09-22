<?php include "info/jjim_pagination.php";?>
<?php
 $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");
  session_start();
  if(isset($_SESSION["login_user_id"])) { 
      $user_id = $_SESSION["login_user_id"];
      $sql = $like_select = "select * from seungchanshop25.user_jjim where user_id = '$user_id' order by created_at desc".' '.$sqlLimit;
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
        <title>찜 목록</title>
        <link
            rel="stylesheet"
            href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/my_page.css">
        <link rel="stylesheet" href="css/my_page_dibs.css">
    </head>
    <body>

        <?php include "header.php";?>
        <?php include "fixed_header.php";?>
        <?php include "auth/auth_member.php";?>
        <?php include "mypage_common.php";?>

        <div class="content">
            <h2 style="font-size: 40px; font-weight: 300; display: inline-block;">찜 목록</h2>
            <table class="order">
                <tr>
                    <th>상품이미지</th>
                    <th>상품번호</th>
                    <th>카테고리</th>
                    <th>상품이름</th>
                    <th>가격</th>
                    <th>사이즈</th>
                    <th>컬러</th>
                </tr>

                <?php
              while($jjim_array =  mysqli_fetch_array($result)) {
                echo "
                      <tr>
                        <td class='list_td'>
                            <input type='checkbox' style='margin: 0; padding: 0;' class='dibs_checkbox'>
                            <img src=$jjim_array['main_img_dir_name']>
                            <td class='jjim_product_num'>$jjim_array['product_autoNum']</td>
                            <td class='jjim_product_category'>$jjim_array['product_category']</td>
                            <td class='jjim_product_name'>$jjim_array['product_name']</td>
                            <td class='jjim_product_price'>$jjim_array['product_price']<text>원</text></td>
                            <td class='jjim_product_size'>$jjim_array['product_size']</td>
                            <td class='jjim_product_color'>$jjim_array['product_color']</td>
                     ";
               }
            ?>
                <!-- <tr> <td>2020-02-14_96번</td> <td>주문대기중</td> <td>36,000원</td> <td>주문대기중</td>
                <td>비고<td> </tr> -->
            </table>
            <!-- <ul class="select_list">
                <li>
                    <button>전체선택</button>
                </li>
                <li>
                    <button>전체선택 헤제</button>
                </li>
                <li>
                    <button>선택상품 삭제</button>
                </li>
            </ul> -->

            <ul class="paybox">
                <li class="title">결제금액</li>
                <li>상품금액<span class="money">0원</span></li>
                <li>배송료<span class="money">+0원</span></li>
                <li>총 결제금액<span class="money">0원</span></li>
                <hr class="_">
                <li>
                    <button>주문기능은 없습니다.</button>
                </li>
            </ul>

            <div class="container">
                <?=$paging?>
            </div>
        </div>
    </div>
</section>

<?php include "footer.php";?>
</body>
</html>