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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "Update book")) {
  $updateSQL = sprintf("UPDATE books SET Title=%s, Author=%s, `Date read`=%s, Rating=%s, Comments=%s WHERE ID=%s",
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['author'], "text"),
                       GetSQLValueString($_POST['date'], "date"),
                       GetSQLValueString($_POST['rating'], "double"),
                       GetSQLValueString($_POST['comments'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_Books_list, $Books_list);
  $Result1 = mysql_query($updateSQL, $Books_list) or die(mysql_error());

  $updateGoTo = "index.html";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsBook = "1";
if (isset($_GET['bookid'])) {
  $colname_rsBook = $_GET['bookid'];
}
mysql_select_db($database_Books_list, $Books_list);
$query_rsBook = sprintf("SELECT * FROM books WHERE ID = %s", GetSQLValueString($colname_rsBook, "int"));
$rsBook = mysql_query($query_rsBook, $Books_list) or die(mysql_error());
$row_rsBook = mysql_fetch_assoc($rsBook);
$totalRows_rsBook = mysql_num_rows($rsBook);

$colname_rsUser = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsUser = $_SESSION['MM_Username'];
}
mysql_select_db($database_Books_list, $Books_list);
$query_rsUser = sprintf("SELECT username, image, Name FROM users WHERE username = %s", GetSQLValueString($colname_rsUser, "text"));
$rsUser = mysql_query($query_rsUser, $Books_list) or die(mysql_error());
$row_rsUser = mysql_fetch_assoc($rsUser);
$totalRows_rsUser = mysql_num_rows($rsUser);
?>
<!DOCTYPE HTML>
<html>
<head>

<?php require_once("_includes/headStandard.php") ?>

<title>Books I've Read | Update a book</title>
<script src="assets/js/SpryValidationTextField.js" type="text/javascript"></script>
<link href="assets/css/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapOut">
<?php require_once("_includes/header.php") ?>
  <section id="addBookSection" class="wrapIn">
  <h2>Add a book</h2>

  <form action="<?php echo $editFormAction; ?>" method="POST" name="insertBook" target="_self">
    <input name="id" type="hidden" value="<?php echo $row_rsBook['ID']; ?>">
    <label for="title">Title: </label>
    <span id="sprytextfield1">
    <input name="title" type="text" autofocus required placeholder="Book Title" value="<?php echo $row_rsBook['Title']; ?>" maxlength="50">
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span><br/>
    <label for="author">Author: </label>
    <span id="sprytextfield2">
    <input name="author" type="text" required placeholder="Author" value="<?php echo $row_rsBook['Author']; ?>" maxlength="50">
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span><br/>
    <label for="date">Read date: </label>
    <input name="date" type="date" placeholder="Read date" value="<?php echo $row_rsBook['Date read']; ?>">
    <br/>
    <label for="rating">Rating: </label>
    <div class="hidden"><input name="rating" type="range" min="0" max="5" step="0.25" value="<?php echo $row_rsBook['Rating']; ?>" placeholder="rating">
    <output for="rating" onforminput="value = rating.valueAsNumber;"><?php echo $row_rsBook['Rating']; ?></output>
      </div>
    <br/>
    <label for="comments">Comments: </label>
    <textarea name="comments" cols="30" rows="5" placeholder="Comments"><?php echo $row_rsBook['Comments']; ?></textarea>
    <br/>
    <input type="submit" name="MM_update" value="Update book" class="submitBtn">
  </form>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"], maxChars:50});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"], maxChars:50});
</script>
</body>
</html>
<?php
mysql_free_result($rsUser);

mysql_free_result($rsBook);
?>