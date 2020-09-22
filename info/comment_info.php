<?php
    while($comment_row = mysqli_fetch_array($result)){
                if($user_nickname == $comment_row['user_nickname']) {
                        echo "
                        <div class='simple_review'>
                                <p class='product_no'><span class='review_explanation'>상품넘버</span> : $comment_row[product_autoNum]</p>
                                <p class='product_no'><span class='review_explanation'>상품이름</span> : $comment_row[product_name]</p>
                                <p class='product_no'><span class='review_explanation'>상품사이즈</span> : $comment_row[product_size]</p>
                                <p class='user_nickname'><span class='review_explanation'>유저닉네임</span> : $comment_row[user_nickname]</p>                        
                                <p class='review_satisfaction'> <span class='review_explanation'>상품 만족도</span> : $comment_row[product_satisfaction]</p>
                                <h5 class='content'><span class='review_explanation'>댓글</span> : $comment_row[comment_text]</h5>
                                <button type='button' class='fix_button'>수정</button>
                                <button type='button' class='delete_button'>삭제</button>
                                <p class='created_at'> <span class='review_explanation'>작성시간</span> : $comment_row[created_at]</p>
                                <img id='comment_img' src=$comment_row[main_img_dir_name]>
                                <input type='hidden' class='comment_no' value=$comment_row[comment_no]></input>
                        </div>
                        ";
                }
                else {
                        echo "
                        <div class='simple_review'>
                                <p class='product_no'><span class='review_explanation'>상품넘버</span> : $comment_row[product_autoNum]</p>
                                <p class='product_no'><span class='review_explanation'>상품이름</span> : $comment_row[product_name]</p>
                                <p class='product_no'><span class='review_explanation'>상품사이즈</span> : $comment_row[product_size]</p>
                                <p class='user_nickname'><span class='review_explanation'>유저닉네임</span> : $comment_row[user_nickname]</p>                        
                                <p class='review_satisfaction'> <span class='review_explanation'>상품 만족도</span> : $comment_row[product_satisfaction]</p>
                                <h5 class='content'><span class='review_explanation'>댓글</span> : $comment_row[comment_text]</h5>
                                <p class='created_at'> <span class='review_explanation'>작성시간</span> : $comment_row[created_at]</p>
                                <img id='comment_img' src=$comment_row[main_img_dir_name]>
                                <input type='hidden' class='comment_no' value=$comment_row[comment_no]></input>
                        </div>
                        ";
                }
        }
?>