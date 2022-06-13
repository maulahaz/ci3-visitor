<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url()?>assets/css/bootstrap5.min.css" rel="stylesheet">
    <!-- Bootstap Icon: -->
    <link href="<?= base_url()?>assets/css/bootstrap-icons.css" rel="stylesheet">

    <title>Visitor - SmartXL</title>
  </head>
  <body>

    <h3 style="text-align: center"><?=$pageTitle; ?></h3>
    <hr>
    <table class="table table-striped table-sm table-bordered" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th style="width: 20px; text-align: center">No.</th>
          <th style="width: 150px; text-align: center">Photo</th>
          <th style="min-width: 80px; width: 100px; text-align: center">Barcode</th>
          <th style="text-align: center">Name</th>
          <th style="text-align: center">Company</th>
          <th style="text-align: center">Phone</th>
        </tr>
      </thead>
      <tbody>
        <?php $sn = 1 ?>
        <?php foreach ($dtVisitors as $row) :?>
        <tr>
          <td style="text-align: center"><?=$sn++?></td>
          <td style="text-align: center">
            <?php if($row->picture != NULL ):?>
              <img src="<?=base_url()?>assets/uploads/<?=$row->picture?>" class="img-thumbnail" width="120px" alt="">
            <?php else:?>
              <img src="<?=base_url()?>assets/images/noimage.jpg ?>" class="img-thumbnail" width="120px" alt="">
            <?php endif;?>
              
          </td>
          <td style="text-align: center">
            <div class="barcode">
              <img src="<?=base_url('visitors/getBarcode/'.$row->code);?>">
            </div>
          </td>
          <td><?=$row->fullname?></td>
          <td><?=$row->company?></td>
          <td><?=$row->phone?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <script src="<?= base_url()?>assets/js/bootstrap5.min.js"></script>
  </body>
</html>