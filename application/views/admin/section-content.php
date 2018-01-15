<section class="content">
    <?php
    $uri = $this->uri->segment(2);
    //var_dump($uri); exit();
    if ($uri == 'dashboard'):
        $this->load->view('admin/content/dashboard');
    elseif ($uri == 'settings'):
        $this->load->view('admin/content/settings');
    endif;
    ?>
</section>