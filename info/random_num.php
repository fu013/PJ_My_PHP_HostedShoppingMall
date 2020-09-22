 <?php
    $randomNum = mt_rand(1, 1000000000);
    date_default_timezone_set('Asia/Seoul');
    $micro_date = microtime();
    $date_array = explode(" ",$micro_date);
    $date = date("Y-m-dH:i:s",$date_array[1]);
   // 밀리세컨즈까지 구하는 date
?>