<h2><?= $pageTitle;?></h2>
<div class="card">
  <div class="card-header">
    <h3>Form</h3>
  </div>
  <form action="<?= $formLocation ?>" class="form-horizontal" method="POST">
  <div class="card-body">
    
    <div class="form-group row mb-3">
      <label class="col-sm-2">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fullname" value="<?= !empty($dtUser) ? $dtUser->fullname : set_value('fullname') ?>">
      </div>
    </div>
    <div class="form-group row mb-3">
      <label class="col-sm-2">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fullname" value="<?= !empty($dtUser) ? $dtUser->fullname : set_value('fullname') ?>">
      </div>
    </div>
    <div class="form-group row mb-3">
      <label class="col-sm-2">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fullname" value="<?= !empty($dtUser) ? $dtUser->fullname : set_value('fullname') ?>">
      </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-sm btn-primary" name="btnSubmit" value="<?=$submitValue;?>">Save</button>
    <a href="<?= base_url('users') ?>" class="btn btn-sm btn-outline-primary">Cancel</a>
    
  </div>
    
  </form>
</div>

<!-- CSS -->
<style>

</style>