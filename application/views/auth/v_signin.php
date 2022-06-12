<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url()?>assets/css/bootstrap5.min.css" rel="stylesheet">

    <title>Visitor - SmartXL</title>
  </head>
  <body>
    <div class="container">
    	<div class="row">
    		<div class="d-flex align-items-center justify-content-center">
		    	<form action="<?= $actionUrl ?>" method="POST">
		    		<div class="msgbox">
		    			<?php validation_errors(); ?>
		    			<?= (isset($flashMsg)) ? $flashMsg : null  ?>	
	    			</div>
					  <div class="mb-3">
					    <label class="form-label">User ID</label>
					    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" autocomplete="off">
					    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
					  </div>
					  <div class="mb-3">
					    <label class="form-label">Password</label>
					    <input type="password" class="form-control" id="userpass" name="userpass" >
					  </div>
					  <button type="submit" name="submit" value="Signin" class="btn btn-primary">Submit</button>
					</form>    			
    		</div>
    	</div>


    </div>

    <script src="<?= base_url()?>assets/js/bootstrap5.min.js"></script>
  </body>
</html>