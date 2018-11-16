<?php
// echo "<pre>";
// print_r($_POST);
// exit;

	if (isset($_POST["fUserId"])) {
		include ("connMysql.php");
		$query_FindUser="SELECT fUserId from member WHERE fUserId='{$_POST["fUserId"]}'";
		$FindUser=$db_link->query($query_FindUser);
		if($FindUser->num_rows>0){
			echo "<h4>此帳號已經註冊過</h4>";
		} 
		else if ($_POST["fPwd"]==$_POST["fPwd2"]) {
			$sql_query = "INSERT INTO member(fUserId,fPwd,fName) VALUES (?,?,?)";
			$stmt=$db_link->prepare($sql_query);
			$stmt -> bind_param("sss", $_POST["fUserId"],$_POST["fPwd"],$_POST["fName"]);
			$stmt -> execute();
			$stmt -> close();
			$db_link -> close();
			echo "<script>alert('註冊成功');location.href='login.php';</script>";
		} else {			
			echo "<h4>兩段密碼不相同!</h4>";
		}
	}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Sign up Form with Icons</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	body {
		color: #fff;
		background: #19aa8d;
		font-family: 'Roboto', sans-serif;
	}
	.form-control, .form-control:focus, .input-group-addon {
		border-color: #e1e1e1;
	}
    .form-control, .btn {        
        border-radius: 20px;
    }
	.signup-form {
		width: 390px;
		margin: 0 auto;
		padding: 30px 0;
	}
    .signup-form form {
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form h2 {
		color: #333;
		font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }
	.signup-form .form-group {
		margin-bottom: 20px;
	}
	.signup-form label {
		font-weight: normal;
		font-size: 13px;
	}
	.signup-form .form-control {
		min-height: 38px;
		box-shadow: none !important;
	}	
	.signup-form .input-group-addon {
		max-width: 42px;
		text-align: center;
	}
	.signup-form input[type="checkbox"] {
		margin-top: 2px;
	}   
    .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;
		background: #19aa8d;
		border: none;
		min-width: 140px;
        margin-left: 100px;
    }
	.signup-form .btn:hover, .signup-form .btn:focus {
		background: #179b81;
        outline: none;
	}
	.signup-form a {
		color: #fff;	
		text-decoration: underline;
	}
	.signup-form a:hover {
		text-decoration: none;
	}
	.signup-form form a {
		color: #19aa8d;
		text-decoration: none;
	}	
	.signup-form form a:hover {
		text-decoration: underline;
	}
	.signup-form .fa {
		font-size: 21px;
	}
	.signup-form .fa-paper-plane {
		font-size: 18px;
	}
	.signup-form .fa-check {
		color: #fff;
		left: 17px;
		top: 18px;
		font-size: 7px;
		position: absolute;
	}
	h4{
		text-align:center;
		color:red;
		margin-top:50px;
	}
</style>
</head>
<body>
<div class="signup-form">
    <form action="" method="post" name="formAdd" id="formAdd">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" id="fUserId" name="fUserId" placeholder="帳號" value="<?php if (isset($_POST["fPwd"])){echo $_POST["fUserId"];} ?>" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input type="text" class="form-control" id="fName" name="fName" value="<?php if (isset($_POST["fPwd"])){echo $_POST["fName"];} ?>" placeholder="姓名" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" class="form-control" id="fPwd" name="fPwd" placeholder="密碼" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-lock"></i>
					<i class="fa fa-check"></i>
				</span>
				<input type="password" class="form-control" id="fPwd2" name="fPwd2" placeholder="確認密碼" required="required">
			</div>
        </div>
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required">我確認以上資料正確無誤</label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
    </form>
    <div class="text-center">已經有帳號了?<a href="login.php">登入</a></div>
    <div class="text-center"><a href="index.php">回首頁</a></div>
</div>
</body>
</html>  