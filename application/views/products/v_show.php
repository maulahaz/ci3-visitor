<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?=$headline;?></h1>
<p class="msgbox">
  <?= (isset($flashMsg)) ? $flashMsg : null  ?>
  <?php  
    if(isset($uploadMsg)){
        foreach ($uploadMsg as $value) {
          echo $value;
        }
    };
  ?>
</p>

<!-- DataTales Example -->
<div class="card shadow mb-2">
  <div class="card-header">
    <h6 class="m-0 font-weight-bold text-primary">Options</h6>
  </div>

  <div class="card-body">
    <a href="<?= base_url() ?>products" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> All data</a>
    <a href="<?= base_url() ?>products/edit/<?= $dtProduct->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Update data</a>
    <button type="button" name="delete" value="Hapus Data" class="btn btn-sm btn-danger float-right" id="btn-delete-data-modal" data-toggle="modal" data-target="#delete-data-modal"><i class="fa fa-trash"></i> Delete Data</button>
  </div>
</div>
<div class="row">
  <!-- DETAIL INFO -->
  <div class="col-8">
    <div class="card shadow">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Detail Data</h6>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-sm-3">Title</dt>
          <dd class="col-sm-9">: <?= $dtProduct->title ?></dd>
          <dt class="col-sm-3">Description</dt>
          <dd class="col-sm-9">: <?= $dtProduct->description ?></dd>
          <dt class="col-sm-3">Status</dt>
          <dd class="col-sm-9">: <?= ($dtProduct->isActive == 1)?'Active':'InActive';?></dd>
          <dt class="col-sm-3">Notes</dt>
          <dd class="col-sm-9">: <?= $dtProduct->notes ?></dd>
        </dl>
      </div>
    </div>
  </div>
  <!-- PICTURE INFO -->
  <div class="col-4">
    <div class="card shadow">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Image Data</h6>
      </div>
      <div class="card-body">
        <?php if($dtProduct->picture == 'noimage.jpg' || $dtProduct->picture == '') : ?>
        <form action="<?= base_url('products/upload-picture/'.$dtProduct->id) ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
          <div class="text-center"><img class="img-fluid img-circle mb-3" src="<?= base_url('assets/img/noimage.jpg') ?>" alt="Image"></div>          
          <p class="text-center">Please choose image then press UPLOAD.</p>
          <div class="input-group mb-2">
            <!-- <div class="custom-file">
              <input type="file" name="picture" class="custom-file-input">
              <label class="custom-file-label">Select image..</label>
            </div> -->
            <input type="file" class="form-control-file" name="picture">
          </div>
          <button type="submit" name="Upload" class="btn btn-sm btn-info btn-block">Upload</button>
        </form>
        <?php else : ?>
        <div class="text-center">
          <p><button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete-picture-modal"><i class="fa fa-times"></i> Delete Image</button></p>
          <p style="width:200px; text-align: center; display: inline-block;">
            <img src="<?= base_url('uploads/products/'.$dtProduct->picture);?>" alt="Image" class="img-fluid">
          </p>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- DELETE DATA -->
<!-- ===================================================== -->
<div class="modal fade" id="delete-data-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Delete Confirmation</p>
        <p>Are you sure want to delete this data ?</p> 
      </div>
      <div class="modal-footer justify-content-between">
      <form action="<?= base_url('products/destroy/'.$dtProduct->id) ?>" method="POST">
        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-check"></i>&nbsp;Yes, Delete data!</button>
      </form>
      <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- DELETE PICTURE -->
<!-- ===================================================== -->
<div class="modal fade" id="delete-picture-modal" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="<?= base_url('products/delete-picture/'.$dtProduct->id);?>" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Delete Image</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Delete Confirmation</p>
          <p>Are you sure want to delete this image ?</p> 
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-check"></i>&nbsp;Yes, Delete image!</button>
          <button class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancel</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
