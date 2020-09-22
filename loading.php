<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>loading</title>
    <link href="css/loading.css" rel="stylesheet">
</head>
<body>
    <div class="loader">
        <img src="img/loading-bars.svg" alt="Loading...">
    </div>
    <!-- <iframe src="/seungchan/index.php"></iframe> -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script>
        $(window).on('load',function(){
            $('.loader').hide();
        });
    </script>
</body>
</html>