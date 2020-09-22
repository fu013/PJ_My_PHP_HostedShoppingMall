<?php include "info/qna_pagination.php";?>
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
     <link rel="stylesheet" href="css/Q&A.css">
</head>
<body>
    
    <?php include "header.php";?>
    <?php include "fixed_header.php";?>


        <div class="board_wrap">
        	<h2>Q&A 고객센터</h2>
            <!-- 나중에 재개 -->
        	<!-- <div class="search_form">
        		<ul>
        			<li>
        			<select class="search_Checker">
                    <option value="" class="search_Checker">제목</option>
                    <option value="writer">작성자</option>
                    <option value="content">내용</option>
                    <option value="date">날짜</option>
                    </select>
        			<li>
        			<input type="text" class="search_filter">
        		    <span class="search_icon"><i class="xi-magnifier"></i></span>
        		    </li>
        		</ul>
        	</div> -->
            <div class="board_table_form">
            <table class="board_table">
                <caption>
                    <details>
                        <summary class="board_summary">냐옹</summary>
                        <div class="board_summary">냐옹이게시판</div>
                    </details>
                    </caption>
                    <colru  >
                    </colgroup>
                 <div id="board_frame">
                        <tbody>
                        <tr class="board_title" >
                            <th>NO</th>
                            <th>CATEGORY</th>
                            <th>TITLE</th>
                            <th>ID</th>
                            <th>DATE</th>
                            <th>HITS</th>
                        </tr>

                        <!-- 글한개 -->
                         <?php include "info/qna_post_info.php";?>
                       
                        </tbody>
                    </table>
                    <div class="button_for_posting">
                        <button class="writer_post" type="button" onclick="location.href='Q&A_write.php' ">글작성</button>
                    </div>
                </div>
            <div class="container">           
                <?=$paging?>
            </div>
        </div>


    <?php include "footer.php";?>
</body>
</html>