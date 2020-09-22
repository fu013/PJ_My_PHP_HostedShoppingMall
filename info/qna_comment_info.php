<?php
    while($comment_row = mysqli_fetch_array($result)){
                if($user_id == $comment_row['user_id']) {
                        echo "
                            <li class='unit_review'>
                                <ul>
                                    <li>
                                        <h2>$comment_row[user_id]</h2><span>$comment_row[created_at]</span>
                                        <button class='fix_button' type='button'>수정</button>
                                        <button class='delete_button' type='button'>삭제</button>
                                        <input type='hidden' class='comment_no' value=$comment_row[comment_no]></input>
                                    </li>
                                    <li class='review_text'>내용 : $comment_row[qna_comment]</li>
                                </ul>
                            </li>
                        ";
                }
                else {
                        echo "
                        <li class='unit_review'>
                            <ul>
                                <li>
                                    <h2>$comment_row[user_id]</h2><span>$comment_row[created_at]</span>
                                </li>
                                <li class='review_text'>내용 : $comment_row[qna_comment]</li>
                            </ul>
                        </li>
                        ";
                }
        }
?>
