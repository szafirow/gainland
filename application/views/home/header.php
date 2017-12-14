<!-- Header -->
<header>
    <div class="overlay"></div>
    <div class="container">

        <div class="row col-md-12" style="padding-top:60px">
            <?php
            if (($this->session->flashdata('item'))) {
                $message = $this->session->flashdata('item');
                ?>

                <div class="alert alert-<?php echo $message['class']; ?> alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"
                                                                                                      style="color: #000;">×</span>
                    </button>
                    <p class="alert-body"><?php echo $message['message']; ?></p>
                </div>';
                <?php
            }
            ?>

        </div>

        <div class="row">
            <?php $this->load->view('home/header/header-left.php'); ?>
            <?php $this->load->view('home/header/header-right.php'); ?>
        </div>
    </div>
</header>