<!DOCTYPE html>
<html>
    <head>
	<title>UCD Flight Tracker</title>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="bootstrap.css"/>
	<script src="jquery-2.1.3.js"/></script>
	<script src="bootstrap.js"></script>
	<style>
	   html,body {
		 height:100%;
	   }

	   h1 {
		 font-family: Arial,sans-serif;
		 font-size: 63px;
		 font-weight: bold;
		 color: #000000;
	   }

	   .lead {
		   color:#000000;
	   }

	   /* Custom container */
	   .container-full {
		 margin: 0 auto;
		 width: 100%;
		 min-height:100%;
		 color:#eee;
		 overflow:hidden;
  		 background-image: url('Bicycle2.jpg');
  		 background-repeat: no-repeat;
  		 background-size: 100% auto;
  		 background-position: center center;
  		 opacity: 0.85;	   
  		 }

	   .container-full a {
		 color:#efefef;
		 text-decoration:none;
	   }

	   .v-center {
		 margin-top:5%;
	   }
	   
	   textarea {
    	 resize: none;
	   }
	   
	</style>
	
    </head>

    <body>
	<nav class="navbar navbar-inverse" style="visibility: hidden;"></nav>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	    <div class="container-fluid">
		<div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="index.php">Flight Tracker</a>
		</div>
		<div class="collapse navbar-collapse" id="mynavbar">
		    <ul class="nav navbar-nav">
			<li><a href="index.php">Search</a></li>
			<li><a href="about.php">About</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="contact.php">Contact</a></li>
		    </ul>
		</div>
	    </div>
	</nav>

	<div class="container-full">

		<div class="row">
		  <div class="col-lg-12 text-center v-center">
			<h1>Comments?</h1>
		  </div> 
		</div> <!-- /row -->
  
		<div class="row">
	   
		  <div class="col-lg-12 text-center v-center" style="font-size:39pt;">
			<a href="#"><i class="icon-google-plus"></i></a> <a href="#"><i class="icon-facebook"></i></a>  <a href="#"><i class="icon-twitter"></i></a> <a href="#"><i class="icon-github"></i></a> <a href="#"><i class="icon-pinterest"></i></a>
		  </div>
	  
		</div>
  
  		<br><br><br><br><br>
	
	</div> <!-- /container full -->

<div class="container">
  	<hr>
  	<div class="row">
        <div class="col-md-3">
          
        </div>
      	<div class="col-md-6">
        	<div class="panel panel-default">
            <div class="panel-heading"><h3>We'd Love to Hear Them.</h3></div>
            <div class="panel-body">
            	<form role="form form-inline"  class="form-vertical" method="post" action="contactsubmission.php">
					<div class="form-group">
			   			<label for="name">
						Name: 
						<input type="text" class="form-control" id="name" 
				    	name = "name" size="20" placeholder="John Smith" required/>
			    		</label>

			    		<label for="email">
							Email:
							<input type="email" class="form-control" id="email" name="email" 
				    		pattern="*@-.-" size="30" placeholder="john.smith@website.com" required/>
			    		</label>
					</div>
					<label for="comments">
						Message: 
			    		<textarea rows="8" cols="60" id="comments" name="comments" placeholder="Let us know what you think!" required></textarea>
			    	</label>
			    
			    <input type="submit" class="btn btn-default" value="Submit"/>
				</form>
            </div>
          </div>
        </div>
      	<div class="col-md-3">
        	
        </div>
    	</div>
    </div>

</div>
	</header>
    </body>
</html>