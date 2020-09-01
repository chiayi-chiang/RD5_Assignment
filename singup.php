 <?php 

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
    //member insert into sql
    $sql = "INSERT INTO `member`(`unumber`, `uPasswd`, `uName`,`total`) VALUES ('$sUserNumber','$sPasswd','$sUserName','1000')";
    require("database.php");//呼叫sql
    $result=mysqli_query($con, $sql) or die('MySQL query error');//把sql語法傳入
    
    //get singup member uID
    $uID ="SELECT `uID`FROM `member` WHERE unumber ='$sUserNumber'";
    require("database.php");//呼叫sql
    $row=mysqli_fetch_assoc(mysqli_query($con, $uID));
    $uid =$row["uID"];
    

    $nowdate = date('Y-m-d H:i:s',mktime (date(H)+8, date(i), date(s), date(m), date(d), date(Y)));
    //account insert into 1000
    $inuID= "INSERT INTO `details`(`uID`, `Date`, `type`, `money`, `balance`) VALUES ('$uid','$nowdate','income','1000','1000')";
    require("database.php");
    mysqli_query($con, $inuID) or die('MySQL query error');

    session_start();
    $_SESSION["txtUserName"] = $sUserName;
    $_SESSION["txtUserNumber"] = $sUserNumber;
    echo "<script type='text/javascript'> alert('註冊成功');location.href='index.php';</script>";
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
          <input type="text" name="txtUserNumber" id="txtUserNumber" required placeholder="UserNumber"/>
        </tr>
        <tr>
          <input type="password" name="txtPassword" id="txtPassword" required placeholder="password" />
        </tr>
        <tr>
          <input type="text" name="txtUserName" id="txtUserName" required placeholder="UserName" />
        </tr>
        <tr>
          <button type="submit" name="btnOK" id="btnOK"><a>註冊</a></button><!--按鈕為btnOK-->
          <button type="reset" name="btnReset" id="btnReset"><a>重設</a></button> 
          <a href="index.php">回首頁</a>
        </tr>
      </form>
      
    </div>
  </div>
</body>
</html>
