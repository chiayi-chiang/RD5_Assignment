<?php 
session_start();
if (!isset($_SESSION["userName"]))//檢查$_COOKIE是否沒有一個userName的陣列資料
{
  //沒有
  $_SESSION["lastPage"] = "secret.php";
	setcookie("lastPage", "secret.php");//請瀏覽器(userName)幫忙記住$sUserName的資料
	header("Location: login.php");//回首頁
	exit();
	
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
    <div class="login-page">
    <div class="form">
    <form class="login-form">
        <tr>
            <td align="center" bgcolor="#CCCCCC"><font color="#00000">會員系統 － 會員專用</font></td>
        </tr>
        <br>
        <tr>
            <td align="center" valign="baseline">This page for member only.</td>
        </tr>
        <button><a href="index.php">回首頁</a></button>
        
    </form>
    </div>
  </div>
</body>
</html>
