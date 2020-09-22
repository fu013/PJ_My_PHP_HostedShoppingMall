<?php
session_start();
if(isset($_POST["selected_product_num"])) { // 삭제 요청한 번호가 있따면,
      foreach($_SESSION["shopping_cart"] as $keys => $values) {
        // 배열의 아이템넘버값이 요청받은 번호값과 같으면
        if($values["item_num"] == $_POST["selected_product_num"]) {

            // 세션에서 제거한다.
            unset($_SESSION["shopping_cart"][$keys]);
            // 세션 키 - 배열을 리어레이 한다.
            $_SESSION["shopping_cart"] = array_values($_SESSION["shopping_cart"]);
        }
      }
  }
?>