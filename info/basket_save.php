<?php
  $basket_post_no = $_POST["basket_post_no"]; // 포스트 방식으로 basket_post_no를 ajax data를 form data 형식의 값으로 받아온다.
  
  session_start();

  if(isset($_POST["basket_post_no"])) { // basket_post_no 라는 속성 키값이 포스트방식값으로 왔을때,
    
    $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");
    $basket_select = "select product_autoNum, product_category, product_name, product_price, product_size, product_color, main_img_dir_name from product p inner join images_main im on p.product_no = 
    im.product_no where product_autoNum = $basket_post_no";
    $basket_result = mysqli_query($con, $basket_select);
    $basket_array = mysqli_fetch_array($basket_result);

    // 요청받은 AJAX 포스트넘버와 일치하는 상품 DB 값 가져오기
    $basket_product_num = $basket_array['product_autoNum'];
    $basket_product_img = $basket_array['main_img_dir_name'];
    $basket_product_name = $basket_array['product_name'];
    $basket_product_category = $basket_array['product_category'];
    $basket_product_price = $basket_array['product_price'];
    $basket_product_size = $basket_array['product_size'];
    $basket_product_color = $basket_array['product_color'];

    if(isset($_SESSION["shopping_cart"])) { // 쇼핑카트 세션 배열이 존재한다면,
      $basket_item_array_name = array_column($_SESSION["shopping_cart"],"item_name"); // 값이 배열로 이루어진 배열에서 배열key 값이 item_name인 값을 찾아서 배열로 리턴
      if(!in_array($basket_product_name, $basket_item_array_name)) { // 클릭한 상품의 네임값이 배열에 키값으로 존재 하지 않으면 (중복검사, 중복이 아니라면)

        $count = count($_SESSION["shopping_cart"]); // shopping_cart 세션 배열에 들어있는 배열의 수 0개면 0 1개면 1

        $basket_item_array = array(
          'item_num' => $basket_product_num,
          'item_img' => $basket_product_img,
          'item_name' => $basket_product_name,
          'item_category' => $basket_product_category,
          'item_price' => $basket_product_price,
          'item_size' => $basket_product_size,
          'item_color' => $basket_product_color
        );

        //shopping_cart 세션 배열에서 그 다음 방부터 차례로 넣는다. 예를들어 원래 1개가 있었다면 [1] 즉 2번째 인덱스에 새로운값을 넣는다. 원래 2개면 카운트는 [2] 므로 3번쨰 인덱스에 넣음, 다음번째 인덱스에 계속해서 새로운값을 추가.
        $_SESSION["shopping_cart"][$count] = $basket_item_array; // 쇼핑카트 배열에 $basket_item_array 라는 배열을 넣어서 2차원 배열을 만든다. 총갯수가 1개면 2번쨰 인덱스에 넣고, 2개면 3번쨰 인덱스에 넣는다. (겹치지 않게 순차적으로 넣어줌)
        echo '장바구니에 상품을 넣었습니다.';
      } else {
        echo '같은 상품이 존재합니다.';
    }

    // 쇼핑카트 세션 배열이 존재하지 않는다면(즉, 처음 AJAX 요청을 받았을때)
    } else {

        $basket_item_array = array(
          'item_num' => $basket_product_num,
          'item_img' => $basket_product_img,
          'item_name' => $basket_product_name,
          'item_category' => $basket_product_category,
          'item_price' => $basket_product_price,
          'item_size' => $basket_product_size,
          'item_color' => $basket_product_color
        );
        
      //key 값이 shopping_cart 인 배열 0번 방에 상품 배열을 넣었다.
        $_SESSION["shopping_cart"][0] = $basket_item_array;
        echo '장바구니에 상품을 넣었습니다.';
    }
  }
?>