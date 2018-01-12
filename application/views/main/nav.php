<!-- Nav-->
<nav class="navbar main-navigation navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"> <img src="assets/img/logo.png" alt="img" class="logo img-responsive"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="container">
            <ul class="nav navbar-nav navbar-left">
                <li class="nohover"><a href="#"><i class="fa fa-gamepad" aria-hidden="true"></i>
                        Zalogowany: <?php echo $login; ?></a></li>
                <li class="nohover"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> Online: 0</a></li>
                <li class="nohover"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Zarejestrowanych: 0</a>
                </li>
                <li><p class="navbar-btn">
                        <a href="#" class="btn btn-danger-pro"><i class="fa fa-star-o" aria-hidden="true"></i>
                            Premium</a>
                    </p></li>
                <li><a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i> Notatki</a></li>
                <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Ustawienia</a></li>
                <li><a href="#"><i class="fa fa-question" aria-hidden="true"></i> Pomoc</a></li>

                <?php if ($logged_in && $rank == '2'): ?>
                    <li><a href="<?php echo base_url('admin/dashboard') ?>">
                    <span class="icon-panel">
                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                class="path4"></span><span class="path5"></span><span class="path6"></span><span
                                class="path7"></span><span class="path8"></span><span class="path9"></span><span
                                class="path10"></span><span class="path11"></span><span class="path12"></span><span
                                class="path13"></span><span class="path14"></span><span class="path15"></span><span
                                class="path16"></span><span class="path17"></span><span class="path18"></span><span
                                class="path19"></span><span class="path20"></span><span class="path21"></span>
                    </span>
                            PA</a></li>
                <?php endif; ?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url('user/logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i>
                        Wyloguj się</a></li>
                <li></li>
            </ul>
        </div>
    </div>
</nav>
<!-- /nav -->