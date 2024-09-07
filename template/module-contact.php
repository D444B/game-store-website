<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="content">


    <div class="section1 col-sm-11"></div>

    <br />
    <div class="form-bg">
        <form class="form1" action="" name="contactform" method="post">
            <div class="form-group row justify-content-center">
                <label for="name" class="col-sm-2 col-form-label offset-2">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" placeholder="Your name" required pattern="^[a-zA-Z]+$" onkeyup="validate(this.id, /^[a-zA-Z]+$/)">
                </div>
            </div>

            <br />

            <div class="form-group row justify-content-center">
                <label for="email" class="col-sm-2 col-form-label offset-2">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" placeholder="Email" required onkeyup="validate(this.id, /(.+)@(.+){2,}\.(.+){2,}/)">
                </div>
            </div>

            <br />

            <div class="form-group row justify-content-center">
                <label for="subject" class="col-sm-2 col-form-label offset-2">Subject</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="subject" placeholder="Subject" required>
                </div>
            </div>

            <br />




            <div class="form-group row justify-content-center">
                <label for="Message" class="col-sm-2 col-form-label offset-2">Message</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="message" rows="3" placeholder="Message" maxlength="500" required></textarea>
                </div>
            </div>

            <div class="row">
                <button type="submit" class="btn btn-primary formsubmit col-sm-2" value="submit" name="submit">Submit</button>
            </div>

        </form>

    </div>
</div>