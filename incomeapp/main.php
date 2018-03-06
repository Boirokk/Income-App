<!DOCTYPE html>
<html>
<head>
	<title>The income app</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
   <div class="container">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="#">The Income App</a>
     </div>
     <div id="navbar" class="collapse navbar-collapse">
       <ul class="nav navbar-nav">
         <li class="active"><a href="?action=main">Home</a></li>
         <li><a href="?action=show_about">About</a></li>
         <li><a href="http://northportwebsitedesign.com/contact.php" target="_blank">Contact</a></li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <?php if(isset($_SESSION['user'])): ?>
            <li><a href="?action=logout">Logout <i class="fa fa-sign-out"></i></a></li>
          <?php else: ?>
            <li><a href="?action=show_signup">Signup  <i class="fa fa-user-plus"></i></a></li>
            <li><a href="?action=show_login">Login  <i class="fa fa-user"></i></a></li>
         <?php endif; ?>
       </ul>
     </div>
   </div>
  </nav>

 <div class="container">
 	<div class="row">
 		<div class="col-lg-12">
 			<div class="content">
 				<h1>The Income App</h1>
 				<h3>The app that tracks your income</h3>
 				<hr>
				<form class="" action="index.php" method="post">
					<input type="hidden" name="action" value="show_login">
					<button class="btn btn-default btn-lg"><i class="fa fa-dollar"></i>  Get Started!</button>
				</form>
 			</div>
 		</div>
 	</div>
 </div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</body>
</html>
