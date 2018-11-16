<?php
if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
  unset($_SESSION["member"]);
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <title>訂便當系統</title>
</head>
<style>
  nav .btn{
    margin-left: 5px;
  }
  .card{
    margin-left: 50px;
    margin-top: 50px;
    float: left;
  }
  .card a{
    margin-left: 85px;
  }
</style>
<html>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">訂便當系統</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">首頁 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ordertest.php">訂單管理</a>
            </li>          
          </ul>
          <h4><?php echo $_SESSION["name"];?>,您好</h4>        
          <a class="btn btn-outline-success my-2 my-sm-0" href="addcompany.php"><i class="fas fa-plus">新增店家</i></a>
          <a class="btn btn-outline-success my-2 my-sm-0" href="index.php?logout=true" onclick="return confirm('確定要登出嗎？')"><i class="fas fa-sign-out-alt">登出</i></a>
        </div>
      </nav>
    
</body>
</html>