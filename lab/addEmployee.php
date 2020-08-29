<?php
if (isset($_POST["okButton"])) {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $cityId = $_POST["cityId"];
  $sql = <<<multi
    insert into employee (firstName, lastName, cityId)
    values ('$firstName', '$lastName', $cityId)
  multi;
  // echo $sql;
  require("connDB.php");
  mysqli_query($link, $sql);
  header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<form method="post">
  <div class="form-group row">
    <label for="firstName" class="col-4 col-form-label">First Name:</label> 
    <div class="col-8">
      <input id="firstName" name="firstName" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="lastName" class="col-4 col-form-label">Last Name:</label> 
    <div class="col-8">
      <input id="lastName" name="lastName" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">City:</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cityId" id="cityId_0" type="radio" class="custom-control-input" value="2"> 
        <label for="cityId_0" class="custom-control-label">TaiPei</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cityId" id="cityId_1" type="radio" class="custom-control-input" value="4"> 
        <label for="cityId_1" class="custom-control-label">TaiChung</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cityId" id="cityId_2" type="radio" class="custom-control-input" value="6"> 
        <label for="cityId_2" class="custom-control-label">TaiNan</label>
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="okButton" value="OK" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

</div>

</body>
</html>
