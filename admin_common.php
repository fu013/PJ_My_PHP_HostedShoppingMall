<?php
  $con = mysqli_connect("localhost","seungchanshop","tmdcks2416!","seungchanshop");

  $user_count = "select count(*) count from seungchanshop.user";
  $user_count_result = mysqli_query($con, $user_count);
  $user_count_array =  mysqli_fetch_array($user_count_result);
  $user_count_row = $user_count_array['count'];

  $product_count = "select count(*) count from seungchanshop.product";
  $product_count_result = mysqli_query($con, $product_count);
  $product_count_array =  mysqli_fetch_array($product_count_result);
  $product_count_row = $product_count_array['count'];
?>
  <section class="mypage">
    <div class="my_page_wrapper">
       <h2>관리자페이지</h2>
       <div class="my_page_box_wrapper">
       <div class="grade_box">
          <p style =" margin-top:20px;"><?=$user_nickname?>님의 등급은 <span class="red">ADMIN</span><br>
          입니다.</p>
       </div>
       <div class="info_box">
          <ul>
            <dl>
              <dt>총 상품 등록수</dt>
              <dd><?=$product_count_row?>건</dd>
            </dl>
            <dl>
              <dt>회원수</dt>
              <dd><?=$user_count_row?>명</dd>
            </dl>
          </ul>
       </div>
    </div>
  </div>

<div class="my_menu_wrapper">

  <div class="my_menu">
    <dl>
      <dt>상품-등록 관리</dt>
      <dd><a href="admin_post_info.php">게시물관리</a></dd>
      <dd><a href="shop_register.php">게시물등록</a></dd>
    </dl>

    <dl>
      <dt>회원관리</dt>
      <dd><a href="admin_user_info.php">회원정보</a></dd>
    </dl>
  </div>

     <div class="my_menu_info">
       <ul>
         <li>주문접수 0</li>
         <li>결제완료 0</li>
         <li>출고시작 0</li>
         <li>배송중 0</li>
         <li>거래완료 0</li>
       </ul>
     <div class="my_menu_month_info">
       <dl>
         <dt>최근 한달이내 주문건의 정보</dt>
         <dd>취소&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="">0</span></dd>
         <dd>교환/반품&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="">0</span></dd>
       </dl>
     </div>

  </div>
</div>