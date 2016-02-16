<style>
    body {
        background: url('/img/login_signup_bg2.jpg');
        background-size:cover;
    }
</style>

<div>
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Sign Up
            </div>
            <div class="panel-body">
                <form method="POST">

                    <div class="text-center">
                        <p style="color: red"><b><?php if(isset($userExists)){ echo $userExists;} //добавили вывод о том что пользователь уже существует?></b></p>
                    </div>


                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" />
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" />
                    </div>

                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" class="form-control" name="password-confirm" />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary form-control" />
                    </div>

                    <p class="text-center">
                        <a href="/">Back to Sign In page</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>