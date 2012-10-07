<?php require_once('_includes/logoutUser.php'); ?>

<header class="topHeader">
  <h1><a href="index.php">Books I've read</a></h1>
  <h3>This below is the list of books read by <?php echo $row_rsUser['Name']; ?></h3>
  <section id="userAccount">
    <p class="welcomeName">Welcome <?php echo $row_rsUser['Name']; ?></p>
    <img src="<?php echo $row_rsUser['image']; ?>" alt="<?php echo $row_rsUser['Name']; ?>"/>
    <a href="<?php echo $logoutAction ?>" class="logout" title="Click to logout">Log out</a>
   </section>
</header>
