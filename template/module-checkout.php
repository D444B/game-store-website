<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="section1 col-sm-11"></div>

<br />
<div class="abouttxt col-sm-6 offset-2 justify-content-center">
    <?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $type = $_POST['radios'];
    $game = $_POST['select'];
    $card = $_POST['card'];

    class Checkout
    {
        public $name, $email, $address, $type, $game, $card;
        function __construct($name, $email, $address, $type, $game, $card)
        {
            $this->name = $name;
            $this->email = $email;
            $this->address = $address;
            $this->type = $type;
            $this->game = $game;
            $this->card = $card;
        }





        public function display()
        {
            echo "<p>Name: " . $this->name . "<br/>" . "Email: " .  $this->email . "<br/>" . "Address: " .  $this->address . "<br/>" . "Type: " .  $this->type . "<br/>" . "Game: " .  $this->game . "<br/>" . "Card ending in: " . substr($this->card, -4) . "<br/></p>";
        }
    }

    $c = new Checkout($name, $email, $address, $type, $game, $card);
    echo "<div class=\"all\">";
    $c->display();


    $connect = new mysqli("localhost", "korisnik", "singidunum", "game_store") or die();
    $sql = "SELECT price FROM `game` WHERE game.name = " . "\"" . $c->game . "\"" . ";";
    $result = $connect->query($sql) or die();
    try {
        echo "<p> Price: " . implode($result->fetch_assoc()) . " euro.<br/></p>";
    } catch (Exception $e) {
        echo "Could not fetch price";
    }


    //----------------- PROVERITI OVDE STA DALJE
    //PREPORUCENA IGRA, KOD NE RADI, nije ispravan sql upit



    // $sql = "SELECT game.name FROM game, recommendation WHERE game.game_id = `recommendation`.recommended_game_id AND (SELECT game.game_id FROM game WHERE game.name = " .  "\""  .  $c->game . "\") = recommendation.recommended_game_id;"; 
    // $result = $connect->query($sql) or die();
    // echo "<p> Recommended game to purchase as well: " . implode($result->fetch_assoc()) . "<br/></p>";


    //--------- LOSE DIZAJNIRANA BAZA, NE RADI JER NEMA ID KOJI NE POSTOJI JER NISAM URADIO REGISTRACIJU

    if (@$_SESSION['signedin'] == 1) {
        $sql = "INSERT INTO `user_game` (`user_id`, game_id, card_number) SELECT " . $_SESSION['user_id'] . ", game.game_id" . "," . $c->card . "" . "  FROM `game` WHERE game.name = " . "\"" . $c->game . "\"" . ";";
        $result = $connect->query($sql) or die();
        echo "<p>Card number has been inserted into the database</p>";
    } else {
        $sql = "INSERT INTO `user_game` (`user_id`, game_id, card_number) SELECT 1 , game.game_id" . "," . $c->card . "" . "  FROM `game` WHERE game.name = " . "\"" . $c->game . "\"" . ";";
        $result = $connect->query($sql) or die();
        echo "<p>Card number has been inserted into the database</p>";
    }


    $connect->close();
    if (isset($_COOKIE['time'])) {
        echo "<p>You have visited the index page at exactly " . $_COOKIE['time'] . " local time, today.</p>";
    } else {
        echo "<p>You have not visited the index page yet, visit it to see the visit time here in the future!</p>";
    }

    echo "</div>";
    ?>
</div>

</div>