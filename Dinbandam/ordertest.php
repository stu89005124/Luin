<?php
    session_start();
    if (isset($_SESSION["member"])&&$_SESSION["member"] == 'admin'){
        include ("adminlayout.php");
      }else if(isset($_SESSION["member"])){
        include ("layoutlogin.php");
      }
      else{
        include ("layout.php");
      }

    include ("connMysql.php");
    $sql_query = "SELECT * FROM meal ORDER BY fId";
    $result = $db_link->query($sql_query);
    //totalrecords = 總筆數
    $total_records = $result->num_rows;
    if(isset($_GET["id"])){
        $sql_query2 = "DELETE FROM meal where fId=?";
        $stmt = $db_link->prepare($sql_query2);
        $stmt->bind_param("i",$_GET["id"]);
        $stmt->execute();
        $db_link ->close();
        header("Location: ordertest.php");
    }
?>
<style type="text/css">
    body {
        color: #404E67;
        background: #F5F7FA;
		font-family: 'Open Sans', sans-serif;
	}
	.table-wrapper {
		width: 900px;
		margin: 30px auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
		cursor: pointer;
        display: inline-block;
        margin: 0 5px;
		min-width: 24px;
    }    
	table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table td a.add i {
        font-size: 24px;
    	margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 16px;
        line-height: 16px;
        box-shadow: none;
        border-radius: 2px;
    }
	table.table .form-control.error {
		border-color: #f50000;
	}
    h5{
        margin-left:700px;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>訂單明細</b></h2></div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>姓名</th>
                        <th>餐點</th>
                        <th>數量</th>
                        <th>價錢</th>
                    <?php if (isset($_SESSION["member"])){
                        echo '<th>刪除/修改</th>';
                    }?>
                    </tr>
                </thead>
                <tbody>
                <?php
                $namesearch = $_SESSION["name"];
                $sql_query = "SELECT * FROM meal ORDER BY fId";
                $result = $db_link->query($sql_query);
                $sumprice = 0;
                $total = 0;
                $total_quality = 0;
                $admin = "admin";
                while($row_result=$result->fetch_assoc()){
                $sumprice = $row_result["price"]*$row_result["quality"];
                echo "<tr>";
                echo "<td>".$row_result["name"]."</td>";
                echo "<td>".$row_result["mealname"]."</td>";
                echo "<td>".$row_result["quality"]."</td>";
                echo "<td>".$sumprice."</td>";
                if (isset($_SESSION["member"])&&$_SESSION["member"]==$admin){
                    echo "<td align='center'><a href='orderupdate.php?id=".$row_result["fId"]."'>修改</a>";
                    echo "<a href='ordertest.php?id=".$row_result["fId"]."' onclick=\"return confirm('確定要刪除此筆訂單嗎？')\">刪除</a></td>";
                }
                else if (isset($_SESSION["member"])&&$_SESSION["name"] == $row_result["name"]){
                echo "<td align='center'><a href='orderupdate.php?id=".$row_result["fId"]."'>修改</a>";
                echo "<a href='ordertest.php?id=".$row_result["fId"]."' onclick=\"return confirm('確定要刪除此筆訂單嗎？')\">刪除</a></td>";
                }else{
                    echo "<td align='center'>X</td>";
                    }              
                $total = $total + $sumprice;
                $total_quality =$total_quality + $row_result["quality"];
                }         
                ?>
                </tbody>
            </table> 
            <h5>訂餐人數:&nbsp;<?php echo $total_records;?>人</h5>
            <h5>餐點數量:&nbsp;<?php echo $total_quality;?>份</h5>
            <h5>金額總計:&nbsp;<?php echo $total;?>元</h5> 
        </div>
    </div>  
    
</body>
</html>                            