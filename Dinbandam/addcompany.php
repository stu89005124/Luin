<?php
session_start();
if (isset($_SESSION["member"])&&$_SESSION["member"] == 'admin'){
    include ("adminlayout.php");
  }else if(isset($_SESSION["member"])){
    include ("layoutlogin.php");
  }
  else{
    include ("layout.php");
    header("Location:index.php");
  }
// print_r($_SERVER);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {   
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    echo $imageFileType;
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // 確認照片是否存在
    if (file_exists($target_file)) {
        echo "新增失敗圖片已經存在";
        $uploadOk = 0;
    }
    // 檔案大小控管
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // 檔案格式檢查
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // 確定uploadOk的值
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // 上傳檔案
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            include ("connMysql.php");
            $sql_query = "INSERT INTO shop(shopname,shopaddress) VALUES (?,?)";
            $stmt=$db_link->prepare($sql_query);
            $stmt -> bind_param("ss", $_POST["shopname"],$_POST["shopaddress"]);
            $stmt -> execute();
            $stmt -> close();
            $db_link -> close();
            echo "<script>alert('新增成功');location.href='index.php';</script>";
        } else {
            echo "<script>alert('新增失敗');location.href='index.php';</script>";
        }
    }
}
    
  ?>
  <title>新增店家</title>
  <style type="text/css">
	html, body {
		min-height: 100%;
	}
    body {
        background: #ff5e63;
        font-family: "Varela Round", sans-serif;
		background: linear-gradient(#ff9968, #ff5e63)  no-repeat;
    }
	.form-control {
		border-color: #d7d7d7;
		box-shadow: none;
	}
	.form-control:focus, .btn:focus {
		border-color: #a177ff;
		box-shadow: 0 0 8px #c2a8ff;
	}
    .contact-form {
		width: 500px;   
        margin: 0 auto;
        padding: 40px 0;
    }
    .contact-form form {
        background: #fff;
        padding: 40px;
        border-radius: 6px;
    }
    .contact-form h1 {
		text-align: center;
		font-size: 50px;
        margin: 0 0 15px;
    }
	.contact-form .form-group {
		margin-bottom: 20px;
	}
    .contact-form .form-control, .contact-form .btn  {        
        border-radius: 2px;
		min-height: 40px;
		transition: all 0.5s;
		outline: none;
    }
    .contact-form .btn {
        background: #a177ff;
		font-size: 16px;
		min-height: 50px;
		border: none;
    }
    .contact-form .btn:hover, .contact-form .btn:focus {
        background: #8048ff;
		outline: none;
    }
	.contact-form .btn i {
		margin-right: 5px;
	}
    .contact-form label {
        color: #bbb;
		font-weight: normal;
    }
    .contact-form textarea {
        resize: vertical;
    }
    .hint-text {
        font-size: 15px;
		text-align: center;
        padding-bottom: 25px;
        opacity: 0.8;
    }
</style>
</head>
<body>
<div class="contact-form">
	<form action="" method="post" enctype="multipart/form-data">
        <h1>新增店家</h1>
		<div class="form-group">
			<label for="inputName">店名</label>
			<input type="text" class="form-control" id="shopname" name="shopname" required>
		</div>
		<div class="form-group">
			<label for="inputEmail">地址</label>
			<input type="text" class="form-control" id="shopaddress" name="shopaddress" required>
		</div>
		<div class="form-group">
			<label for="inputMessage">菜單上傳</label><br>
			<input type="file" id="fileToUpload" name="fileToUpload">
        </div>
		<button type="submit" name="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Send</button>
	</form>
</div>
</body>
</html>                            