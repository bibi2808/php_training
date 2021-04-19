<?php
    require_once('./connect.php');

    // Tổng số phần tử
    $totalItems				= $database->totalItem("SELECT COUNT(`id`) AS totalItems FROM `user`");

    // Tổng số phần tử xuất hiện trên một trang
    $totalItemsPerPage		= 2;

    // Tổng số trang
	// $totalPage				= ceil($totalItems/$totalItemsPerPage);
    
    // current Page
    // $currentPage = (isset($_GET['page'])) ?? 1;


    // $start = "<li>Start</li>";
    // $prev = "<li>Previous</li>";
    // if($currentPage > 1){
    //     $start = "<li><a href='?page=1'>Start</a></li>";
    //     $prev = "<li><a href='?page=".($currentPage-1)."'>Previous</a></li>";
    // }

    // $next = "<li>Next</li>";
    // $end = "<li>End</li>";
    // if($currentPage > 1){
    //     $next = "<li><a href='?page=".($currentPage-1)."'>Next</a></li>";
    //     $end = "<li><a href='?page=".$totalPage."'>End</a></li>";
    // }

    // $paginationHTML = '<ul class="pagination">' . $start . $prev  . $next . $end . '</ul>';

    // $position = ($currentPage - 1) * $totalItems;

    $query[]	= "SELECT `id`, `username`, CONCAT(`firstname`, ' ', `lastname`) AS 'fullname', `email`, `birthday`, `status`, `ordering`";
    $query[]	= "FROM `user`";
    $query[]	= "LIMIT $position, $totalItemsPerPage";

    $query		= implode(" ", $query);
    $list = $database->listRecords($query);
    $xhtml = '';
    if (!empty($list)) {
        $i = 0;
        foreach ($list as $key=>$item) {
            $row 	= ($i % 2 == 0) ? "odd" : "even";
            $status	= ($item['status']==0) ? 'Inactive' : 'Active';
            $xhtml .= '<div class="row '.$row.'">
							<p class="id">'.$item['id'].'</p>
							<p class="username">'.$item['username'].'</p>
							<p class="fullname">'.$item['fullname'].'</p>
							<p class="email">'.$item['email'].'</p>
							<p class="birthday">'.date("d-m-Y", strtotime($item['birthday'])).'</p>
							<p class="status">'.$status.'</p>
							<p class="ordering">'.$item['ordering'].'</p>
						</div>';
        }
    } else {
        $xhtml = 'Dữ liệu đang cập nhật';
    }

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Manage User</title>
</head>

<body>
    <div id="wrapper">
        <div class="title">Manage user</div>
        <div class="list">
            <div class="row head">
                <p class="id">ID</p>
                <p class="username">UserName</p>
                <p class="fullname">Full Name</p>
                <p class="email">Email</p>
                <p class="birthday">Birthday</p>
                <p class="status">Status</p>
                <p class="ordering">Ordering</p>
            </div>
            <?php echo $xhtml;?>
        </div>
        <div id="pagination">
            <!-- <?php echo $paginationHTML;?> -->
        </div>
    </div>
</body>

</html>