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
if (isset($_POST["price"])){
    include ("connMysql.php");
	$sql_query = "INSERT INTO meal(mealname,quality,price,name) VALUES (?,?,?,?)";
	$stmt = $db_link->prepare($sql_query);
	$stmt->bind_param("siis", $_POST["mealname"],$_POST["quality"],$_POST["price"],$_POST["name"]);
	$test = $stmt->execute();
	$stmt->close();
    $db_link->close();
    echo "<script>alert('新增成功');location.href='ordertest.php';</script>";
    }
    include ("connMysql.php");
    $sql_select = "SELECT * FROM shop WHERE shopid = ?";
    $stmt = $db_link->prepare($sql_select);
    $stmt -> bind_param("i", $_GET["id"]);
    $stmt -> execute();
    $stmt -> execute();
    $stmt -> bind_result($shopid,$shopname,$shopmeal,$shopaddress);
    $stmt -> fetch();
    // echo "<pre>";
    // print_r($_POST);
    // exit;
    //var_dump() 印出資料型別及數值
?>
    <script>
        function addOption(list, text, value){
            var index=list.options.length;
            list.options[index]=new Option(text, value);
            list.selectedIndex=index;
        }
            $(document).ready(function(){
            $("#thumbs a").click(function(){
            var img = $(this).find("img").attr("src");
            console.log(img);
            $("#gallery").find("img").attr("src",img);
            });
            });
    </script>
    <style>
        .container{
            width: 100%;
            display: table;
            text-align: center;
        }
        .container img{
            height: 500px;
            width: 400px;
            margin: 30px;
        }
        .box{
            display: table-cell;
            vertical-align: middle;
        }
        .box2{
            width: 1200px;
            margin: auto;
        }
        form .btn{
            margin-top: 50px;
           margin-left: 600px;
           margin-bottom: 50px;
        }
        .form-control-plaintext{
            font-size:20px;
            color:blue;
        }
        h3{
            margin-bottom:30px;
        }
        #thumbs a{
        width: 120px;     
        display: inline-block;
        }
        #thumbs img{
            width:100px;
            height:100px;
        }
    </style>
</head>

<body>
    <div class="container">
    <div id="gallery">
        <img src="uploads/<?php echo $shopname ;?>.jpg" alt="">
    </div>        
        <div id="thumbs">
        <a href="#"><img src="uploads/<?php echo $shopname ;?>.jpg" alt=""></a>
        <a href="#"><img src="mainu/08.jpg" alt=""></a>
        <a href="#"><img src="mainu/09.jpg" alt=""></a>
        <a href="#"><img src="mainu/10.jpg" alt=""></a>
        </div>
        <div class="box">
            <h2><?php echo $shopname;?></h2>
            <p><?php echo $shopaddress;?></p>
        </div>
    </div>
    <div class="box2">
    <h3>訂餐表單</h3>
        <form action="" method="post" name="formAdd" id="formAdd">
            <div class="form-group">
                <label for="exampleFormControlInput1">姓名:</label>
                <input type="text" readonly class="form-control-plaintext" id="name" name="name" value="<?php echo $_SESSION["name"];?>">
            </div>
            <div class="form-group">
                    <label for="exampleFormControlInput2">餐點:</label>
                    <!-- <input type="text" class="form-control" id="mealname" name="mealname" placeholder="控肉飯" required="required"> -->
                    <select class="form-control" id="mealname" name="mealname">
                    <option value="香腸飯">香腸飯</option>                
                    <option value="花枝排飯">花枝排飯</option>                
                    <option value="招牌飯">招牌飯</option>                
                    <option value="海陸飯">海陸飯</option>                
                    <option value="魠魚飯">魠魚飯</option>                
                    <option value="雞腿飯">雞腿飯</option>                
                </select>
                <input type="button" value="增加右列餐點" onclick="addOption(mealname, theText.value, theText.value)">
                新增的餐點: <input id=theText value="滷肉飯">
                </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">數量</label>
                <select class="form-control" id="quality" name="quality">
                    <option value="1">1</option>                
                    <option value="2">2</option>                
                    <option value="3">3</option>                
                    <option value="4">4</option>                
                    <option value="5">5</option>                
                    <option value="6">6</option>                
                </select>
            </div>
            <div class="form-group">
                    <label for="exampleFormControlInput3"id="money">金額</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="80" required="required">
                </div>
            <!-- <div class="form-group">
                <label for="exampleFormControlTextarea1">其他需求</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div> -->
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </div>
</body>

</html>