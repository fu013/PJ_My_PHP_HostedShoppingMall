<?php
	header('Content-Type: text/html; charset=utf-8');
	$product_no = $_POST["product_no"];
	$product_category = $_POST["product_category"];
	$product_name = $_POST["product_name"];
	$product_guideline = $_POST["product_guideline"];
	$product_size = $_POST["product_size"];
	$product_color = $_POST["product_color"];
	$product_comment = $_POST["product_comment"];
	$product_price = $_POST["product_price"];

	$randomNum = mt_rand(1, 1000000000);
    date_default_timezone_set('Asia/Seoul');
    $micro_date = microtime();
    $date_array = explode(" ",$micro_date);
	$date = date("Y_m_dH_i_s",$date_array[1]);
	// 밀리세컨즈까지 구하는 date

	$upload_img_dir = '../img_data/'; // 저장할 경로 
	$use_img_dir = 'img_data/'; // 실제 페이지에서 사용할 경로
	// as는 무조건 배열의 값을 의미함
	// count($_files['file']['name']) 배열갯수 구하는 php 매서드 // array.length(); 와 같은기능	

	$con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");

	$db_product_no = "select * from product where product_no = '$product_no'";
	$db_product_name = "select * from product where product_name = '$product_name'";
	$num_result = mysqli_query($con, $db_product_no);
	$name_result = mysqli_query($con, $db_product_name);
	$num_match = mysqli_num_rows($num_result);
	$name_match = mysqli_num_rows($name_result);
	
	if ($num_match) {
		echo "
			<script>
				window.alert('상품번호가 중복되었습니다.');
				history.go(-1);
			</script>
		";
	} else if ($name_match ) {
		echo "
			<script>
				window.alert('상품명이 중복되었습니다.');
				history.go(-1);
			</script>
		";
	} else { // 상품번호, 상품명이 모두 중복이 아닐경우 쿼리문 정상실행
		$sql = "insert into seungchanshop25.product(product_no, product_category, product_name, product_price, product_guideline, product_size, product_color, product_comment)";
		$sql .= "values ('$product_no', '$product_category', '$product_name', '$product_price', '$product_guideline', '$product_size', '$product_color', '$product_comment')";
		mysqli_query($con, $sql);

		$product_main_img = $_FILES['product_main_img']['name'];
		$product_main_img_size = $_FILES['product_main_img']['size'];
		$product_main_img_type = $_FILES['product_main_img']['type'];
		$product_main_img_name = $date.'_'.$date_array[0].$product_main_img;
		$main_img_dir = '../img_data/main/';
		$main_img_user_dir = 'img_data/main/';

		$main_img_save_name = $main_img_dir.$product_main_img_name;
		$main_img_upload_name = $main_img_user_dir.$product_main_img_name;
		$sql_main_images = "insert into seungchanshop25.images_main(product_no, main_img_dir_name, main_img_type, main_img_size_bytes)";
		$sql_main_images .= "values ('$product_no', '$main_img_upload_name', '$product_main_img_type', $product_main_img_size)";
		mysqli_query($con, $sql_main_images);

		// @echo $_FILES['product_main_img']['tmp_name'];
		// move_uploaded_file($_FILES['product_main_img']['tmp_name'], $main_img_save_name);

		move_uploaded_file($_FILES['product_main_img']['tmp_name'], $main_img_save_name);


		// 주의사항 숫자와 이름은 중복안됨. 중복될경우 아예 데이터베이스에 값이 들어오지않고, 현재는 숫자만 예외처리해놓음. 이름은 안해놔서 수기로 바꿔줘야함.
		foreach ($_FILES['product_img']['name'] as $f => $product_img_name) {   
	
			$product_img_name = $_FILES['product_img']['name'][$f];
			// $product_img_name = ["1.png", "2.png"]; 이런 1차원 배열형태로 받음
			$extension = explode('.', $product_img_name);	// => 확장자명 => [{"1","png"},{"2","png"}] 이런식으로 새로운 2차원 배열을 만듬
			
			$img_name = $extension[0];
			// echo "이미지이름만출력_ $f 번째파일 이름 = $img_name <br> ";
			
			$product_img_size = $_FILES['product_img']['size'][$f];
			// echo "이미지사이즈_ $f 번째파일 사이즈 = $product_img_size <br> ";
	
			$product_img_type = $_FILES['product_img']['type'][$f];
			// echo "이미지타입_ $f 번째파일 타입 = $product_img_type <br> ";
	
			$product_img_error = $_FILES["product_img"]["error"][$f];
			// echo "이미지에러여부 0은 없음, 1은 발생_ $f 번째파일 에러여부 = $product_img_error <br> ";
	
			$upload_img_name = $date.'_'.$date_array[0].'_'.$img_name.'_'.$f.'.'.$extension[1];
			// 업로드 DB 네임 => 프로덕트넘버(같이등록한파일은 같은번호, 따로등록한파일은중복절대안됨)
			// 프로덕트 넘버+ 이미지고유네임 + 올려진순서 + 확장자명
			// 다르게 묶어진 상품이랑은 중복안되는 번호 + 이미지 고유네임 + 순서(같은상품끼리 중복절대안됨) + 확장자명 으로 중복예방
	
			// echo "upload_img_name_ $f 번째파일 DB업로드 이름 = $upload_img_name <br><br> ";
			
			$use_image_name = $use_img_dir.$upload_img_name;
			// echo "실제 사용될 이미지 이름 $f 번째파일 사용할이미지파일 이름 = $use_image_name <br><br> ";

			$dir_upload_img_name = $upload_img_dir.$upload_img_name;
			// echo "dir_upload_img_name_ $f 번째파일 경로+업로드 이름 = $dir_upload_img_name <br><br> ";
			// 저장될 경로 + 업로드 DB 네임 , 경로에 저장하기 위한 변수(무브 업로디드 파일 함수를 위해서 파일 옮길 경로지정을 위해)

			// if($product_img_error != 0) {
			// 	echo "
			// 		<script>
			// 			alert('파일 업로드 과정중 에러가 발생했습니다. 다시 시도해주세요.');
			// 			history.go(-1);
			// 		</script>
			// 		 ";
			//    exit;
			//  }
			if (move_uploaded_file($_FILES['product_img']['tmp_name'][$f], $dir_upload_img_name) == true) {		
				$sql_images = "insert into seungchanshop25.images(product_no, img_name, img_route, img_type, img_size_bytes)";
				$sql_images .= "values ('$product_no', '$use_image_name', '$dir_upload_img_name', '$product_img_type', '$product_img_size')";
				mysqli_query($con, $sql_images);	
			}
		}
		echo "
			<script>
				window.alert('상품이 성공적으로 등록되었습니다.');
				history.go(-1);
			</script>
		";
	}
	mysqli_close($con);
?>