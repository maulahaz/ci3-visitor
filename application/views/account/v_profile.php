<h2><?= $pageTitle;?></h2>
<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-header">
        Options
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="<?=base_url()?>account/dashboard"><i class="bi bi-back"></i> Profile</a></li>
        <li class="list-group-item"><a href="<?=base_url()?>account/changepass"><i class="bi bi-lock"></i> Change Password</a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-9">
    <div class="card">
      <div class="card-header">
        Detail
      </div>
      <div class="card-body">
        <h2>Welcome <?=$_SESSION['auth']->username?></h2>
      </div>
    </div>
  </div>
</div>
<!-- CSS -->
<style>
	.list-group-item a{
		display: block;
		text-decoration: none;
	}
	.list-group-item:hover{
		display: block;
		background-color: rgba(0,0,0,.2);
	}
</style>