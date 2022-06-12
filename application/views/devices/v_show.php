<h2><?= $pageTitle;?></h2>
<div class="card mb-3">
  <div class="card-header">
    Options
  </div>
  <div class="card-body">
    <a href="<?=base_url()?>devices/manage" class="btn btn-sm btn-outline-primary"><i class="bi bi-back"></i>  Back to List</a>
    <a href="<?=base_url()?>devices/edit/<?=$dtDevice->id?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i>  Edit</a>
    <a href="<?=base_url()?>devices/destroy/<?=$dtDevice->id?>" class="btn btn-sm btn-danger float-end" onclick="javascript:return confirm('Are you sure you want to delete this data?')"><i class="bi bi-trash"></i>  Delete</a>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Detail
  </div>
  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-3">Name Code</dt>
      <dd class="col-sm-9"><?=$dtDevice->name?></dd>
      <dt class="col-sm-3">Description</dt>
      <dd class="col-sm-9"><?=$dtDevice->description?></dd>
    </dl>
  </div>
</div>

<!-- CSS -->
<style>

</style>