<?php
//var_dump($_SESSION);
?>

<style>
    body {
        background: url('/img/body-background.jpg');
        background-size:cover;
    }
</style>




<div class="col-lg-6">
    <img style="width:100%" src="/img/logo.jpg" />
</div>

<div class="col-lg-6 login-panel">
    <div class="panel panel-default">
        <div class="panel-heading">
            Sign In
        </div>
        <div class="panel-body">
            <form method="post">

                <div class="text-center">
                    <p style="color: red"><b><?php if(isset($ErrorLogin)){ echo $ErrorLogin;} //добавили вывод о неверном вводе логина или пароля?></b></p>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" />
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary form-control" value="Sign In" />
                </div>
                <p class="text-center">
                    <a href="/signup">Sign Up</a>
                </p>
            </form>
        </div>
    </div>
</div>