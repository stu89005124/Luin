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
if(isset($_POST["action"])&&($_POST["action"]=="update")){
$sql_query = "UPDATE meal SET mealname=?, quality=? ,price=? WHERE fId=?";
$stmt=$db_link->prepare($sql_query);
$stmt -> bind_param("sssi", $_POST["mealname"],$_POST["quality"],$_POST["price"],$_POST["fId"]);
$stmt -> execute();
$stmt -> close();
$db_link -> close();
echo "<script>alert('修改成功');location.href='ordertest.php';</script>";
}
$sql_select = "SELECT * FROM meal WHERE fId = ?";
$stmt = $db_link->prepare($sql_select);
$stmt -> bind_param("i", $_GET["id"]);
$stmt -> execute();
$stmt -> execute();
$stmt -> bind_result($fId,$mealname,$quality,$price,$name);
$stmt -> fetch();
?>
<h1 align="center">管理帳號系統</h1>
<p align="center"><a href="index.php">回首頁</a></p>
<form action="" method="POST" name="formfix" id="formfix">
    <table border="1" align="center" cellpadding="4">
        <tr>
            <th>欄位</th>
            <th>資料</th>
        </tr>
        <tr>
            <td>姓名
            <td><input type="text" readonly name="fName" id="fName" value="<?php echo $name;?>"></td>
            </td>
        </tr>
        <tr>
            <td>餐點
            <td><input type="text" name="mealname" id="mealname" value="<?php echo $mealname;?>"></td>
            </td>
        </tr>
        <tr>
            <td>數量
            <td><input type="text" name="quality" id="quality" value="<?php echo $quality;?>"></td>
            </td>
        </tr>
        <tr>
            <td>價錢(單價)
            <td><input type="text" name="price" id="price" value="<?php echo $price;?>"></td>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input name="fId" type="hidden" value="<?php echo $fId;?>">
                <input name="action" type="hidden" value="update">
                <input type="submit" name="button" value="更新資料">
                <input type="reset" name="reset" value="重新填寫">
            </td>
        </tr>
    </table>
</form>
<?php
    $stmt -> close();
    $db_link -> close();
?>