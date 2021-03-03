<?php
    $post_no  = $_GET["post_no"];
    $con = mysqli_connect("localhost","seungchanshop","tmdcks2416!","seungchanshop");

    if(!empty($post_no) && empty($_COOKIE['qna_view' . $post_no])) { // 포스트넘버가 존재하고, 해당 쿠키가 비어있을때
		$sql_view = "update seungchanshop.qna set qna_hits = qna_hits + 1 where qna_no = $post_no"; // 조회수 + 1
		$result_view = mysqli_query($con, $sql_view); 
		if(empty($result_view)) { // sql문을 실행하지않았다면
?>
    <script>
        alert('오류가 발생했습니다.');
        history.back();
    </script>
<?php 
		} else { // sql 문을 실행했다면 (조회수가 1이 올라갔다면) 24시간동안 유지되는 post_view포-넘 쿠키를 만든다. 
			setcookie('qna_view' . $post_no, TRUE, time() + (60 * 60 * 24), '/');
		}
    }

    $select_qna = "select * from seungchanshop.qna where qna_no = $post_no";
    $select_qna_result = mysqli_query($con, $select_qna);
    $select_qna_result_array = mysqli_fetch_array($select_qna_result);

    $review_select = "select * from seungchanshop.qna_comment where qna_no = $post_no";
    $review_select_result = mysqli_query($con, $review_select);
    $review_count_row = mysqli_num_rows($review_select_result);


    // 댓글 삭제 AJAX POST DATA 처리
    $delete_comment_no = $_POST['delete_comment_no'];
    $delete_comment = "delete from seungchanshop.qna_comment WHERE comment_no= $delete_comment_no";
    $delete_result = mysqli_query($con, $delete_comment);

    // 댓글 수정 AJAX POST DATA 처리
    $fix_comment_no = $_POST['fix_comment_no'];
    $fixed_review = $_POST['fixed_review'];
    $update_review = "update seungchanshop.qna_comment set qna_comment = '$fixed_review' WHERE comment_no= $fix_comment_no";
    $update_result = mysqli_query($con, $update_review);
?>
<?php include "info/qna_comment_pagination.php";?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	 <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
     <link rel="stylesheet" href="css/Q&A_post.css">
</head>
<body>
    
    <?php include "header.php";?>
    <?php include "fixed_header.php";?>
    <?php include "auth/auth_member.php";?>


        <div class="board_post">
            <h2>Q&A</h2>
            <button class="list" onclick="location.href='Q&A.php' ">목록</button>
            <ul class="post_wrap">
                <li class="post_title"><h2>제목 : <?=$select_qna_result_array['qna_title']?></h2></li>
                <li class="post_id">아이디 : <?=$select_qna_result_array['user_id']?></li>
                <li class="post_content">내용 : <?=$select_qna_result_array['qna_content']?>
                <div class="this_info">
                    <ul>
                        <li>번호 : <?=$select_qna_result_array['qna_no']?></li>
                        <li>날짜 : <?=$select_qna_result_array['created_at']?></li>
                        <li>조회수 : <?=$select_qna_result_array['qna_hits']?></li>
                    </ul>
                </div>
                </li>
                <li class="post_review">
                <div class="review_num">답글(<?=$review_count_row?>)</div>
                    <ul class="review_spot">
                    <?php
                        $con = mysqli_connect("localhost","seungchanshop","tmdcks2416!","seungchanshop");
                        $comment = 'select * from seungchanshop.qna_comment where qna_no = '.$post_no.' order by created_at desc'.' '.$sqlLimit;
                        $result = mysqli_query($con, $comment);
                        include "info/qna_comment_info.php";
                    ?>
                    </ul>
                </li>
            <div class="container">           
                <?=$paging?>
            </div>

            <input type="hidden" id="post_no" name="post_no" value="<?=$post_no?>">
            <input type="hidden" id="user_id" name="user_id" value="<?=$user_id?>">

            <div class="review_box">
                <textarea class="review_box_wrap" name="review_comment" id="review_comment"></textarea>
                <span>(500자이내로)</span><button class="btn_register_review" type="button">등록</button>
            </div>
        </ul>
    </div>


    <?php include "footer.php";?>

    <script src="js/qna_review.js"></script>
    <script src="js/qna_review_fix_delete.js"></script>
    <?php
      // AJAX 게시판 댓글 데이터
      $review_userid = $_POST['review_userid'];
      $review_comment = $_POST['review_comment'];
      $review_post_no = $_POST['review_post_no'];

      $con = mysqli_connect("localhost","seungchanshop","tmdcks2416!","seungchanshop");
      $sql = "insert into seungchanshop.qna_comment(qna_no, user_id, qna_comment)";
      $sql .= "values($review_post_no, '$review_userid', '$review_comment')";
      mysqli_query($con, $sql);
      mysqli_close($con); 
    ?>
</body>
</html>