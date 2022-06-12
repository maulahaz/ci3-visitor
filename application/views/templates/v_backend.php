<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?= base_url()?>assets/css/bootstrap5.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/bootstrap-icons.css" rel="stylesheet">

    <!-- Vanilla Datepicker CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css'> 
    <style>
      .datepicker-dropdown{
        z-index: 1111;
      }
    </style>

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
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   <i class="bi bi-upc-scan"></i>  Devices
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?=base_url()?>devices/manage">Manage</a></li>
                    <li><a class="dropdown-item" href="<?=base_url()?>devices/create">Create</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-lines-fill"></i>&nbsp;&nbsp;Visitors
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?=base_url()?>visitors/manage">Manage</a></li>
                    <li><a class="dropdown-item" href="<?=base_url()?>visitors/create">Create</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?=base_url()?>visitors/records">Records</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown" style="display:none">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-people"></i>  Users
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?=base_url()?>users/manage">Manage</a></li>
                    <li><a class="dropdown-item" href="<?=base_url()?>users/create">Create</a></li>
                  </ul>
                </li>
                <li class="nav-item" style="margin-left: 50px"></li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;<?=$_SESSION['auth']->username; ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?=base_url()?>account/profile">Profile</a></li>
                    <li><a class="dropdown-item" href="<?=base_url()?>auth/signout">Signout</a></li>
                  </ul>
                </li>

              </ul>
            </div>
          </div>
        </nav>
      </section>
      <section id="content" class="mb-3">
        <?php if(isset($viewFile)){ $this->load->view($viewFile);} ?>
      </section>
    </div>

    <script src="<?=base_url()?>assets/js/bootstrap5.min.js"></script>

    <!-- Vanilla Datepicker JS -->
    <script src='https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js'></script>

    <?php if(isset($jsFile)){ $this->load->view($jsFile);} ?>

    <script>
      const getDatePickerTitle = elem => {
        // From the label or the aria-label
        const label = elem.nextElementSibling;
        let titleText = '';
        if (label && label.tagName === 'LABEL') {
          titleText = label.textContent;
        } else {
          titleText = elem.getAttribute('aria-label') || '';
        }
        return titleText;
      }

    const elems = document.querySelectorAll('.datepicker_input');
    for (const elem of elems) {
      const datepicker = new Datepicker(elem, {
        'format': 'dd-M-yyyy',
        title: getDatePickerTitle(elem)
      });
    }    

    </script>


  </body>
</html>