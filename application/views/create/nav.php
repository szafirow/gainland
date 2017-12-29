<!-- Nav-->
<nav class="navbar navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"> <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="img"
                                               class="logo img-responsive"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="container">
            <ul class="nav navbar-nav navbar-left">
                <li class="nohover"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> Online: 0</a></li>
                <li class="nohover"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Zarejestrowanych: 0</a>
                </li>
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