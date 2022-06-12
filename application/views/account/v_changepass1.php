<h2><?= $pageTitle;?></h2>
<div class="card mb-3">
  <div class="card-header">
    Options
  </div>
  <div class="card-body">
    <a href="<?=base_url()?>account/dashboard" class="btn btn-outline-primary"><i class="bi bi-back"></i> Back to Dashboard</a>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Detail
  </div>
  <div class="card-body">
      <form action="<?= $formLocation ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row mb-3">
            <label class="col-sm-2 must-be-fill">Current Password</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="cur_pwd" value="">
            </div>
          </div>  

          <div class="form-group row mb-3">
            <label class="col-sm-2 must-be-fill">New Password</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="cur_pwd" value="">
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-sm-2 must-be-fill">Confirm Password</label>
            <div class="col-sm-3">
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

<!-- CSS -->
<style>

</style>