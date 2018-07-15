<html>
	
<head>


<title>Image Gallery</title>



<link rel="stylesheet"

type="text/css"

href="bootstrap.css"
		    
  />

		

<link rel="stylesheet"
			  
type="text/css"
	
href="style.css"
	
/>	



</head>
	


<body>


<a 
href="index.php">
			
Home

</a>
		
 &nbsp;


<a 
href="aboutme.php">

About me 
		
</a>
		
&nbsp;


<a 
href="contact.php" >

Contact me 
		
</a>

		

<section >
<div class="gallery-container">

<hr></hr>

<?php

include_once 'include1/dbh.php';
$sql="SELECT * FROM gallery ORDER BY orderGallery DESC";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
echo "sql statement failed";
}
else
{
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);

while($row=mysqli_fetch_assoc($result))
{
echo '<a href="#">
<div style="background-image:url(include1/img/'.$row["imgFullNameGallery"].'); display:inline-block">  </div>
<h1> ' . $row["titleGallery"].' </h1>
<p>' . $row["descGallery"].'  </p>
</a>';
}

}


?>

</div>
</section>

<hr></hr>

<form action="include1/gallery.php" method="post" enctype="multipart/form-data">

FILE NAME:<input type="text" name="filename" id="filename"><br></br>

IMAGE TITLE:<input type="text" name="filetitle" id="filename"><br></br>

IMAGE DESCRIPITION:<input type="text" name="filedesc" id="filename"><br></br>

<input type="file" name="file" ><br></br>

<button type="submit" name="submit" >UPLOAD </button>

</form>

</body>


</html>








