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
?>

  <div class="container">
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/286x180?food/1" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
          <?php if (isset($_SESSION["member"])){echo '<a href="company.php" class="btn btn-primary">訂便當</a>';}?>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/286x180?food/2" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
          <?php if (isset($_SESSION["member"])){echo '<a href="company.php" class="btn btn-primary">訂便當</a>';}?>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/286x180?food/3" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
          <?php if (isset($_SESSION["member"])){echo '<a href="company.php" class="btn btn-primary">訂便當</a>';}?>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/286x180?food/4" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
          <?php if (isset($_SESSION["member"])){echo '<a href="company.php" class="btn btn-primary">訂便當</a>';}?>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/286x180?food/5" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
          <?php if (isset($_SESSION["member"])){echo '<a href="company.php" class="btn btn-primary">訂便當</a>';}?>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/286x180?food/6" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
          <?php if (isset($_SESSION["member"])){echo '<a href="company.php" class="btn btn-primary">訂便當</a>';}?>
      </div>
    </div>
  </div>