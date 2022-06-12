<?php if (isset($error) && !empty($errors)): ?>
  <div class="callout callout-danger fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h5><strong>Error!!</strong> Input problem.</h5>
      <?php foreach ($errors as $field => $error) : ?>
        <p><?=$error; ?></p>
      <?php endforeach ?>
  </div>
  <?php endif; ?>

<?php if (!empty($_SESSION['success'])): ?>
  <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Great!</strong> <?= $_SESSION['success'] ?>.
  </div>
  <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['errors'])): ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Error!</strong> <?= $_SESSION['errors'] ?>.
  </div>
  <?php unset($_SESSION['errors']); ?>
<?php endif; ?>

<?php 
  //--show if any error from input form:
  echo validation_errors("<p style='color: red;'>","</p>"); 

  //--Notifikasi error upload:
  if(isset($error)){
    foreach ($error as $value) {
      echo "Error : ".$value;
    }
  };

  //--Notifikasi error upload: 
  if(isset($errorUpload)){
      foreach ($errorUpload as $value) {
        echo "Error : ".$value;
      }
  };
?>