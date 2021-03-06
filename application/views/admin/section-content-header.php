<section class="content-header">
    <?php
    echo generateBreadcrumb();
    ?>
</section>

<section class="content-header">

    <?php
    if (($this->session->flashdata('item'))) {
        $message = $this->session->flashdata('item');
        ?>

        <div class="alert alert-<?php echo $message['class']; ?> alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"
                                                                                              style="color: #000;">×</span>
            </button>
            <p class="alert-body"><?php echo $message['message']; ?></p>
        </div>
        <?php
    }
    ?>
</section>