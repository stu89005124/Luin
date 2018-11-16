<?php
session_start();
if (isset($_SESSION['member'])){
    header("Location:index.php");
}else{
  include ("layout.php");
}
if (isset($_POST["user"]) && isset($_POST["password"])){
    require_once("connMysql.php");
    $query_RecLogin = "SELECT fUserId,fPwd,fName FROM member WHERE fuserId=?";
    $stmt=$db_link->prepare($query_RecLogin);
    $stmt->bind_param("s", $_POST["user"]);
    $stmt->execute();
    $stmt->bind_result($username,$pwd,$name);
    $stmt->fetch();
    $stmt->close();
    if(($username==$_POST["user"])&&($pwd==$_POST["password"])){
        $_SESSION["member"]=$username;
        $_SESSION["name"]=$name;
        header("Location:index.php");
    }else{
        echo "<h4>帳號或密碼錯誤!</h2>";
        // echo "<script>alert('帳號或密碼錯誤');location.href='login.php';</script>";
    }
    // echo "<pre>";
    // print_r($_POST);
    // exit;
}
?>
<style type="text/css">
    body{
        background: #19aa8d;
    }
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 20px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;     
    }
    h4{
		text-align:center;
		color:red;
		margin-top:50px;
	}
    p a{
        color:white;
    }
    #submit{
        background: #19aa8d;
        border-color:#FFF;
    }
</style>
<script>
    $(document).ready(function(){
            $("input").click(function(){
            $("h4").hide();
            });
            });
</script>
</head>
<body>
<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">登入</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="帳號" id="user" name="user" value="<?php if (isset($_POST["password"])){echo $_POST["user"];} ?>" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="密碼" id="password" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" id="submit">Log in</button>
        </div>         
    </form>
    <p class="text-center"><a href="register.php">註冊帳號</a></p>
    <p class="text-center"><a href="index.php">回首頁</a></p>
</div>
</body>
</html>  