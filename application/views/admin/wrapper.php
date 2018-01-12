<!--Menu-->
<?php
$this->load->view('admin/menu-header.php');
$this->load->view('admin/menu-sidebar.php');
?>

<!-- Content -->
<div class="content-wrapper">
    <!-- Content Header -->
    <?php
    $this->load->view('admin/section-content-header');
    ?>

    <!-- Main content -->
    <?php
    $this->load->view('admin/section-content');
    ?>
</div>
<!-- /.content-wrapper -->


