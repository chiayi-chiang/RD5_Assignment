<?php 
    require("database.php");
    $sqlStatement ="
    select m.uID,m.unumber,m.uPasswd,m.uName,a.acID,a.total,d.Date,d.type,d.money,d.total
    FROM member m,details d,account a
    where m.uID=a.uID
    AND a.acID=d.acID";
    $result = mysqli_query($con, $sqlStatement);
    session_start();
    
    if (isset($_SESSION["txtUserName"])){//檢查是否有資料
      $sUserName = $_SESSION["txtUserName"];//有
    }else {
      $sUserName = "Guest";//沒有
    }

    session_start();
    if (isset($_GET["logout"]))//read ? back things(index 28)
    {
      $_SESSION["txtUserName"] = $sUserName;
      unset($_SESSION["txtUserName"]);
      //setcookie("userName ", "Guest", time() - 3600);//clien cookie,-60*60*24*7 after 7 days ago can't eat
      echo "<script type='text/javascript'>alert('登出成功');location.href='index.php';</script>";//go back to homepage
      exit();
    }
    
    
    

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
          <td align="center" valign="baseline"><a href="index.php?logout=1">登出</a>|<a href="secret.php">會員專用頁</a></td><!--no-->
        <?php }?>
        </button>
        <tr>
          <td align="center" bgcolor="#CCCCCC" ><?="Welcome!". $sUserName ?> </td><!--登入成功後會出現使用者帳號-->
        </tr>
      </form>
    </div>
  </div>
</body>
</html>
