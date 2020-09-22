<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	echo "
		<script type='text/javascript' charset='utf-8'>
			alert('로그아웃 처리되었습니다.');
			location.href = '/index.php';
		</script>
	";
	session_destroy();
	foreach($_COOKIE as $key=>$val){ 
		setCookie($key,"",time()-3600,"/");
	}
	// 로그아웃시 모든 쿠키와 세션삭제
	session_close();
?>