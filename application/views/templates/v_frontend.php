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
    <div class="container">
      <section id="menu" class="mb-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url()?>"><img src="<?=base_url()?>assets/images/borouge.png" alt="" class="img-fluid" width="100px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
                  <a class="nav-link" href="<?//base_url()?>devices/setActive">Set Active Device</a>
                </li> -->
                <?php if(isset($_SESSION['auth'])): ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['auth']->username; ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?=base_url()?>account/profile">Profile</a></li>
                    <li><a class="dropdown-item" href="<?=base_url()?>auth/signout">Sign out</a></li>
                  </ul>
                </li>
                <?php else: ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>auth/signin">Sign in</a>
                  </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </nav>
      </section>
      <section id="content" class="mb-3">
        <?php if(isset($viewFile)){ $this->load->view($viewFile);} ?>
      </section>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?= base_url()?>assets/js/bootstrap5.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    -->
    <?php if(isset($jsFile)){ $this->load->view($jsFile);} ?>
  </body>
</html>