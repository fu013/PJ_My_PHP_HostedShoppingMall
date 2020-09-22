<?php
    if (!$user_id || $user_grade!=9 ) {
        echo "
            <script>
                alert('관리자 권한이 없습니다.');
                location.href='/index.php';
            </script>
        ";
    }
?>