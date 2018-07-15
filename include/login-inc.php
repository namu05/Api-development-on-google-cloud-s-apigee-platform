<?php

if(isset($_POST['Login']))
{
  include_once 'db.php';

$uid=mysqli_real_escape_string($conn,$_POST['uid']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);



if(empty($uid) || empty($pwd))
{
header("Location: ../test.php?login=empty");
exit();

}
else{
$sql="SELECT *FROM user where user_uid='$uid' ";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);

if($resultCheck<1)
{
header("Location: ../SlideShow/index.php");
exit();
}
else
{
if($row=mysqli_fetch_assoc($result))
{
$hashedpwd=password_verify($pwd,$row['user_pwd']);

}
if($hashedpwd==false)
{
header("Location: ../test.php?login=password wrng!");
exit();
}
else if($hashedpwd==true)
{
header("Location:index.php");
exit();
}

}}}

else
{
header("Location: ../test.php?login=error");
exit();
}
