<?php 
if (isset($_POST["btnOK"]))//read 表單，去看$_POST裏頭有沒有一個較btnOK的
{
  //有
	$sUserNumber = $_POST["txtUserNumber"];
  $sPasswd = $_POST["txtPassword"];
  $sUserName =$_POST["txtUserName"];//$sUserName(變數)<-["txtUserName"](帳號)，使用者寫入的帳號以陣列傳給sUN變數
  $sql="SELECT * FROM `member`WHERE unumber	 = '$sUserNumber'";//從輸入資料去找尋sql資料
  require("database.php");//呼叫sql
  $result=mysqli_query($con, $sql) or die('MySQL query error');//把sql語法傳入
  $row = mysqli_fetch_array($result);
	if ($row["unumber"]==$sUserNumber && $row["uPasswd"]==$sPasswd && $row["uName"]==$sUserName)//輸入值雨sql資料相同時
	{
   // setcookie("userName", $sUserName);//請瀏覽器(userName)幫忙記住$sUserName的資料
    session_start();
    $_SESSION["txtUserName"] = $sUserName;
    $_SESSION["txtUserNumber"] = $sUserNumber;
    //echo ($sUserNumber);
    echo "<script type='text/javascript'> alert('登入成功');location.href='index.php';</script>";
	}else{
    echo "<script type='text/javascript'> alert('尚未成為會員');location.href='singup.php';</script>";
  }
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="modle.css" rel="stylesheet"/>
    <script src="modle.js"></script>
</head>
<body>
    <div class="login-page" >
    <div class="form">
      <form class="login-form" id="form1" name="form1" method="post" action="login.php">
        <tr>
            <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#00000">會員系統 - 登入<font></td>
        </tr>
        <tr>
          <input type="text" name="txtUserNumber" id="txtUserNumber"  required placeholder="UserNumber" />
        </tr>
        <tr>
          <input type="password" name="txtPassword" id="txtPassword"  required placeholder="password" />
        </tr>
        <tr>
          <input type="text" name="txtUserName" id="txtUserName"  required placeholder="UserName" />
        </tr>
        <tr>
          <button type="submit" name="btnOK" id="btnOK"><a>登入</a></button><!--按鈕為btnOK-->
            <button type="reset" name="btnReset" id="btnReset"><a>重設</a></button> 
            <a href="index.php">回首頁</a>
        </tr>
      </form>
    </div>
  </div>
</body>
</html>
