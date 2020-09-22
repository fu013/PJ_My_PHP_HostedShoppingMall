<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    if(isset($_SESSION["login_user_id"])) { 
        $user_id = $_SESSION["login_user_id"];
        $post_no  = $_POST["like_post_no"];
        $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");

        $like_select = "select count(*) count from seungchanshop25.user_like where product_autoNum = $post_no and user_id = '$user_id'";
        $like_select_result = mysqli_query($con, $like_select);
        $like_count_array =  mysqli_fetch_array($like_select_result);
        $like_count_row = $like_count_array['count'];

        if ($like_count_row) {
            echo "이미 좋아요를 누른 상품입니다.";
        } else {
            $select_product = "select product_autoNum, p.product_no, p.product_size, p.product_name, p.product_price, im.main_img_dir_name, p.created_at 
            FROM product p inner join images_main im on p.product_no = im.product_no where product_autoNum = $post_no";
            $select_product_result = mysqli_query($con, $select_product);
            $select_product_array = mysqli_fetch_array($select_product_result);

            $insert_like = "insert into seungchanshop25.user_like(product_autoNum, user_id, user_like, main_img_dir_name, product_name, product_size, product_price)";
            $insert_like .= "values ($select_product_array[product_autoNum], '$user_id', 1, '$select_product_array[main_img_dir_name]', '$select_product_array[product_name]', '$select_product_array[product_size]', $select_product_array[product_price])";
            mysqli_query($con, $insert_like);

            $update_like = 'update product set product_like = product_like + 1 where product_autoNum = ' . $post_no;
		    $result_like = mysqli_query($con, $update_like); 
            echo "좋아요가 등록되었습니다.";
        }
    } else {
        $user_id = '';
        echo "로그인이 필요한 서비스입니다.";
    }
?>