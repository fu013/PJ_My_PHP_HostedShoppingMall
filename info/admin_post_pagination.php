<?php
    // 데이터베이스에서 가져온 데이터 창고
    // autoincrement를 추가해서 나열할때 편하게하자. 제일 최근이 뭔지 구분이 안가니깐 Autoincrement 나 등록되었을때 시간을 보고 구분하자.
    if(isset($_GET['page'])) {
		$page = $_GET['page'];
	  } else {
		$page = 1;
    }
    $onePage = 10;

    $con = mysqli_connect("localhost","seungchanshop","tmdcks2416!","seungchanshop");
    
    $product_miyaong = "select count(*) count from seungchanshop.product";
    $miyaong_result = mysqli_query($con, $product_miyaong);
    $product_count =  mysqli_fetch_array($miyaong_result);
    $product_count_row = $product_count['count'];

    $currentLimit = ($onePage * $page) - $onePage; // 1페이지 일때, 12-12 = 0,12; 2페이지일때 12,24 가져옴
    $sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage; //limit sql 구문 => 0, 0+12 / 12, 0+24

    $product_select = "select product_autoNum, product_no, product_category, product_name, product_price, 
    product_size, product_color, product_view, product_like, created_at FROM seungchanshop.product order by created_at desc".' '.$sqlLimit; 

    // $sqlLimit  = $page = 1일떄 0, 12 // $page = 2 일떄 12, 24 // 이런식으로 배열의 []번쨰 순서를 가져옴
    $product_select_result = mysqli_query($con, $product_select); // => sql 결과값을 담음 (프로덕트넘버가 있는 컬럼값을 모두담음)(어차피 무조건 있기때문에 전체 프로덕트값을 가져옴).
    $product_row_num = mysqli_num_rows($product_select_result); // => 프로덕트 로우가 몇개인지 알려줌 (length). 총행의 개수 (프로덕트넘버를 가진)
    // $product_row = mysqli_fetch_array($product_select_result); // => 모든 프로덕트 로우를 가져옴 (array). 한열만 가져옴


    $allPost = $product_count_row; // 전체 총 게시글의 수
    $allPage = ceil($allPost / $onePage); //전체 페이지의 수 12
    // $allPage = $allPost % $onePage == 0 ? $allPage : $allPage + 1;

    
    $oneSection = 10; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)
    $currentSection = ceil($page / $oneSection); //현재 섹션
    $allSection = ceil($allPage / $oneSection); //전체 섹션의 수
    $firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지
    // 1섹션의 첫 페이지 => 1, 2섹션의 첫 페이지 = 11, 3섹션의 첫 페이지 = 21
	if($currentSection == $allSection) {
		$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
	} else {
		$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
  }
    $prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
    $nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.
    // echo "$lastPage";

    if($allPost > 0) {

      $paging = '<ul class="pagination">';
      //첫 페이지가 아니라면 처음 버튼을 생성
      if($page != 1) { 
      $paging .= '<li class="page-item"><a class="page-link" href="?page=1">처음</a></li>';
      }
      // //첫 섹션이 아니라면 이전 버튼을 생성
    if($currentSection != 1) { 
      $paging .= '<li class="page-item"><a href="./?page=' . $prevPage . '">이전</a></li>';
      }
  
  
      for($i = $firstPage; $i <= $lastPage; $i++) { // 현재페이지 까지반복
  
        if($i == $page) {
          $paging .= '<li class="page-item">' . $i . '</li>';
        } else {
          $paging .= '<li class="page-item"><a href="?page=' . $i . '">' . $i . '</a></li>';
        }
      }
      if($currentSection != $allSection) { 
  
      $paging .= '<li class="page-item"><a href="?page=' . $nextPage . '">다음</a></li>';
  
      }
      if($page != $allPage) { 
  
      $paging .= '<li class="page-item"><a href="?page=' . $allPage . '">끝</a></li>';
    }
      $paging .= '</ul>';
  }
      mysqli_close($con);
?>