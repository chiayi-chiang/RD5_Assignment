<?php 

    session_start();
    if (isset($_SESSION["userName"]))//檢查是否有資料
    
    $sUserName = $_SESSION["userName"];//有
    else 
    $sUserName = "Guest";//沒有

?>
<!DOCTYPE html >
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
          <td align="center" bgcolor="#CCCCCC"><font color="#00000">會員系統 - 首頁</font></td>
        </tr>
        <button>
        
        <?php if ($sUserName == "Guest"){?>
          <td align="center" valign="baseline"><a href="login.php">登入</a>｜<a href="singup.php">註冊</a></td><!--yes-->
        <?php }else{?>
          <td align="center" valign="baseline"><a href="login.php?logout=1">登出</a>|<a href="secret.php">會員專用頁</a></td><!--no-->
        <?php }?>
        </button>
        <tr>
          <td align="center" bgcolor="#CCCCCC"><?php echo "Welcome! " . $sUserName ?> </td><!--登入成功後會出現使用者帳號-->
        </tr>
      </form>
    </div>
  </div>
</body>
</html>
