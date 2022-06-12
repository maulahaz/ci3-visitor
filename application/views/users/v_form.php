<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?=$headline;?></h1>
<p class="msgbox"><?= (isset($flashMsg)) ? $flashMsg : null  ?></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form <?=$headline;?></h6>
  </div>
  <form action="<?= $formLocation ?>" class="form-horizontal" method="POST">
  <div class="card-body">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="title" value="<?= !empty($dtProduct) ? $dtProduct->title : set_value('title') ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Description</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="description" value="<?= !empty($dtProduct) ? $dtProduct->description : set_value('description') ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Booking Link</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="url" value="<?= !empty($dtProduct) ? $dtProduct->url : set_value('url') ?>">
      </div>
    </div>
    <!-- <div class="form-group row">
      <label class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="isActive" value="<?//!empty($dtProduct) ? $dtProduct->isActive : set_value('isActive') ?>">
      </div>
    </div> -->
    
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-3">
        <select class="form-control" id="isActive" name="isActive">
          <option value="">--Select--</option>
        <?php $options = array(0=>'InActive',1=>'Active',); ?> 
        <?php foreach ($options as $dt => $value):?>
          <option value="<?= $dt;?>" <?= (isset($dtProduct) && $dtProduct->isActive == $dt) ? "selected" : null ; ?>><?= $value;?></option>
        <?php endforeach;?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Notes</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="notes" rows="3"><?= !empty($dtProduct) ? $dtProduct->notes : set_value('notes') ?></textarea>
      </div>
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-sm btn-primary" name="btnSubmit" value="<?=$submitValue;?>"><i class="fa fa-save"></i>&nbsp;Save</button>
    <a href="<?= base_url('products') ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-times"></i>&nbsp;Cancel</a>
  </div>
  </form>
</div>
