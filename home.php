<?php
include 'includes/security.php';
include 'includes/header.php';
?>
<!--CAROUSEAL-->
<div class="container-fluid">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Carousel indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
	</ol>   
	 <!-- Wrapper for carousel items -->
	 <div class="carousel-inner">
		<div class="item active">
			<img src="images/Slider/slider1.jpg">
				<div class="carousel-caption">
				<h1 style=color:red;>WELCOME TO ABC JOB PORTAL</h1>
				<p>Hot spot for Job Seekers & Employers.</p>
				</div>
		</div>
		<div class="item">
			<img src="images/Slider/job-portal.png"alt="second Slide" height="700" width="900"/>
		</div>
		<div class="item">
			<img src="images/Slider/slider3.jpg" alt="Third Slide"height="900" width="900"/>
		</div>
		<div class="item">
			<img src="images/Slider/slider4.jpg" alt="Fourth Slide"height="900" width="900"/>
		</div>

	</div>
<!-- Carousel controls -->
	 <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	 </a>
	 <a class="right carousel-control" href="#myCarousel" data-slide="next">
	 <span class="glyphicon glyphicon-chevron-right"></span>
	 <span class="sr-only">Next</span>
	 </a>
 </div>
 </div>
<br>

<!--ADD PROFILE-->
	<div class="container-fluid">
	<div class="row">
	
	<div class="col-lg-4">
	<img src="images/portal_pic2.jpg" class="img-responsive center-block" /></br>
	<h4 style="text-align:center">PROFILE</h4>      
	<p style="text-align:center"><em>Tell Your Story With Your Profile</br> 
	Add a job to show who you are</p>
	</div>
	
	<div class="col-lg-4">
	<img src="images/portal_pic3.jpg" class="img-responsive center-block" /></br>                           
	<h4 style="text-align:center">CONNECT</h4>
	<p style="text-align:center"><em>Build your network by connecting to more people</br> 
	You can find out more oppertunity.</p>
	</div>
		
	<div class="col-lg-4">
	<img src="images/portals_pic1.jpg" class="img-responsive center-block" /></br>	
	<h4 style="text-align:center">POST</h4>
	<p style="text-align:center"><em>Use the upwork platform to chat,</br> 
	share files, and collaborate from</br> your desktop or on the go.
	</div>

	</div>
	</div>

<br>
  
<style>
.carousel{
    background: #b1e9f0;
    margin-top: 20px;
}
.carousel .item{
    min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example{
	margin: 20px;
}
.carousel-content {
  position: absolute;
  bottom: 10%;
  left: 5%;
  z-index: 20;
  color: white;
  text-shadow: 0 1px 2px rgba(0,0,0,.6);
}


</style>
<?php 
include('./includes/footer.php');
?>

