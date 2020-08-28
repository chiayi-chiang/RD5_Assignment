<?php 
session_start();
if (isset($_GET["logout"]))//read ? back things(index 28)
{
  $_SESSION["userName"] = $sUserName;
  unset($_SESSION["userName"]);
  //setcookie("userName ", "Guest", time() - 3600);//clien cookie,-60*60*24*7 after 7 days ago can't eat
	header("Location: index.php");//go back to homepage
	exit();
}

if (isset($_POST["btnHome"]))//read 表單
{
	header("Location: index.php");//go back to homepage
	exit();
}

if (isset($_POST["btnOK"]))//read 表單，去看$_POST裏頭有沒有一個較btnOK的
{
  //有
	$sUserName = $_POST["txtUserName"];//$sUserName(變數)<-["txtUserName"](帳號)，使用者寫入的帳號以陣列傳給sUN變數
	if (trim($sUserName) != "")//變數值不是空的時後
	{
    //不是
    
   // setcookie("userName", $sUserName);//請瀏覽器(userName)幫忙記住$sUserName的資料
    session_start();
    $_SESSION["userName"] = $sUserName;
    if (isset($_SESSION["lastPage"]))//read cookie，
      
		  header(sprintf("Location: %s", $_SESSION["lastPage"]));//%s(字串)<-$_SESSION["lastPage"]，
		else
		   header("Location: index.php");//go back to homepage
		exit();
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
            <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#00000">會員系統 - 登入</font></td>
        </tr>
        <tr>
          <input type="text" name="txtUserName" id="txtUserName" placeholder="UserName"/>
        </tr>
        <tr>
          <input type="password" name="txtPassword" id="txtPassword" placeholder="password"/>
        </tr>
        <tr>
          <button type="submit" name="btnOK" id="btnOK"><a>註冊</a></button><!--按鈕為btnOK-->
            <button type="reset" name="btnReset" id="btnReset"><a>重設</a></button> 
            <button type="submit" name="btnHome" id="btnHome"><a>回首頁</a></button> 
        </tr>
        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>
    </div>
  </div>
</body>
</html>
