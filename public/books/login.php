<?php require_once('Connections/Books_list.php'); ?>
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
$query_rsBooksFavorite = "SELECT Title, Author, Rating FROM books WHERE Rating>3.5 ORDER BY `Date read` DESC LIMIT 7";
$rsBooksFavorite = mysql_query($query_rsBooksFavorite, $Books_list) or die(mysql_error());
$row_rsBooksFavorite = mysql_fetch_assoc($rsBooksFavorite);
$totalRows_rsBooksFavorite = mysql_num_rows($rsBooksFavorite);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_Books_list, $Books_list);
  
  $LoginRS__query=sprintf("SELECT username, password FROM users WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $Books_list) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}


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
<html>
<head>
<?php require_once('_includes/headStandard.php'); ?>
<title>Book's I've read | Login</title>
<script src="assets/js/SpryValidationTextField.js" type="text/javascript"></script>
<link href="assets/css/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="wrapOut">
<header class="topHeader">
  <h1><a href="index.php">Books I've read</a></h1>
  <h3>Please login to access your account.</h3>
  <section id="userAccount">
    <p class="welcomeName">Welcome stranger</p>
    <img src="assets/images/no-image.gif" width="100" height="100" alt="Stranger, log in!"> </section>
</header>
<div class="wrapIn sectionLike">
<section id="loginSection">
  <form action="<?php echo $loginFormAction; ?>" method="POST" name="login">
    <fieldset>
      <legend>Login</legend>
      <label for="username">Username</label>
      <span id="sprytextfield1">
      <input type="text" name="username" id="username" required autofocus>
      </span><br/>
      <label for="password">Password</label>
      <span id="sprytextfield2">
      <input type="password" name="password" id="password" required>
     </span><br/>
      <input name="login" type="submit" value="Login" class="loginBtn">
    </fieldset>
  </form>
 
</section>
<section id="favorite">
<h2>Favorite books by Pedro Kostelec</h2>
 <table border="0" class="tableResults">
    <tr>
      <th width="50%">Title</th>
      <th>Author</th>
      <th>Rating</th>
    </tr>
    <?php do { ?>
      <tr>
        <td width="50%" class="title"><?php echo $row_rsBooksFavorite['Title']; ?></td>
        <td class="author"><?php echo $row_rsBooksFavorite['Author']; ?></td>
        <td class="rating"><div class="<?php getStarClass($row_rsBooksFavorite['Rating']) ?>"><?php echo $row_rsBooksFavorite['Rating']; ?></div></td>
      </tr>
      <?php } while ($row_rsBooksFavorite = mysql_fetch_assoc($rsBooksFavorite)); ?>
  </table>
</section>
</div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
</script>
<script type="text/javascript">
 var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19545605-1']);
  _gaq.push(['_setDomainName', '.pedro.si']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script> 
</body>
</html>
<?php
mysql_free_result($rsBooksFavorite);
?>
