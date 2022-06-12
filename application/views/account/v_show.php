<h2><?= $pageTitle;?></h2>
<div class="card mb-3">
  <div class="card-header">
    Options
  </div>
  <div class="card-body">
    <a href="<?=base_url()?>devices/manage" class="btn btn-outline-primary">Back to Dashboard</a>
    <a href="<?=base_url()?>account/changepass" class="btn btn-primary">Change Password</a>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Detail
  </div>
  <div class="card-body">
    <h2>Welcome <?=$_SESSION['auth']->username?></h2>
  </div>
</div>

<!-- CSS -->
<style>

</style>