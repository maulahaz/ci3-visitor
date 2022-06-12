<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?=$headline;?></h1>
<p class="msgbox"><?= (isset($flashMsg)) ? $flashMsg : null  ?></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?=$panelTitle;?></h6>
    <a href="<?=base_url('products/create');?>" class="btn btn-sm btn-primary mt-4"><i class="fas fa-plus"></i> Create</a>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered" cellpadding="0" cellspacing="0" width="100%">
        <thead class="text-center">
          <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Link</th>
            <th>Status</th>
            <th>Notes</th>
            <th><i class="fa fa-cog"></i></th>
          </tr>
        </thead>
        <tbody>
          <?php
	          $sn = 1;
	          foreach ($dtProducts->result() as $row){ 
            $detail = base_url()."products/show/".$row->id; 
          ?>
          <tr>
            <td class="text-center">
              <?php if($row->picture == '' || $row->picture == 'noimage.jpg'): ?>
                <img src="<?= base_url('assets/img/noimage.jpg') ;?>" class="img-fluid" alt="" width="150px" />
              <?php else: ?>
                <img src="<?= base_url('uploads/products/'.$row->picture) ;?>" class="img-fluid" alt="" width="150px" />
              <?php endif; ?>
            </td>
            <td class="text-left"><?= $row->title;?></td>
            <td class="text-left"><?= $row->description;?></td>
            <td class="text-left"><?= $row->url;?></td>
            <td class="text-center"><?= ($row->isActive == 1)?'Active':'InActive';?></td>
            <td><?= $row->notes;?></td>
            <td style="text-align: center; vertical-align: middle;">
              <a href="<?= $detail ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Detail & Modification"><span class="fa fa-search"></span> Detail</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
