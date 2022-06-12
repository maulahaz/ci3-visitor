<h2><?= $pageTitle;?></h2>
<div class="card">
  <div class="card-header d-inline-flex justify-content-between align-items-center">
    <h5>List</h5>
    <a href="<?=base_url()?>devices/create" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i>  Create</a>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col" class="text-center" width="100px">Action</th>
        </tr>
      </thead>
        <tbody>
        <?php $sn =1;?> 
        <?php foreach ($dtDevices as $row):?> 
        <tr>
          <td><?=$sn++?></td>
          <td><?=$row->name?></td>
          <td><?=$row->description?></td>
          <td class="text-center">
            <a href="<?=base_url()?>devices/show/<?=$row->id?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-search"></i>  Detail</a>
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