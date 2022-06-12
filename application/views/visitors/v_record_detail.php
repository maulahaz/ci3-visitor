<h2><?= $pageTitle;?></h2>
<div class="card mb-3">
  <div class="card-header">
    Options
  </div>
  <div class="card-body">
    <a href="<?=base_url()?>visitors/records" class="btn btn-sm btn-outline-primary"><i class="bi bi-back"></i>  Back to List</a>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Detail
  </div>
  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-3">Full name</dt>
      <dd class="col-sm-9"><?=$dtVisitor->fullname?></dd>
      <dt class="col-sm-3">Company</dt>
      <dd class="col-sm-9"><?= ($dtVisitor->company != '') ? $dtVisitor->company : '--'?></dd>
      <dt class="col-sm-3">Phone</dt>
      <dd class="col-sm-9"><?= ($dtVisitor->phone != '') ? $dtVisitor->phone : '--'?></dd>
      <dt class="col-sm-3">User Barcode</dt>
      <dd class="col-sm-9"><?=$dtVisitor->code?></dd>
      <dt class="col-sm-3">Registered</dt>
      <dd class="col-sm-9"><?=$dtVisitor->created_at?></dd>
      <dt class="col-sm-3">Picture</dt>
      <dd class="col-sm-9">
        <?php if($dtVisitor->picture != NULL ):?>
          <img src="<?=base_url()?>assets/uploads/<?=$dtVisitor->picture?>" class="img-thumbnail" width="120px" alt="">
        <?php else:?>
          <img src="<?=base_url()?>assets/images/noimage.jpg ?>" class="img-thumbnail" width="120px" alt="">
        <?php endif;?>
      </dd>
    </dl>
  </div>
</div>

<!-- CSS -->
<style>

</style>