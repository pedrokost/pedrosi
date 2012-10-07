<?php require_once('Connections/Books_list.php'); ?>
<?php require_once('_includes/sessionControl.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_Books_list, $Books_list);
$query_rsBooks = "SELECT * FROM books ORDER BY `Date read` DESC";
$rsBooks = mysql_query($query_rsBooks, $Books_list) or die(mysql_error());
$row_rsBooks = mysql_fetch_assoc($rsBooks);
$totalRows_rsBooks = mysql_num_rows($rsBooks);

$colname_rsUser = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsUser = $_SESSION['MM_Username'];
}
mysql_select_db($database_Books_list, $Books_list);
$query_rsUser = sprintf("SELECT username, image, Name FROM users WHERE username = %s", GetSQLValueString($colname_rsUser, "text"));
$rsUser = mysql_query($query_rsUser, $Books_list) or die(mysql_error());
$row_rsUser = mysql_fetch_assoc($rsUser);
$totalRows_rsUser = mysql_num_rows($rsUser);

$maxRows_rsBooks = 9999;
$pageNum_rsBooks = 0;
if (isset($_GET['pageNum_rsBooks'])) {
  $pageNum_rsBooks = $_GET['pageNum_rsBooks'];
}
$startRow_rsBooks = $pageNum_rsBooks * $maxRows_rsBooks;

if (isset($_GET['totalRows_rsBooks'])) {
  $totalRows_rsBooks = $_GET['totalRows_rsBooks'];
} else {
  $all_rsBooks = mysql_query($query_rsBooks);
  $totalRows_rsBooks = mysql_num_rows($all_rsBooks);
}
$totalPages_rsBooks = ceil($totalRows_rsBooks/$maxRows_rsBooks)-1;


mysql_select_db($database_Books_list, $Books_list);
$query_rsBooksFiction = "SELECT ID FROM books WHERE fiction=1";
$rsBooksFiction = mysql_query($query_rsBooksFiction, $Books_list) or die(mysql_error());
$row_rsBooksFiction = mysql_fetch_assoc($rsBooksFiction);
$totalRows_rsBooksFiction = mysql_num_rows($rsBooksFiction);

//fiction:non-fiction ratio
$fiction_ratio = round(100 * $totalRows_rsBooksFiction / $totalRows_rsBooks);
$non_fiction_ratio = 100 - $fiction_ratio;

//calculate ratings
function getStarClass($rating){
	if($rating > 4.6) echo "kfive";
	else if($rating > 4.1) echo "jfour-half"; 
	else if($rating > 3.6) echo "ifour"; 
	else if($rating > 3.1) echo "hthree-half"; 
	else if($rating > 2.6) echo "gthree"; 
	else if($rating > 2.1) echo "ftwo-half"; 
	else if($rating > 1.6) echo "etwo"; 
	else if($rating > 1.1) echo "done-half"; 
	else if($rating > 0.6) echo "cone"; 
	else if($rating > 0.1) echo "bzero-half"; 
	else echo "azero"; 
}
?>

<!DOCTYPE HTML>
<html xmlns:spry="http://ns.adobe.com/spry">
<head>
<?php require_once("_includes/headStandard.php") ?>
<title>Books I've read |<?php echo $row_rsUser['Name']; ?></title>
<script src="assets/js/SpryData.js" type="text/javascript"></script>
<script src="assets/js/SpryHTMLDataSet.js" type="text/javascript"></script>
<script type="text/javascript">
var ds1 = new Spry.Data.HTMLDataSet(null, "books");
ds1.setColumnType("Date_read", "date");
ds1.setColumnType("Rating", "html");
ds1.setColumnType("Fiction", "html");
</script>
</head>

<body>
<div class="wrapOut">

  <?php require_once("_includes/header.php") ?>
  <section id="quickStats" class="wrapIn">
    <h2>Quick facts</h2>
    <p>So far I've read <?php echo $totalRows_rsBooks ?> books.<br/>
      Fiction to non-fiction ratio is <?php echo $fiction_ratio . ":" . $non_fiction_ratio ?>. </p>
  </section>
  <section id="booksSection" class="wrapIn"> <a href="addEntry.php" class="addBookBtn" title="Click to add a book to the list">Add a new book</a>
    <h2>Books I've read</h2>
    <table id="books">
      <tr>
        <td width="20%" class="title" id="books">Title</td>
        <td width="15%">Author</td>
        <td width="7%">Date read</td>
        <td width="10%">Rating</td>
        <td width="5%">Fiction</td>
        <td>Comments</td>
        <td width="3%">Delete</td>
      </tr>
      <?php do { ?>
        <tr class="oddRow">
          <td width="250" id="books"><a href="updateEntry.php?bookid=<?php echo $row_rsBooks['ID']; ?>" title="Click to edit entry"><?php echo $row_rsBooks['Title']; ?></a></td>
          <td><?php echo $row_rsBooks['Author']; ?></td>
          <td><?php echo date('Y-m-d', strtotime($row_rsBooks['Date read'])); ?></td>
          <td><div class="<?php getStarClass($row_rsBooks['Rating']) ?>"><?php echo $row_rsBooks['Rating']; ?></div></td>
          <td><input type="checkbox" disabled name="fiction" <?php if ($row_rsBooks['fiction']==1) { ?>checked<?php }?>></td>
          <td><div><?php echo $row_rsBooks['Comments']; ?></div></td>
          <td><a onClick="askToBeSure('removeEntry.php?bookid=<?php echo $row_rsBooks['ID']; ?>')" href="removeEntry.php?bookid=<?php echo $row_rsBooks['ID']; ?>" title="Click to delete book entry">Delete</a></td>
        </tr>
        <?php } while ($row_rsBooks = mysql_fetch_assoc($rsBooks)); ?>
    </table>
    <div spry:region="ds1" class="spryRegion">
      <table id="booksTable" class="tableResults" summary="This is the complete list of books you've read.">
        <tr>
          <th width="25%" spry:sort="Title"><span class="header">Title</span></th>
          <th width="15%" spry:sort="Author"><span class="header">Author</span></th>
          <th width="10%" spry:sort="Date_read"><span class="header">Date</span></th>
          <th width="7%" spry:sort="Rating"><span class="header">Rating</span></th>
          <th width="3%" spry:sort="Fiction"><span class="header">Fiction</span></th>
          <th>Comments</th>
          <th width="5%">&nbsp;</th>
        </tr>
        <tr spry:repeat="ds1"  spry:odd="oddRow" spry:even="evenRow" spry:hover="hoverRow" spry:select="selectRow">
          <td width="25%" class="title">{Title}</td>
          <td width="15%" class="author">{Author}</td>
          <td width="10%" class="date">{Date_read}</td>
          <td width="7%" class="rating">{Rating}</td>
          <td width="3%" class="fiction">{Fiction}</td>
          <td class="comments">{Comments}</td>
          <td width="5%" class="delete">{Delete}</td>
        </tr>
      </table>
    </div>
  </section>
</div>
<script>
function askToBeSure(url){
	event.preventDefault();
	var r = confirm('Are you sure you want to delete this book?');
	
	if(r == true){
		location.href = url;
		// "http://" + document.location.host + document.location.pathname + url;
	}
}

</script>

</body>
</html>
<?php
mysql_free_result($rsBooks);

mysql_free_result($rsUser);
?>
