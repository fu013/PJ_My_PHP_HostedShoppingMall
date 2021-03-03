<?php
  $post_no  = $_GET["post_no"];
  $con = mysqli_connect("localhost","seungchanshop","tmdcks2416!","seungchanshop");
  session_start();
    if(isset($_SESSION["login_user_id"])) { 
        $user_id = $_SESSION["login_user_id"];
        $view_arr = explode(",",$_COOKIE['goods_view']); // 중복검사
        if(array_search($post_no, $view_arr) === false) { // array안에 key => value 값으로 포스트넘 중복이 없을때만 실행
          setcookie("goods_view", $_COOKIE['goods_view'].",".$post_no, time() + 86400,"/");
        }
    } else {
        $user_id = '';
    }

  // 상품 조회수 올리기 및 쿠키로 제어
  if(!empty($post_no) && empty($_COOKIE['post_view' . $post_no])) { // 포스트넘버가 존재하고, 해당 쿠키가 비어있을때
		$sql_view = 'update product set product_view = product_view + 1 where product_autoNum = ' . $post_no; // 조회수 + 1
		$result_view = mysqli_query($con, $sql_view); 
		if(empty($result_view)) { // sql문을 실행하지않았다면
			?>
<script>
    alert('오류가 발생했습니다.');
    history.back();
</script>
<?php 
		} else { // sql 문을 실행했다면 (조회수가 1이 올라갔다면) 24시간동안 유지되는 post_view포-넘 쿠키를 만든다. 
			setcookie('post_view' . $post_no, TRUE, time() + (60 * 60 * 24), '/');
		}
  }

  $select_view = "select product_view from seungchanshop.product where product_autoNum = $post_no";
  $select_view_result = mysqli_query($con, $select_view);
  $select_view_result_array = mysqli_fetch_array($select_view_result);
  $post_view = $select_view_result_array['product_view'];

  $product_select = "select product_autoNum, p.product_no, product_category, product_name, product_price, product_guideline, 
  product_size, product_color, product_comment, im.main_img_dir_name, i.img_name, p.created_at 
  FROM product p inner join images_main im on p.product_no = 
  im.product_no inner join images i on p.product_no = i.product_no where product_autoNum = $post_no";

  $img_select = "select product_autoNum, p.product_no, i.img_name, p.created_at 
  FROM product p inner join images i on p.product_no = i.product_no where product_autoNum = $post_no order by created_at desc";

  $product_select_result = mysqli_query($con, $product_select);
  $img_select_result = mysqli_query($con, $img_select);
  $product_select_array = mysqli_fetch_array($product_select_result);

  // $con = mysqli_connect("localhost","root","root","seungchan_shop","3306");
  $review_select = "select * from seungchanshop.comment where product_autoNum = $post_no";
  $review_select_result = mysqli_query($con, $review_select);
  $review_count_row = mysqli_num_rows($review_select_result);


  // 댓글 삭제 AJAX POST DATA 처리
  $delete_comment_no = $_POST['delete_comment_no'];
  $delete_comment = "delete from seungchanshop.comment WHERE comment_no= $delete_comment_no";
  $delete_result = mysqli_query($con, $delete_comment);

  // 댓글 수정 AJAX POST DATA 처리
  $fix_comment_no = $_POST['fix_comment_no'];
  $fixed_review = $_POST['fixed_review'];
  $update_review = "update seungchanshop.comment set comment_text = '$fixed_review' WHERE comment_no= $fix_comment_no";
  $update_result = mysqli_query($con, $update_review);
?>

<?php include "info/post_review_pagination.php";?>

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
        <link rel="stylesheet" href="css/shop_info.css">
    </head>
    <body>

        <?php include "header.php";?>
        <?php include "fixed_header.php";?>
        <section>
            <div class="info_wrapper">
                <div class="img_section"><img src="<?=$product_select_array['main_img_dir_name']?>"></div>
                <div class="read_section">
                    <ul>
                        <li class="info_title">
                            <h5 class="title"><?=$product_select_array['product_name']?></h5>
                            <p class="size"><?=$product_select_array['product_size']?></p>
                            <span class="status"><?=$product_select_array['product_category']?></span>
                            <hr>
                        </li>
                        <li class="explanation"><?=$product_select_array['product_guideline']?></li>
                        <li class="price">판매가:<h4><?=$product_select_array['product_price']?>원</h4>
                        </li>
                        <li class="colour">색상:
                            <?=$product_select_array['product_color']?>
                        </span>
                    </li>
                    <li class="size_2">사이즈:<span class="size_box"><?=$product_select_array['product_size']?></span></li>
                    <li class="total_price">총 상품 금액:<h4><?=$product_select_array['product_price']?></h4>원</li>

                    <li class="like">
                        <button type="button" class="like_button">좋아요</button>

                        <input
                            type="hidden"
                            class="like_post_no"
                            name="like_post_no"
                            value="<?=$post_no?>">
                    </li>

                    <li class="jjim_li">
                        <button class="jjim_button">찜하기</button>

                        <input
                            type="hidden"
                            class="jjim_post_no"
                            name="jjim_post_no"
                            value="<?=$post_no?>">
                    </li>
                    <li class="basket_li">
                        <!-- <form action="basket.php" method="post"> -->
                        <button type="button" class="basket" id="basket_button">장바구니</button>
                        
                        <input
                            type="hidden"
                            class="basket_post_no"
                            name="basket_post_no"
                            value="<?=$post_no?>">
                        <!-- </form> -->
                    </li>
                    <li>조회수:
                        <?=$post_view?></li>
                    <li class="purchase_li">
                        <button class="purchase_button">주문기능은 없습니다</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab_div">
            <ul class="tab_menu">
                <li>
                    <a
                        class="targetInfo"
                        href="#a"
                        style=" border: 1px solid black; font-size: 20px; color: black;">상품정보</a>
                </li>
                <li>
                    <a class="tabReview" href="#a" style=" color: black; ">구매후기(<?=$review_count_row?>)</a>
                </li>
            </ul>
        </div>
        <div class="detail_info">
            <p>&nbsp;<?=$product_select_array['product_comment']?></p>

            <div class='img_upload' alt='이미지 올리는 곳'>
                <?php
            while($img_select_array = mysqli_fetch_array($img_select_result)) {  // 어레이는 처음에 가져올떄 무조건 최상단의 값을 가져오는데, 한번 가져온배열은 다시가져오지않으므로, 와일문을 통해
              // 돌리게되면 처음가져왔을때 최상단배열 그리고 그배열은 다시가져오지않으니 두번째엔 그다음배열을 가져오게된다 이런식으로 배열의 갯수대로 와일문이돌고 모든 배열을 다 가져오게되며,
              // 최상단부터 순차적으로 값을 가져오게된다. 그래서 가져올때마다 값을넣으면 1번째 배열의값 2번쨰~ 마지막 배열에 있는값까지 다 들어간다.
              echo "
                      <img src='$img_select_array[img_name]'>
                  ";
            }
          ?>
            </div>

            <div class="tab_div" id="tab_back">
                <ul class="tab_menu">
                    <li>
                        <a class="tabContent" href="#a" style=" color: black;">상품정보</a>
                    </li>
                    <li>
                        <a
                            class="targetReview"
                            href="#a"
                            style=" border: 1px solid black; font-size: 20px; color: black;">구매후기(<?=$review_count_row?>)</a>
                    </li>
                </ul>
            </div>
            <div class="review_spot">
                <?php
               $con = mysqli_connect("localhost","seungchanshop","tmdcks2416!","seungchanshop");
                $comment = 'select * from seungchanshop.comment where product_autoNum = '.$post_no.' order by created_at desc'.' '.$sqlLimit;
                $result = mysqli_query($con, $comment);
                include "info/comment_info.php";
              ?>
            </div>

            <?php echo $paging ?>

            <!-- 댓글 등록 -->
            <div
                class="review_register"
                style="border: 1px solid black; height: 200px; box-sizing: border-box; padding: 20px; text-align: left; position: relative;">
                <textarea
                    placeholder="댓글을 입력해주세요."
                    id="review_commnet"
                    name="review_comment"
                    style="width: 100%; height: 60%; border: 1px solid black; margin: 0 -3px 0;"></textarea>
                <div style="margin-top: 15px;">
                    <span style="font-size: 15px;">
                        상품만족도 조사:
                        <select
                            name="review_satisfaction"
                            class="review_satisfaction"
                            id="review_satisfaction"
                            title="상품만족도조사"
                            style="width: 120px; height: 30px;">
                            <option value="최고에요">최고에요</option>
                            <option value="굿이에요">굿이에요</option>
                            <option value="그냥그래요">그냥그래요</option>
                            <option value="별로에요">별로에요</option>
                            <option value="최악이에요">최악이에요</option>
                        </select>
                    </span>
                    <input
                        type="hidden"
                        id="review_userNickname"
                        name="review_userNickname"
                        value="<?=$user_nickname?>">
                    <input
                        type="hidden"
                        id="review_imgName"
                        name="review_imgName"
                        value="<?=$product_select_array['main_img_dir_name']?>">
                    <input type="hidden" id="post_no" name="post_no" value="<?=$post_no?>">
                    <input
                        type="hidden"
                        id="product_name"
                        name="post_name"
                        value="<?=$product_select_array['product_name']?>">
                    <input
                        type="hidden"
                        id="product_size"
                        name="product_size"
                        value="<?=$product_select_array['product_size']?>">
                </div>
                <button
                    type="button"
                    id="review_button"
                    name="review_button"
                    style="position: absolute; right:18px; top: 140px; width: 80px; height: 40px; line-height: 40px; background: white;">댓글등록</button>
            </div>

        </div>
    </section>
    <?php include "footer.php";?>
    <?php
      // AJAX 게시판 댓글 데이터
      $review_userNickname = $_POST['review_userNickname'];
      $review_comment = $_POST['review_comment'];
      $review_satisfaction = $_POST['review_satisfaction'];
      $review_imgName = $_POST['review_imgName'];
      $review_post_no = $_POST['review_post_no'];
      $review_product_name = $_POST['review_product_name'];
      $review_prodcut_size = $_POST['review_prodcut_size'];

        $con = mysqli_connect("localhost","seungchanshop","tmdcks2416!","seungchanshop");
      $sql = "insert into comment(product_autoNum, main_img_dir_name, user_nickname, comment_text, product_satisfaction, product_size, product_name)";
      $sql .= "values($review_post_no, '$review_imgName', '$review_userNickname', '$review_comment', '$review_satisfaction', '$review_prodcut_size', '$review_product_name')";
      mysqli_query($con, $sql);
      mysqli_close($con); 
    ?>
    <script>
        $(document).ready(function () {
            $(".tabContent").on("click", function (e) {
                e.preventDefault();
                $("body, html").animate({
                    scrollTop: $('.targetInfo')
                        .offset()
                        .top - 300
                }, 300);
            });

            $(".tabReview").on("click", function (e) {
                e.preventDefault();
                $("body, html").animate({
                    scrollTop: $('.targetReview')
                        .offset()
                        .top - 300
                }, 300);
            });
        });
    </script>
    <script src="js/review.js"></script>
    <script src="js/jjim.js"></script>
    <script src="js/like.js"></script>
    <script src="js/basket.js"></script>
    <script src="js/review_fix_delete.js"></script>
</body>
</html>