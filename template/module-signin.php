<?php
@session_start();
?>

<div class="content">


    <div class="section1 col-sm-11"></div>

    <form class="signin col-sm-6" action="" name="signinform" method="post">
        <div class="form-group row justify-content-center">
            <label for="email" class="col-sm-2 col-form-label offset-2">Email</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
        </div>

        <br />

        <div class="form-group row justify-content-center">
            <label for="password" class="col-sm-2 col-form-label offset-2">Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
        </div>

        <br />
        <div class="row">
            <button type="submit" class="btn btn-primary formsubmit col-sm-2" value="submit" name="submit">Log in</button>
        </div>
        <p class="col-sm-2">If you do not have an account you can <a href="register.html">Register</a></p>

    </form>
    <div class="row">
    </div>
</div>
</div>