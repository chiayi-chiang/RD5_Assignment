<?php 
//just in case non-members enter
session_start();
if (!isset($_SESSION["txtUserName"]))//檢查是否沒有一個txtUserName的陣列資料
{
	header("Location: login.php");//to login page
	exit();
}else{
    //$row = mysqli_fetch_assoc($result);
    $sUserName = $_SESSION["txtUserName"];//有
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
        <h2 class="float-left"><?= $sUserName."會員專用"?>&nbsp;<a><?= "$"." ".$row["total"] ?></a> </h2>
        <a href="index.php" class="btn btn-outline-info btn-md float-right">回首頁</a>
        <a href="addEmployee.php" class="btn btn-outline-info btn-md float-right">新增一筆帳單</a>
        
        <table class="table table-striped">
        <thead>
            <tr>
                <th>日期</th>
                <th>Reposit／Deposit</th>
                <th>money</th>
                <th>blance</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php while ( $row = mysqli_fetch_assoc($result) ) { ?>
            <tr>
                <td><?= $row["firstName"] ?></td>
                <td><?= $row["lastName"] ?></td>
                <td><?= $row["cityName"] ?></td>
                <td>
                    <span class="float-right">
                        <a href="./editForm.php?id=<?= $row["employeeId"] ?>" class="btn btn-outline-success btn-sm">Edit</a>
                        | 
                        <a href="./deleteEmployee.php?id=<?= $row["employeeId"] ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </span>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
        </div>
        
        
    </form>
    </div>
  </div> 
</body>
</html>
