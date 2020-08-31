<?php 
//just in case non-members enter
session_start();
if (isset($_SESSION["txtUserName" ]))//檢查是否沒有一個txtUserName的陣列資料
{
    $sUserName = $_SESSION["txtUserName"];//有
    $sUserNumber=$_SESSION["txtUserNumber"];
}
 
 
if (isset($_POST["btnHome"]))//read 表單
{
	header("Location: index.php");//go back to homepage
	exit();
}

//將sql資料顯示在畫面上
require("database.php"); 
$sqlStatement ="
select m.uID,m.unumber,m.uPasswd,m.uName,a.acID,a.total,d.Date,d.type,d.money,d.balance
FROM member m,details d,account a
where m.uID=a.uID
AND a.acID=d.acID
AND unumber = '$sUserNumber'"
;
$result=mysqli_query($con, $sqlStatement) or die('MySQL query error');//把sql語法傳入
$row = mysqli_fetch_assoc($result);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="modle.css" rel="stylesheet"/>
    <script src="modle.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 1000px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    </style>
</head>
<body>
    <div class="member-page">
    <div class="form"> 
    <form class="member-form">
        <div class="container">
        <h2 class="float-left"><?= $sUserName."會員專用"?>&nbsp;&nbsp;<font><?= "$"." ".$row["total"] ?></font> </h2>
        <a href="index.php" class="btn btn-outline-info btn-md float-right">回首頁</a>
        <a href="addtransaction.php" class="btn btn-outline-info btn-md float-right">新增一筆帳單</a>
        
        <table class="table table-striped">
        <thead>
            <tr>
                <th>日期</th>
                <th>Reposit／Deposit</th>
                <th>money</th>
                <th>blance</th>
            </tr>
        </thead>
        <tbody>
            <!-- <?php //while ( $row = mysqli_fetch_assoc($result) ) { ?> -->
            <tr>
                <td><?= $row["Date"] ?></td>
                <td><?= $row["type"] ?></td>
                <td><?= $row["money"] ?></td>
                <td><?= $row["balance"] ?></td>
            </tr>
            <?php //} ?>
        </tbody>
        </table>
        </div>
    </form>
    </div>
  </div> 
</body>
</html>
