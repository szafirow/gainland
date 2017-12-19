<?php if (validation_errors()) {
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <strong><?php echo validation_error(); ?></strong>
        <?php echo $_SESSION; ?>
    </div>
    <?php
}
?>


<form id="loginform" class="form-horizontal" role="form" action="<?php echo site_url("user/login"); ?>"
      accept-charset="UTF-8" method="POST">

    <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" name="login_log"
               value="" placeholder="login lub email">
    </div>

    <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <input type="password" class="form-control" name="password_log"
               placeholder="password">
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <input type="submit" class="btn btn-danger-pro btn-block" value="LOGIN">
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-12 control">
            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                Nie masz jeszcze konta?
                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                    Zarejestruj się za darmo
                </a>
            </div>
        </div>
    </div>
</form>