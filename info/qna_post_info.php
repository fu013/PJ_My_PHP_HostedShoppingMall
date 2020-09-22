<?php
    // info/qna_pagination.php 에서의 mysqli_fetch_array($product_select_result)
     while($product_row_post = mysqli_fetch_array($product_select_result)) {   
        echo "  
                    <tr class='additional_tr'>
                            <td><a href=Q&A_post.php?post_no=$product_row_post[qna_no]>$product_row_post[qna_no]</a></td>
                            <td><a href=Q&A_post.php?post_no=$product_row_post[qna_no]>$product_row_post[qna_category]</a></td>
                            <td><a href=Q&A_post.php?post_no=$product_row_post[qna_no]>$product_row_post[qna_title]</a></td>
                            <td><a href=Q&A_post.php?post_no=$product_row_post[qna_no]>$product_row_post[user_id]</a></td>
                            <td><a href=Q&A_post.php?post_no=$product_row_post[qna_no]>$product_row_post[created_at]</a></td>
                            <td><a href=Q&A_post.php?post_no=$product_row_post[qna_no]>$product_row_post[qna_category]</a></td>
                    </tr>
             ";
    }
?>