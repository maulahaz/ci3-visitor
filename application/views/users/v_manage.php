<h2><?= $pageTitle;?></h2>
<div class="card">
  <div class="card-header d-inline-flex justify-content-between align-items-center">
    <h3>List</h3>
    <a href="<?=base_url()?>users/create" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i>  Create</a>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</i></th>
          <th scope="col">Photo</th>
          <th scope="col">Name</th>
          <th scope="col">Role</th>
          <th scope="col">Phone</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
        <tbody>
        <?php $sn =1;?> 
        <?php foreach ($dtUsers as $row):?> 
        <tr>
          <td><?=$sn++?></td>
          <td>
            <?php if($row->picture != NULL ):?>
              <img src="<?=base_url()?>assets/images/noimage.jpg ?>" class="img-thumbnail" width="120px" alt="">
            <?php else:?>
              <img src="<?=base_url()?>assets/images/noimage.jpg ?>" class="img-thumbnail" width="120px" alt="">
            <?php endif;?>
              
          </td>
          <td><?=$row->fullname?></td>
          <td><?=$row->role_id?></td>
          <td><?=$row->phone?></td>
          <td>
            <a href="<?=base_url()?>users/show/<?=$row->id?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-search"></i>  Detail</a>
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