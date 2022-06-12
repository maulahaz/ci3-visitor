<h2><?= $pageTitle;?></h2>
<p class="msgbox"><?php include(APPPATH.'views/notification.php');?></p>
<div class="card">
  <div class="card-header d-inline-flex justify-content-between align-items-center">
    <h5>List</h5>

    <!-- Search form (start) -->
    <div class="search-area d-inline-flex">
      <form action="<?= base_url('visitors/records') ?>" method="POST" class="d-flex">
        <input type='text' name='search' class="form-control me-2" value='<?=isset($search) ? $search : NULL?>' placeholder="Search" aria-label="Search">
        <button type='submit' name='btnSubmit' class="btn btn-sm btn-outline-primary" value='Search' data-bs-toggle="tooltip" data-bs-placement="left" title="Search By Name and Notes"><i class="bi bi-search"></i></button>
        
      </form>
      &nbsp;&nbsp;
      <button type="button" name='btnSearchMore' class="btn btn-sm btn-warning" data-bs-placement="left" title="Search More" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="bi bi-binoculars"></i></button>
    </div>

  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col" class="text-center">Log type</th>
            <th scope="col">Log at</th>
            <th scope="col">Notes</th>
            <th scope="col" class="text-center" width="100px">Action</th>
        </tr>
      </thead>
        <tbody>
        <?php //$sn =1;?> 
        <?php $sn =$this->uri->segment(3)+1; ?>
        <?php foreach ($dtVisitors as $row):?> 
        <tr>
          <td><?=$sn++?></td>
          <td><?=$row->fullname?></td>
          <td class="text-center"><?=($row->log_type == 'punch_in') ? '<span class="badge bg-primary">IN</span>' : '<span class="badge bg-secondary">OUT</span>'?></td>
          <td><?=$row->log_at?></td>
          <td><?=$row->description?></td>
          <td class="text-center">
            <a href="<?=base_url()?>visitors/record_detail/<?=$row->id?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-search"></i>  Detail</a>
          </td>
        </tr>
        <?php endforeach?>
      
      </tbody>
    </table>
    <p>Total Data : <?=$totData?></p>
    <p><?php if (isset($links)) echo $links; ?></p>
  </div>
</div>

<!-- CSS -->
<style>

</style>

<!-- MODAL: SEARCH -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= base_url() ?>visitors/search" class="form-horizontal" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <label class="col-form-label">Name</label>
          <input type="text" class="form-control" name="name" value="<?= isset($searchMore) ? $searchMore['name'] : NULL ?>">
        </div>
 
        <div>
          <label class="col-form-label">Range Date</label>
          <div class="input-group">
            <input type="text" class="form-control datepicker_input" name="date-from" value="<?= isset($searchMore) ? convertDate($searchMore['date_from'],'mydateX') : NULL ?>" autocomplete="off">
            <div class="input-group-prepend">
                <span class="input-group-text">-></span>
            </div>
            <input type="text" class="form-control datepicker_input" name="date-upto" value="<?= isset($searchMore) ? convertDate($searchMore['date_upto'],'mydateX') : NULL ?>" autocomplete="off">
          </div>
        </div>
        <div>
          <label class="col-form-label">Log Type</label>
          <select id="log-type" name="log-type" class="form-select">
            <option value="">--Select--</option>
            <option value="punch_in">Pinch In</option>
            <option value="punch_out">Punch Out</option>
          </select>
        </div>
        <div>
          <label class="col-form-label">Notes</label>
          <input type="text" class="form-control" name="notes" value="<?= isset($searchMore) ? $searchMore['notes'] : NULL ?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" name="btnSubmit" value="Reset"><i class="bi bi-arrow-clockwise"></i>  Reset</button>
        <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>  Close</button>
        <button type="submit" class="btn btn-primary float-end" name="btnSubmit" value="SearchMore"><i class="bi bi-search"></i>  Search</button>
      </div>
    </div>
    </form>
  </div>
</div>