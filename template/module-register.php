<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="content">


    <div class="section1 col-sm-11"></div>

    <form class="signin col-sm-6" name="registerform" method="post">
        <div class="form-group row justify-content-center">
            <label for="email" class="col-sm-2 col-form-label offset-2">Email</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
        </div>

        <br />

        <div class="form-group row justify-content-center">
            <label for="password" class="col-sm-2 col-form-label offset-2">Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
        </div>

        <br />

        <div class="form-group row justify-content-center">
            <label for="repeat" class="col-sm-2 col-form-label offset-2">Repeat Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="repeat" name="repeat" placeholder="Repeat Password">
            </div>
        </div>

        <br />
        <div class="row">
            <button type="submit" class="btn btn-primary formsubmit col-sm-2" value="submit" name="submit">Register</button>
        </div>

    </form>
    <div class="row">



    </div>

</div>


</div>