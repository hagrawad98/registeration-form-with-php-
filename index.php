<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name      = $_REQUEST['name'];
    $password  = $_POST['password'];
    $email     = $_POST['email'];
    $address   = $_POST['address'];
    $linkedurl = $_POST['url'];
    $errors = []; 
    /////////////// Name/////////////////////////////////
  if(empty($name)){
     $errors['Name'] = " Is Required";
  }
  /////////// Email//////////////////////////////////////
  if (empty($_POST["email"])) {
    $errors['Email'] = " Field Required with @ as email";
  } else {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['Email'] = "Invalid email"; 
    }
  }
//////////////Password///////////////////////////////////
 if(empty($password) || (strlen($password) <= 6)){
    $errors['Password'] = "Is Required more than 6 char";
 }
 /////////////Address///////////////////////////////////
 if(empty($address) || (strlen($address) <= 10)){
    $errors['Address'] = "Is Required with 10 char ";
 }
 /////////////ULR///////////////////////////////////////
 if(empty($linkedurl)){
    $errors['Linkedin'] = "Is Required as URl";
  } else {
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedurl)) {
        $errors['Linkedin'] = "Invalid URL"; 
    }
  }
 ///////////////LOOp////////////////////////////////////
   if(count($errors) > 0){
    foreach($errors as $index => $values){
      echo $index." "." >>> ".$values.'<br>';
    }
   }
   ///////////////output////////////////////////////////
   else{
     echo $name."<br>".$email."<br>".$password."<br>".$address."<br>".$linkedurl;
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Register</h2>
  <form   action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post">
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email</label>
    <input type="email"   class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Password</label>
      <input type="password"   class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Address</label>
      <input type="text"   class="form-control" name="address" id="exampleInputAdress" placeholder="address">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Linkedin URL</label>
      <input type="text"   class="form-control" name="url" id="exampleInputUrl" placeholder="linkedin url">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
  </body>
  </html>