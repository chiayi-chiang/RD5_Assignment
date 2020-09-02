
<?php
session_start();
$sUserNumber=$_SESSION["txtUserNumber"];//get now member's uuserNumber
//echo $sUserNumber;
//to sql get now member total
$total = "select *
FROM member m,details d
where m.uID=d.uID
AND unumber = '$sUserNumber'";
require("database.php");
$sqltotal =mysqli_fetch_assoc(mysqli_query($con, $total));
//var_dump($sqltotal);
$Usertotal=$sqltotal["total"];//total
$exmoney = $_POST["money"];//to import expense money
//if member expense to overstep the limit，the expense upper bound equal total
if($exmoney >= $Usertotal) {
  $_POST["money"]=$sqltotal["total"]; 
  $exmoney = $_POST["money"];
}
$balance=$Usertotal-$exmoney;

$id = $sqltotal["uID"];



 


if (isset($_POST["okButton"])) {
    
    global $id;//get 24-> $id to find now member in sql
    //all for import frame to take out
    $nowdate = $_POST["nowdate"];
    $type = $_POST["typeId"];
    $money = $_POST["money"];
    $balance = $_POST["balance"];
    //echo $type;
    //insert into to details sql
    $details = 
        "insert into details (uID,date,type, money,balance )
         values ('$id','$nowdate','$type' ,'$money', '$balance')";
    //var_dump($sql);
    mysqli_query($con, $details);
    //update to member->total sql
    $total="UPDATE `member` SET `total` = '$balance' WHERE `member`.`uID` = '$id'";
    //var_dump($sql1);
    mysqli_query($con, $total);

    header("location: secret.php");//go bake to secret screen
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
<div class="form"> 
<form method="post" action="expense.php">
  <div class="form-group row">
    <label for="nowdate" class="col-4 col-form-label">date:</label> 
    <div class="col-8">
        <input type="text" id="nowdate" name="nowdate" class="form-control" disabled="disabled" value = "<?php echo date('Y-m-d H:i:s',mktime (date(H)+8, date(i), date(s), date(m), date(d), date(Y)))?>"/>       
    </div>
  </div>
  <div class="form-group row">
  <label for="nowdate" class="col-4 col-form-label">type:</label> 
    <div class="col-8">
        <input  type="text" id="typeId" name="typeId"  class="form-control" disabled="disabled" value="expense"> 
    </div>
  </div> 
  <div class="form-group row">
    <label for="money" class="col-4 col-form-label">金額:</label> 
    <div class="col-8">
        <div class = "demo">
            <input id="money" name="money" type="text" class="form-control"
             autofocus 
             onchange="this.form.submit()" value ="<?=(isset($_POST['money']))?$_POST['money']:""?>">
             <!--autofocus->鎖定輸入框，
             onchange="this.form.submit()"->監視輸入框資料是否有變更，亦有變更立即送出所有表單
             如果$_POST['money']有值，則顯示，沒有則空-->
        </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="balance" class="col-4 col-form-label">餘額:</label> 
    <div class="col-8">
      <input type="text" id="balance" name="balance" class="form-control" disabled="disabled" value = "<?php echo $balance;?>"/>
      
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button type="submit" name="okButton" id="okButton" class="btn btn-primary ">提款</button>
      <a href="secret.php">回上頁</a>
    </div>
  </div>
</form>
</div>
  
   
</body>
<script type="text/javascript">
  //在輸出的時候解除disabled輸入框不可變動功能
  $("#okButton").click(function(){$("input").prop("disabled",false);});
</script>;
</html>	