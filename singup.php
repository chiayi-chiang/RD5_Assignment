 <?php 



// session_start();
// if (isset($_GET["logout"]))//read ? back things(index 28)
// {
//   $_SESSION["userName"] = $sUserName;
//   unset($_SESSION["userName"]);
//   //setcookie("userName ", "Guest", time() - 3600);//clien cookie,-60*60*24*7 after 7 days ago can't eat
// 	header("Location: index.php");//go back to homepage
// 	exit();
// }

if (isset($_POST["btnHome"]))//read 表單
{
	header("Location: index.php");//go back to homepage
	exit();
}
 
  
  //$sUserName(變數)<-["txtUserName"](帳號)，使用者寫入的帳號以陣列傳給sUN變數
if (isset($_POST["btnOK"]))//read 表單，去看$_POST裏頭有沒有一個較btnOK的
{
  $sUserNumber = $_POST["txtUserNumber"];//$sUserName(變數)<-["txtUserName"](帳號)，使用者寫入的帳號以陣列傳給sUN變數
  $sPasswd = $_POST["txtPassword"];
  $sUserName =$_POST["txtUserName"];
  $sql="SELECT * FROM `member`WHERE unumber	 = '$sUserNumber' ";//從輸入資料去找尋sql資料
  require("database.php");//呼叫sql
  $result=mysqli_query($con, $sql) or die('MySQL query error');//把sql語法傳入
  $row = mysqli_fetch_array($result);
  if ($row!= "")//變數值不是空的時後
	{
    echo "<script type='text/javascript'> alert('已經辦過帳號囉');location.href='login.php';</script>";
    
  }else{
    $sql = "INSERT INTO `member`(`unumber`, `uPasswd`, `uName`) VALUES ('$sUserNumber','$sPasswd','$sUserName')";
    require("database.php");//呼叫sql
    $result=mysqli_query($con, $sql) or die('MySQL query error');//把sql語法傳入
    $row = mysqli_fetch_assoc($result);
    $row =["unumber"];
    echo "<script type='text/javascript'> alert('註冊成功');location.href='login.php';</script>";
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
    <div class="singup-page" >
    <div class="form">
      <form class="singup-form" id="form2" name="form2" method="post" action="singup.php">
        <tr>
            <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#00000">會員系統 - 註冊</font></td>
        </tr>
        <tr>
          <input type="text" name="txtUserNumber" id="txtUserNumber" placeholder="UserNumber"/>
        </tr>
        <tr>
          <input type="password" name="txtPassword" id="txtPassword" placeholder="password" />
        </tr>
        <tr>
          <input type="text" name="txtUserName" id="txtUserName" placeholder="UserName" />
        </tr>
        <tr>
          <button type="submit" name="btnOK" id="btnOK"><a>註冊</a></button><!--按鈕為btnOK-->
            <button type="reset" name="btnReset" id="btnReset"><a>重設</a></button> 
            <button type="submit" name="btnHome" id="btnHome"><a>回首頁</a></button> 
        </tr>
      </form>
    </div>
  </div>
</body>
</html>
