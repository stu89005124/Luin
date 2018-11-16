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
    
    include ("connMysql.php");
    $sql_query = "SELECT * FROM member ORDER BY fId";
    $result = $db_link->query($sql_query);
    //totalrecords = 總筆數
    $total_records = $result->num_rows;
    if(isset($_GET["id"])){
        $sql_query2 = "DELETE FROM member where fId=?";
        $stmt = $db_link->prepare($sql_query2);
        $stmt->bind_param("i",$_GET["id"]);
        $stmt->execute();
        $db_link ->close();
        header("Location:member.php");
    }
?>
    <title>帳號管理系統</title>
    <style>
        body{
            background: #F5F7FA;
        }
        h1{
            text-align: center;
        }
        p{
            text-align: center;
        }
        table{
           width: 500px;
           text-align: center;
           margin: auto;
        }
        
    </style>    
</head>
<body>
    <h1>管理帳號系統</h1>
    <p>目前帳號筆數:<?php echo $total_records;?></p>
    <p><a href="index.php">回首頁</a></p>
    <table border="1">
        <tr>
            <th>帳號</th>
            <th>姓名</th>
            <th>功能</th>
        </tr>
    <?php
        while($row_result=$result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row_result["fUserId"]."</td>";
            echo "<td>".$row_result["fName"]."</td>";
            echo "<td><a href='update.php?id=".$row_result["fId"]."'>修改</a>";
            echo "<a href='member.php?id=".$row_result["fId"]."' onclick=\"return confirm('確定要刪除此帳號？')\">刪除</a></td>";
        }
    ?>
    </table>
</body>
</html>