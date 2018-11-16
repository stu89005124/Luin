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
$sql_query = "UPDATE member SET fUserId=?, fPwd=? ,fName=? WHERE fId=?";
$stmt=$db_link->prepare($sql_query);
$stmt -> bind_param("sssi", $_POST["fUserId"],$_POST["fPwd"],$_POST["fName"],$_POST["fId"]);
$stmt -> execute();
$stmt -> close();
$db_link -> close();
echo "<script>alert('修改成功');location.href='member.php';</script>";
}
$sql_select = "SELECT * FROM member WHERE fId = ?";
$stmt = $db_link->prepare($sql_select);
$stmt -> bind_param("i", $_GET["id"]);
$stmt -> execute();
$stmt -> execute();
$stmt -> bind_result($fId,$fUserId,$fPwd,$fName);
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
            <td><input type="text" readonly name="fName" id="fName" value="<?php echo $fName;?>"></td>
            </td>
        </tr>
        <tr>
            <td>帳號
            <td><input type="text" readonly name="fUserId" id="fUserId" value="<?php echo $fUserId;?>"></td>
            </td>
        </tr>
        <tr>
            <td>密碼
            <td><input type="password" name="fPwd" id="fPwd" value="<?php echo $fPwd;?>"></td>
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