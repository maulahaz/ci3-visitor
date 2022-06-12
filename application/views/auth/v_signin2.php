<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url()?>assets/css/bootstrap5.min.css" rel="stylesheet">
    <style>
      body {
      font-family: "Lato", sans-serif;
      }
      .main-head{
      height: 150px;
      background: #FFF;
      }
      .sidenav {
      height: 100%;
      background-color: #000;
      overflow-x: hidden;
      padding-top: 20px;
      }
      .main {
      padding: 0px 10px;
      }
      @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      }
      @media screen and (max-width: 450px) {
      .login-form{
      margin-top: 10%;
      }
      .register-form{
      margin-top: 10%;
      }
      }
      @media screen and (min-width: 768px){
      .main{
      margin-left: 40%; 
      }
      .sidenav{
      width: 40%;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      }
      .login-form{
      margin-top: 50%;
      }
      .register-form{
      margin-top: 20%;
      }
      }
      .login-main-text{
      margin-top: 20%;
      padding: 60px;
      color: #fff;
      }
      .login-main-text h2{
      font-weight: 300;
      }
      .btn-black{
      background-color: #000 !important;
      color: #fff;
      }
    </style>
    <title>Visitor - SmartXL</title>
  </head>
  <body>
    <div class="sidenav">
      <div class="login-main-text">
        <h2>Application<br> Login Page</h2>
        <p>Please Signin here to access.</p>
      </div>
    </div>
    <div class="main">
      <div class="col-md-6 col-sm-12">
        <div class="login-form">
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