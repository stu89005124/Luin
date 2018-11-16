<?php
session_start();
// echo "<pre>";
// print_r($_SESSION);
// exit;
if (isset($_SESSION["member"])&&$_SESSION["member"] == 'admin'){
  include ("adminlayout.php");
}else if(isset($_SESSION["member"])){
  include ("layoutlogin.php");
}
else{
  include ("layout.php");
}
include ("connMysql.php"); 
$sql_query = "SELECT * FROM shop ORDER BY shopid";
$result = $db_link->query($sql_query);   
?>
  <?php
      while($row_result=$result->fetch_assoc()){ 
      $x=$row_result["shopid"];
      echo '<div class="container">';
      echo '<div class="card" style="width: 18rem;">';
      echo "<img class='card-img-top' src='https://source.unsplash.com/random/286x180?food/".$x."' alt=\"Card image cap\">";
      echo '<div class="card-body">';
      echo '<h5 class="card-title" align="center">'.$row_result["shopname"].'</h5>';
      echo '<p class="card-text" align="center">'.$row_result["shopaddress"].'</p>';
      if (isset($_SESSION["member"])){
      echo "<a href='company.php?id=".$row_result["shopid"]."' class='btn btn-primary'>訂便當</a>";
      }
      echo '</div></div></div>' ;
      }        
    ?>