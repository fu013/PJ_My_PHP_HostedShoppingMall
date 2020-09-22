<?php
    // info/pagination.php 에서의 mysqli_fetch_array($product_select_result)
     while($product_row_post = mysqli_fetch_array($product_select_result)) {   
        echo "
                <li>
                    <a href='shop_info.php?post_no=$product_row_post[product_autoNum]'>
                        <h2><img src='$product_row_post[main_img_dir_name]'><div class='darkness'></div></h2>
                        <ul>
                            <li class='product_no'>상품번호 : $product_row_post[product_autoNum]</li>
                            <li class='product_name'>상품이름 : $product_row_post[product_name]</li>
                            <li class='size'>사이즈 : $product_row_post[product_size]</li>
                            <li class='price'>가격 : $product_row_post[product_price]원</li>
                            <li class='view'>조회수 : $product_row_post[product_view]</li>
                            <li class='like'>좋아요 : $product_row_post[product_like]</li>
                        </ul>
                    </a>
                </li>
             ";
    }
    // 방법 에코엔아다가 폼을 추가해서 겟방식으로 상품정보를 확인하는 사이트로 넘기고 파라미터값으로 상품번호와 같은값을 넘긴다음,
    // 그 파라미터값을 이용해서 그 파라미터값에 해당하는 프로덕트 오토인크러민트 로우행을 불러온다음, 이너 조인을 통해서 이미지값과 연동하여 정보를 가져와서 넣는다.
?>