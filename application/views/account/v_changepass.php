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
	      <form action="<?= $formLocation ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
	        <div class="card-body">
	          <div class="form-group row mb-3">
	            <label class="col-sm-3 must-be-fill">Current Password</label>
	            <div class="col-sm-4">
	              <input type="text" class="form-control" name="cur_pwd" value="">
	            </div>
	          </div>  

	          <div class="form-group row mb-3">
	            <label class="col-sm-3 must-be-fill">New Password</label>
	            <div class="col-sm-4">
	              <input type="text" class="form-control" name="cur_pwd" value="">
	            </div>
	          </div>

	          <div class="form-group row mb-3">
	            <label class="col-sm-3 must-be-fill">Confirm Password</label>
	            <div class="col-sm-4">
	              <input type="text" class="form-control" name="cur_pwd" value="">
	            </div>
	          </div>

	          <hr>
	          <button type="submit" class="btn btn-sm btn-primary" name="btnSubmit" value="<?=$submitValue;?>"><i class="bi bi-save2"></i>  Save</button>
	          <a href="<?= base_url('account/dashboard') ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-x-square"></i>  Cancel</a>
	          <!--   <i class="bi bi-x-square"> -->
	        </div>
	      </form>
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