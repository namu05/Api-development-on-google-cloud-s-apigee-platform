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



<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

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

		


<hr></hr>

<center><h1 id="title" onclick="sayhello();">THIS IS MY FIRST WEBSITE</h1>

</center>

<hr> </hr>
	
<div class="container">
		

	

<div class="row">
			
<div class="col-md-3">
				
<img id="image1" 
class="crop-img" src="img_1.jpg" >
 
</div>


<div class="col-md-3">

<img id="image2" class="crop-img" src="img_3.jpg" >
 
</div>
		

<div class="col-md-3">

<img id="image3" class="crop-img" src="img_4.jpg">
 
</div>
			

<div class="col-md-3">

<img id="image4" class="crop-img" src="img_5.jpg" >

</div>
		

</div>		
			
	
<div class="row">
			
<div class="col-md-1">
				
<button id="backward">&lt;</button>
			
</div>

			
<div class="col-md-10">
				
<img id="bigImage" class="large-img" src="img_1.jpg" > 
			
</div>
			

<div class="col-md-1">
				
<button id="forward">&gt;</button>
			
</div>
		

</div>
	
</div>

	


<script type="text/javascript">


function sayhello()
{
$("#title").html("HOPE U LIKE IT");
$("#title").click(function() {
$("#title").html("THIS IS MY FIRST WEBSITE");
$("#title").off("click");
});
};



var paused = false;

	
$(".crop-img").click(function()
{

$("#bigImage").attr('src', 
$(this).attr('src'));
});

		

var counter = 1;
	
$("#image"+counter).click();
		
$("#backward").click(function (){
			
counter = counter - 1;
		
if(counter < 1){
				
counter = 4;

}
			

$("#image"+counter).click();
});


$("#forward").click(function ()
{

counter = counter + 1;
	
			
if(counter > 4){
				
counter = 1;

}
	
$("#image"+counter).click();

		});

 
		
		
$("#bigImage").click(function (){
		
paused = !paused;
		
});

		

setInterval(function (){
			
if(!paused){

$("#forward").click();
			
};
		
}, 2000);
	

</script>


</body>

</html>







