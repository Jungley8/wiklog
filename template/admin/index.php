<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('admin/include/meta');?>
</head>
<body>
<body>
  <?php $this->load->view('admin/include/header');?>
  <div class="container-fluid app">
    <div class="row">
      <?php $this->load->view('admin/include/sidebar');?>
      <div class="main-content">
        <div class="main-content-inner">

          <?php $this->load->view('admin/include/footer');?>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('admin/include/scripts');?>
</body>
</html>