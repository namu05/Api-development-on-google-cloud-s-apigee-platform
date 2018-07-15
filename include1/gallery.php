<?php

if(isset($_POST['submit']))
{
 $newFileName=$_POST['filename'];

if(empty($newFileName))
{
   $newFileName="gallery";
}
else
{
$newFileName=strtolower(str_replace(" ","-",$newFileName));
}

$imageTitle=$_POST['filetitle'];
$imageDesc=$_POST['filedesc'];

$file=$_FILES['file'];

$fileName=$file["name"];
$fileType=$file["type"];
$fileTempName=$file["tmp_name"];
$fileError=$file["error"];
$fileSize=$file["size"];


$fileExt=explode(".",$fileName);
$fileActualExt=strtolower(end($fileExt));

$allowed=array("jpg","png","jpeg","mp4");

if(in_array($fileActualExt, $allowed))
{
if($fileError==0)
{
if($fileSize<2000000)
{
$imgFullName=$newFileName . "." . uniqid("",true). "." . $fileActualExt;
$fileDestination="../include1/img/". $imgFullName;

include_once "dbh.php";

if(empty($imageTitle) || empty($imageDesc))
{

header("Location: ../aboutme.php?upload=empty");
exit();
}
else
{
$sql="SELECT *FROM gallery;";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
echo "sql statement failed";
}
else
{
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$rowCount=mysqli_num_rows($result);
$setImageOrder=$rowCount+1;


$sql="INSERT INTO gallery(titleGallery,descGallery,imgFullNameGallery,orderGallery) VALUES(?,?,?,?);";
if(!mysqli_stmt_prepare($stmt,$sql))
{
echo "sql statement failed";
}
else
{
mysqli_stmt_bind_param($stmt,"ssss",$imageTitle,$imageDesc,$imgFullName,$setImageOrder);
mysqli_stmt_execute($stmt);
move_uploaded_file($fileTempName,$fileDestination);
header("Location: ../aboutme.php?upload=success");
}
}
}
}
else{
echo "File size is large";
exit();
}
}
else{
echo "you had an error";
exit();
}
}
else
{
echo"you need to upload a proper file type";
exit();
}
}