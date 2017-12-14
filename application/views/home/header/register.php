<form id="signupform" class="form-horizontal" role="form" action="user/register" accept-charset="UTF-8" method="POST">
    <input type="hidden" name="page" value="register">
    <div class="form-group">
        <label class="col-md-3 control-label">Login</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="login_reg" placeholder="np. jasio342">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">E-mail</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="email_reg" placeholder="np. jasio342@wp.pl">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Hasło</label>
        <div class="col-md-9">
            <input type="password" class="form-control" name="password_reg" placeholder="np. A$23@3!wE4Z">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Powtórz hasło</label>
        <div class="col-md-9">
            <input type="password" class="form-control" name="repeat_password_reg" placeholder="np. A$23@3!wE4Z">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Polecający</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="recommended_reg" value="admin">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-9">
            <input type="checkbox" name="rules_reg">
            Akceptuje regulamin
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <input type="hidden" name="register" value="1"/>
            <input type="submit" class="btn btn-danger-pro btn-block" value="REGISTER">
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-12 control">
            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                Masz już konto?
                <a href="#"
                   onclick="$('#signupbox').hide(); $('#loginbox').show()">Zaloguj się</a>
            </div>
        </div>
    </div>


</form>