<?php
	header('Content-Type: text/html; charset=utf-8');
	$inquire_category = $_POST["inquire_category"];
	$inquire_id = $_POST["inquire_id"];
	$inquire_title = $_POST["inquire_title"];
    $inquire_content = $_POST["inquire_content"];
    
    $con = mysqli_connect("localhost","seungchanshop","tmdcks2416!","seungchanshop");
	$sql = "insert into seungchanshop.qna(user_id, qna_category, qna_title, qna_content)";
	$sql .= "values ('$inquire_id', '$inquire_category', '$inquire_title', '$inquire_content')";
    mysqli_query($con, $sql);

    echo "
			<script>
				window.alert('QNA가 등록되었습니다.');
				location.href = '/Q&A.php';
			</script>
		";
?>