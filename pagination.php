<?php
include("connect.php");

$query = "SELECT * FROM  users";
	
$statement = $db->prepare($query);

$statement->execute();

$total ='0';

$adjacents = 3;
$targetpage = "pagination.php"; //your file name
$limit = 5; //how many items to show per page
$page = $_GET[''];

if($page){ 
$start = ($page - 1) * $limit; //first item to display on this page
}else{
$start = 0;
}

/* Setup page vars for display. */
if ($page == 0) $page = 1; //if no page var is given, default to 1.
$prev = $page - 1; //previous page is current page - 1
$next = $page + 1; //next page is current page + 1
$lastpage = ceil($total/$limit); //lastpage.
$lpm1 = $lastpage - 1; //last page minus 1

$sql2 = "select * from users where 1=1";
$sql2 .= " order by id  limit $start ,$limit ";
$statement2 = $db->prepare($sql2);
$statement2->execute();

/* CREATE THE PAGINATION */

$pagination = "";
if($lastpage > 1)
{ 
$pagination .= "<div class='pagination1'> <ul>";
if ($page > $counter+1) {
$pagination.= "<li><a href=\"$targetpage?page=$prev\">prev</a></li>"; 
}

if ($lastpage < 7 + ($adjacents * 2)) 
{ 
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
$pagination.= "<li><a href='#' class='active'>$counter</a></li>";
else
$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>"; 
}
}
elseif($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2)) 
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$pagination.= "<li><a href='#' class='active'>$counter</a></li>";
else
$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>"; 
}
$pagination.= "<li>...</li>";
$pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
$pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>"; 
}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
$pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
$pagination.= "<li>...</li>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$pagination.= "<li><a href='#' class='active'>$counter</a></li>";
else
$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>"; 
}
$pagination.= "<li>...</li>";
$pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
$pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>"; 
}
//close to end; only hide early pages
else
{
$pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
$pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
$pagination.= "<li>...</li>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; 
$counter++)
{
if ($counter == $page)
$pagination.= "<li><a href='#' class='active'>$counter</a></li>";
else
$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>"; 
}
}
}

//next button
if ($page < $counter - 1) 
$pagination.= "<li><a href=\"$targetpage?page=$next\">next</a></li>";
else
$pagination.= "";
$pagination.= "</ul></div>\n"; 
}


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagination</title>
<style>
.pagination1 {
margin:0; 
padding:0;
float:left;
}
.pagination1 ul {
width:600px;
float: right;
list-style: none;
margin:0 0 0 ;
padding:0;
}
.pagination1 li span { line-height:45px; font-weight:bold;}
.pagination1 li {
margin:0 0 0 0;
float:left;
font-size:16px;
text-transform:uppercase;
}
.pagination1 li a {
color:#7f8588;
padding:10px 0 0 0; width:33px; height:33px;
text-decoration:none; text-align:center;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
display:block;
}
.pagination1 li:last-child a:hover { background:none; color:#7f8588;}
.pagination1 li:first-child a:hover { background:none;color:#7f8588;}
.pagination1 li a:hover {
color:#fff;
text-decoration: none;
display: block;
padding:10px 0 0 0; width:33px; height:33px;
}
.pagination1 li.activepage a { 
color:#fff;
text-decoration: none;
padding: 10px 0 0 0; }
</style>
</head>

<body>

<?php 
	while ($row = $statement->fetch()){
		print $row['username']." - ".$row['email']."<br>";
	}

echo $pagination; 
?>
</body>

</html>
