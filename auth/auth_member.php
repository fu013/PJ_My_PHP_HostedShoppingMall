<?php
    if (!$user_id ) {
        echo "
            <script>
                alert('로그인이 필요한 서비스입니다.');
                location.href='/index.php';
            </script>
        ";
    }
?>