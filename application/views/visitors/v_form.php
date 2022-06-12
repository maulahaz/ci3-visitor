<h2><?= $pageTitle;?></h2>
<div class="msgbox"><?php include(APPPATH.'views/notification.php');?></div>
<div class="card">
  <div class="card-header">
    <h5>Form Entry</h5>
  </div>

  <form action="<?= $formLocation ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
  <div class="card-body">
    <div class="form-group row mb-3">
      <label class="col-sm-2 must-be-fill">Company</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="company" value="<?= !empty($dtVisitor) ? $dtVisitor->company : set_value('company') ?>">
      </div>
    </div>  
    <div class="form-group row mb-3">
      <label class="col-sm-2 must-be-fill">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fullname" value="<?= !empty($dtVisitor) ? $dtVisitor->fullname : set_value('fullname') ?>">
      </div>
    </div>
    
    <div class="form-group row mb-3">
      <label class="col-sm-2 must-be-fill">Phone</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="phone" value="<?= !empty($dtVisitor) ? $dtVisitor->phone : set_value('phone') ?>">
      </div>
    </div>
    <div class="form-group row mb-3">
      <label class="col-sm-2">Picture</label>
      <div class="col-sm-10">
        <input class="form-control" type="file" name="picture">
        <img src="<?=base_url()?>assets/images/noimage.jpg ?>" class="img-thumbnail mt-2" width="150px" alt="">
      </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-sm btn-primary" name="btnSubmit" value="<?=$submitValue;?>"><i class="bi bi-save2"></i>  Save</button>
    <a href="<?= base_url('visitors') ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-x-square"></i>  Cancel</a>
    <!--   <i class="bi bi-x-square"> -->
  </div>
  
  </form>
</div>

<!-- CSS -->
<style>
  .must-be-fill::after{
    content: ' *';
    color: red; 
    font-weight:700
  }
</style>