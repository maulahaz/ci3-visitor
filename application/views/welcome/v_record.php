<?php
	$isAdmin = (isset($_SESSION['auth']) && $_SESSION['auth']->role_id == "88") ? TRUE : FALSE;
?>
<div class="area-form" style="min-height: 200px">

  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-input-tab" data-bs-toggle="tab" data-bs-target="#nav-input" type="button" role="tab" aria-controls="nav-input" aria-selected="true">Input Data</button>
      <button class="nav-link" id="nav-summary-tab" data-bs-toggle="tab" data-bs-target="#nav-summary" type="button" role="tab" aria-controls="nav-summary" aria-selected="false">Today Summary</button>
      <button class="nav-link" id="nav-device-tab" data-bs-toggle="tab" data-bs-target="#nav-device" type="button" role="tab" aria-controls="nav-device" aria-selected="false">Device ID</button>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="msgbox m-3" style="display: none"></div>

    <div class="tab-pane fade show active" id="nav-input" role="tabpanel" aria-labelledby="nav-input-tab">
      <form action="#" method="POST" class="mt-3">
        <?php //if(isset($_SESSION['device_id'])): ?>
    		<?php if($deviceId == NULL): ?>
          <h2 class="text-center" style="color: red">Please Set Device ID</h2>
        <?php else: ?>
        <label class="form-label">Barcode ID</label>
          <input type="text" id="user_barcode" name="user_barcode" class="form-control" autocomplete="off">
		  <div class="form-text">Selected Device ID: <?= $deviceId;?> (Location: <?= $deviceLoc;?>)</div>
          <input type="hidden" id="device_id" name="device_id" value="<?= $deviceId;?>">
        <?php endif; ?>
        <div class="line-divider"></div>
      </form>
    </div>
    <div class="tab-pane fade" id="nav-device" role="tabpanel" aria-labelledby="nav-device-tab">
      <form action="<?=base_url()?>devices/setActive" method="POST" class="mt-3">
        <div class="mb-3">
          <label class="form-label">Select Device ID</label>
          <select id="device_id" name="device_id" class="form-select" <?= ($isAdmin) ? NULL : "disabled" ?>>
            <option>--Select--</option>
            <?php foreach ($dtDevices as $rowDev) :?>
              <option value="<?= $rowDev->id ?>"><?= $rowDev->description ?></option>
            <?php endforeach;?>
              <!-- <option>Select 1</option> -->
              <!-- <option>Select 2</option> -->
          </select>
        </div>
        <button type="submit" class="btn btn-primary" <?= ($isAdmin) ? NULL : "disabled" ?>>Save</button>
      </form>
    </div>
    <div class="tab-pane fade" id="nav-summary" role="tabpanel" aria-labelledby="nav-summary-tab">
      <div class="row mt-3 summary">
        <div class="col-4">
          <div class="small-box bg-info d-flex justify-content-between">
            <div class="inner">
              <h3><?=$totTodayPunchIn?></h3>
              <p>Punch In</p>
            </div>
            <div class="icon">
              <i class="bi bi-person-plus"></i>
            </div>
          </div>
          <a href="<?=base_url()?>visitors/records" class="small-box-footer">More Info  <i class="bi bi-arrow-right-circle-fill"></i></a>
        </div>
        <div class="col-4">
          <div class="small-box bg-primary d-flex justify-content-between">
            <div class="inner">
              <h3><?=$totTodayPunchOut?></h3>
              <p>Punch Out</p>
            </div>
            <div class="icon">
              <i class="bi bi-arrows-fullscreen"></i>
            </div>
          </div>
          <a href="<?=base_url()?>visitors/records" class="small-box-footer">More Info  <i class="bi bi-arrow-right-circle-fill"></i></a>
        </div>
        <div class="col-4">
          <div class="small-box bg-warning d-flex justify-content-between">
            <div class="inner">
              <h3><?=$totDifference?></h3>
              <p>Punch Difference</p>
            </div>
            <div class="icon">
              <i class="bi bi-journal-x"></i>
            </div>
          </div>
          <a href="<?=base_url()?>visitors/records" class="small-box-footer">More Info  <i class="bi bi-arrow-right-circle-fill"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="divider"></div>

<div class="area-table">
  <table class="table table-sm table-striped table-hover">
    <thead>
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Log type</th>
        <th scope="col">Log at</th>
        <th scope="col">Notes</th>
      </tr>
    </thead>
    <tbody id="dtbl_visitors">
    </tbody>
  </table>
</div>

<!-- CSS -->
<style>
  .divider{
    border-top: 3px dashed #bbb;
    margin-bottom: 20px;
  }
  .msgbox{
    color: red;
    font-weight: 700;
  }
  .area-form{
    /* background-color: antiquewhite; */
    padding: 20px;
  }

  .area-table{
    background-color: rgb(235, 240, 211);
    padding: 10px;
  }
  .small-box{
    padding: 15px;
    border-radius: 0.25rem;
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    /*margin-bottom: 10px;*/
  }
  .small-box .inner{
    color: #fff;
    font-size: 1.1rem;
    font-weight: 700;
  }
  .small-box .inner h3{
    font-size: 2rem;
  }
  .small-box .icon{
    color: rgba(0,0,0,.15);
    font-size: 5rem;
  }
  .summary a{
    color: #fff;
    font-weight: 400;
  }
  .summary a:hover{
    color: currentColor;
    background: rgba(0,0,0,.3);
  }
  .small-box-footer{
    background: rgba(0,0,0,.1);
    color: rgba(255,255,255,.8);
    display: block;
    padding: 3px 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    z-index: 10;
    margin-top: -30px;
  }
  .small-box-footer .bi{
    color: rgba(0,0,0,.6);
  }
</style>