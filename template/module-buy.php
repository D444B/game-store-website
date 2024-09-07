<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="content">


    <div class="section1 col-sm-11"></div>

    <br />
    <div class="form-bg">
        <form class="form1" action="./index.php?module=checkout" name="buyform" method="post">
            <div class="form-group row justify-content-center">
                <label for="name" class="col-sm-2 col-form-label offset-2">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required pattern="^[a-zA-Z]+ [a-zA-Z]+$" onkeyup="validate(this.id, /^[a-zA-Z]+ [a-zA-Z]+$/)">
                </div>
            </div>

            <br />

            <div class="form-group row justify-content-center">
                <label for="email" class="col-sm-2 col-form-label offset-2">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required onkeyup="validate(this.id, /(.+)@(.+){2,}\.(.+){2,}/)">
                </div>
            </div>

            <br />

            <div class="form-group row justify-content-center">
                <label for="address" class="col-sm-2 col-form-label offset-2">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                </div>
            </div>

            <br />

            <fieldset class="form-group">
                <div class="row  justify-content-center">
                    <legend class="col-form-label col-sm-2 offset-2">Choose</legend>
                    <div class="col-sm-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radios" id="radio1" value="digital" checked>
                            <label class="form-check-label" for="radio1">
                                Digital
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radios" id="radio2" value="physical">
                            <label class="form-check-label" for="radio1">
                                Physical
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <br />

            <div class="form-group row justify-content-center">
                <div class="col-sm-2 offset-2">Games</div>

                <div class="dropdown col-sm-6">
                    <select class="form-select" name="select" id="select">
                        <?php include './modules/module-buy/module-buy-sql.php'; ?>
                        <?php
                        //asocijativni niz, MYSQLI_ASSOC (mapa), govori nizu da vraca kao asocijativni array
                        //ctg = skraceno od category
                        while ($ctg = mysqli_fetch_array($category, MYSQLI_ASSOC)) {
                        ?>
                            <option value="<?php echo $ctg["name"]; ?>">
                                <?php echo $ctg["name"] . " - " . $ctg["company_name"]; ?>
                            </option>
                        <?php }
                        mysqli_close($connect); ?>
                    </select>


                </div>



                <!-- <div class="col-sm-6">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check1">
        <label class="form check label" for="check1">Game 1</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check2">
        <label class="form check label" for="check2">Game 2</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check3">
        <label class="form check label" for="check3">Game 3</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check3">
        <label class="form check label" for="check3">Game 3</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check3">
        <label class="form check label" for="check3">Game 3</label>
    </div>
</div> -->




            </div>



            <br />


            <div class="form-group row justify-content-center">
                <label for="card" class="col-sm-2 col-form-label offset-2">Card Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="card" name="card" placeholder="Card Number" required pattern="^[0-9]{16}$" required onkeyup="validate(this.id, /^[0-9]{16}$/)">
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary formsubmit col-sm-2" value="submit" name="checkout">Submit</button>
            </div>
        </form>

    </div>


</div>