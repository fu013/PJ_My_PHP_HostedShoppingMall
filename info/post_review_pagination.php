<?php
    // 데이터베이스에서 가져온 데이터 창고
    // autoincrement를 추가해서 나열할때 편하게하자. 제일 최근이 뭔지 구분이 안가니깐 Autoincrement 나 등록되었을때 시간을 보고 구분하자.
    if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
    }
    $onePage = 5;
    // 한페이지에 보여줄 게시글수

    $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");
    $product_miyaong = "select * from seungchanshop25.comment where product_autoNum = $post_no";
    $product_miyaongR = mysqli_query($con, $product_miyaong);
    $product_count_row = mysqli_num_rows($product_miyaongR); // 총로우개수

    // echo "$product_count_row";

    $currentLimit = ($onePage * $page) - $onePage; // 1페이지 일때, 12-12 = 0,12; 2페이지일때 12,24 가져옴
    
    $sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage; //limit sql 구문 => 0, 0+12 / 12, 0+24

    $product_select = 'select * from seungchanshop25.comment'.' '.$sqlLimit; // 프로덕트에 대한정보 + 해당 프로덕트넘버와 같은 프로덕트넘버를 가진 메인이미지네임을 가져옴.
    // 리밋을 써서 1페이지일떄 1~5로우열 2페이지일때 5~10로우열 3일떄 10~15 이런식으로 가져오게만들어서 sql문의 날짜 내림차순으로 순차적으로 그리고 5개씩 가져오게만든다.
    // $sqlLimit  = $page = 1일떄 0, 12 // $page = 2 일떄 12, 24 // 이런식으로 배열의 []번쨰 순서를 가져옴

    $product_select_result = mysqli_query($con, $product_select); // => sql 결과값을 담음 (프로덕트넘버가 있는 컬럼값을 모두담음)(어차피 무조건 있기때문에 전체 프로덕트값을 가져옴).
    // $product_row_num = mysqli_num_rows($product_select_result); // => 프로덕트 로우가 몇개인지 알려줌 (length). 총행의 개수 (프로덕트넘버를 가진) 페이지당 로우개수


    $allPost = $product_count_row; // 전체 총 게시글의 수
    $allPage = ceil($allPost / $onePage); //전체 페이지의 수 / onepage 페이지당게시물수

    
    $oneSection = 10; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)
    $currentSection = ceil($page / $oneSection); //현재 섹션
    $allSection = ceil($allPage / $oneSection); //전체 섹션의 수
    $firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지
    // 1섹션의 첫 페이지 => 1, 2섹션의 첫 페이지 = 11, 3섹션의 첫 페이지 = 21

if($allPost != 0) {
    
	if($currentSection == $allSection) {
		$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
	} else {
		$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
    }
    $prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
    $nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.
    // echo "$lastPage";

    $paging = '<ul class="pagination">';
    //첫 페이지가 아니라면 처음 버튼을 생성
    if($page != 1) { 
		$paging .= '<li class="page-item"><a class="page-link" href="?post_no='.$post_no.'&page=1">처음</a></li>';
    }
    // //첫 섹션이 아니라면 이전 버튼을 생성
	if($currentSection != 1) { 
		$paging .= '<li class="page-item"><a href="?post_no='.$post_no.'&page=' . $prevPage . '">이전</a></li>';
    }


    for($i = $firstPage; $i <= $lastPage; $i++) { // 현재페이지 까지반복

      if($i == $page) {
        $paging .= '<li class="page-item">' . $i . '</li>';
      } else {
        $paging .= '<li class="page-item"><a href="?post_no='.$post_no.'&page=' . $i . '">' . $i . '</a></li>';
      }
    }
    if($currentSection != $allSection) { 

		$paging .= '<li class="page-item"><a href="?post_no='.$post_no.'&page=' . $nextPage . '">다음</a></li>';

    }
    if($page != $allPage) { 

		$paging .= '<li class="page-item"><a href="?post_no='.$post_no.'&page=' . $allPage . '">끝</a></li>';
	}
    $paging .= '</ul>';
}
    mysqli_close($con);
?>