<h2><?= $pageTitle;?></h2>
<p class="msgbox"><?php include(APPPATH.'views/notification.php');?></p>
<div class="card">
  <div class="card-header d-inline-flex justify-content-between align-items-center">
    <h5>List</h5>
    <div class="custom-button">
      <a href="<?=base_url()?>visitors/print" class="btn btn-sm btn-info"><i class="bi bi-printer"></i>  Print</a>
      <a href="<?=base_url()?>visitors/create" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i>  Create</a>   
    </div>

  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</i></th>
          <th scope="col">Photo</th>
          <th scope="col">Name</th>
          <th scope="col">Company</th>
          <th scope="col">Phone</th>
          <th scope="col">User Code</th>
          <th scope="col">Registered</th>
          <th scope="col" class="text-center" width="100px">Action</th>
        </tr>
      </thead>
        <tbody>
        <?php $sn =1;?> 
        <?php foreach ($dtVisitors as $row):?> 
        <tr>
          <td><?=$sn++?></td>
          <td>
            <?php if($row->picture != NULL ):?>
              <img src="<?=base_url()?>assets/uploads/<?=$row->picture?>" class="img-thumbnail" width="120px" alt="">
            <?php else:?>
              <img src="<?=base_url()?>assets/images/noimage.jpg ?>" class="img-thumbnail" width="120px" alt="">
            <?php endif;?>
              
          </td>
          <td><?=$row->fullname?></td>
          <td><?=$row->company?></td>
          <td><?=$row->phone?></td>
          <!-- <td><?=$row->code?></td> -->
          <td>
            <div class="barcode">
              <img src="<?=base_url('visitors/getBarcode/'.$row->code);?>">
            </div>
          </td>
          <td><?=$row->created_at?></td>
          <td class="text-center">
            <a href="<?=base_url()?>visitors/show/<?=$row->id?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-search"></i>  Detail</a>
          </td>
        </tr>
        <?php endforeach?>
      
      </tbody>
    </table>
  </div>
</div>

<!-- CSS -->
<style>

</style>