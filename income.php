<?php
if (isset($_POST["okButton"])) {
    $nowdate = $_POST["nowdate"];
    $type = $_POST["typeId"];
    $money = $_POST["money"];
    $balance = $_POST["balance"];
    $sql = 
      "insert into employee (date,type, money,balance )
      values ('$nowdate','$type' ,'$money', '$balance')";
    
    echo $sql;
    require("database.php");
    mysqli_query($link, $sql);
    header("location: secret.php");
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

<form method="post">
  <div class="form-group row">
    <label for="nowdate" class="col-4 col-form-label">date:</label> 
    <div class="col-8">
        <input type="text" id="nowdate" name="nowdate" class="form-control" disabled value = "<?php echo date('Y-m-d H:i:s',mktime (date(H)+8, date(i), date(s), date(m), date(d), date(Y)))?>"/>       
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">type:</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="typeId" id="typeId_0" type="radio" class="custom-control-input" value="R"> 
        <label for="typeId_0" class="custom-control-label">Reposit</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="typeId" id="typeId_1" type="radio" class="custom-control-input" value="D"> 
        <label for="typeId_1" class="custom-control-label">Deposit</label>
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <label for="money" class="col-4 col-form-label">金額:</label> 
    <div class="col-8">
      <input id="money" name="money" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="balance" class="col-4 col-form-label">餘額:</label> 
    <div class="col-8">
      <input type="text" id="balance" name="balance" class="form-control" disabled value = "0"/>
      
    </div>
  </div>
  
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="okButton" value="OK" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

</div>
    </form>
    </div>
  </div> 
</body>
</html>