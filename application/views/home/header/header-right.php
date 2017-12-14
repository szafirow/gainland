<div class="col-lg-5">

    <!-- login-->
    <div id="loginbox">
        <div class="panel panel-login">
            <div class="panel-heading">
                <div class="panel-title">Logowanie</div>
            </div>

            <div class="panel-body">
                <?php $this->load->view('home/header/login.php'); ?>
            </div>
        </div>
    </div>
    <div id="signupbox" style="display:none;">
        <div class="panel panel-login">
            <div class="panel-heading">
                <div class="panel-title">Załóż darmowe konto!</div>
            </div>

            <div class="panel-body">
                <?php $this->load->view('home/header/register.php'); ?>
            </div>
        </div>


    </div>
    <!-- end login-->

</div>