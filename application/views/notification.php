<?php if (isset($_SESSION['success'])): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Great!</strong> <?= $_SESSION['success'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['errors'])): ?>
  <?//json($_SESSION['errors']);?>
  <?//json(is_array($_SESSION['errors']), true);?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error!,</strong> something went wrong. 
      <?php if(is_array($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $key => $errorVal) : ?>
          <p class="text-danger"><?=$errorVal; ?></p>
        <?php endforeach ?>
      <?php else: ?>
        <p class="text-danger"><?= $_SESSION['errors'] ?></p>
      <?php endif ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php unset($_SESSION['errors']); ?>
<?php endif; ?>