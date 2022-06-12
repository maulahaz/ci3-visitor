<h2><?= $pageTitle;?></h2>
<div class="msgbox"><?php include(APPPATH.'views/notification.php');?></div>
<div class="card">
  <div class="card-header">
    <h5>Form Entry</h5>
  </div>

  <form action="<?= $formLocation ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
  <div class="card-body">
    <div class="form-group row mb-3">
      <label class="col-sm-2 must-be-fill">Name Code</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" value="<?= !empty($dtDevice) ? $dtDevice->name : set_value('name') ?>">
      </div>
    </div>  
    <div class="form-group row mb-3">
      <label class="col-sm-2 must-be-fill">Description</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="description" value="<?= !empty($dtDevice) ? $dtDevice->description : set_value('description') ?>">
      </div>
    </div>
    
    <hr>
    <button type="submit" class="btn btn-sm btn-primary" name="btnSubmit" value="<?=$submitValue;?>"><i class="bi bi-save2"></i>  Save</button>
    <a href="<?= base_url('devices') ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-x-square"></i>  Cancel</a>
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