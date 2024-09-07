<?php
if (@$_SESSION['admin'] == 1) {

    $connect = mysqli_connect("localhost", "korisnik", "singidunum", "game_store");


    // $sql1 = "SELECT game.game_id, game.name, company.name AS company_name FROM `game` LEFT JOIN `company` ON `game`.company_id = company.company_id;";
    // $category1 = mysqli_query($connect, $sql1) or die();
    // $ctg1 = mysqli_fetch_array($category1, MYSQLI_ASSOC);



    $order = "";
    $between = "";


    if (!isset($_SESSION['sql'])) {

        $_SESSION['sql'] = "SELECT game.game_id, game.price, game.name, COUNT(`user_game`.game_id) AS game_count FROM `user_game` RIGHT JOIN game ON `game`.game_id = `user_game`.`game_id` GROUP BY `game`.game_id;";
    }

    // if (isset($_POST['submit'])) {
    //     $sort = $_POST['sort'];
    //     if ($sort == 'desc') {
    //         $_SESSION['sql'] =  "SELECT game.game_id, game.price, game.name, COUNT(`user_game`.game_id) AS game_count FROM `user_game` RIGHT JOIN game ON `game`.game_id = `user_game`.`game_id` GROUP BY `game`.game_id ORDER BY game.price DESC;";
    //     } else if ($sort == 'asc') {
    //         $_SESSION['sql'] = "SELECT game.game_id, game.price, game.name, COUNT(`user_game`.game_id) AS game_count FROM `user_game` RIGHT JOIN game ON `game`.game_id = `user_game`.`game_id` GROUP BY `game`.game_id ORDER BY game.price ASC;";
    //     } else {
    //         $_SESSION['sql'] = "SELECT game.game_id, game.price, game.name, COUNT(`user_game`.game_id) AS game_count FROM `user_game` RIGHT JOIN game ON `game`.game_id = `user_game`.`game_id` GROUP BY `game`.game_id;";
    //     }
    //     header("location: index.php?module=admin");
    // }

    if (isset($_POST['filter'])) {

        $sort = $_POST['sort'];
        if ($sort == 'desc') {
            $order =  " ORDER BY game.price DESC";
        } else if ($sort == 'asc') {
            $order =  " ORDER BY game.price ASC";
        } else {
            $order = "";
        }

        if (isset($_POST['lowvalue']) && isset($_POST['highvalue']) && $_POST['lowvalue'] != "" && $_POST['highvalue'] != "") {
            $lowValue = $_POST['lowvalue'];
            $highValue = $_POST['highvalue'];
            $between = " HAVING COUNT(`user_game`.game_id) BETWEEN " . $lowValue . " AND " . $highValue;
        } else {
            $between = "";
        }

        $_SESSION['sql'] = "SELECT game.game_id, game.price, game.name, COUNT(`user_game`.game_id) AS game_count FROM `user_game` RIGHT JOIN game ON `game`.game_id = `user_game`.`game_id` GROUP BY `game`.game_id" . $between . $order .   ";";



        // $_SESSION['sql'] = "SELECT game.game_id, game.price, game.name, COUNT(`user_game`.game_id) AS game_count FROM `user_game` RIGHT JOIN game ON `game`.game_id = `user_game`.`game_id` GROUP BY `game`.game_id HAVING COUNT(`user_game`.game_id) BETWEEN " . $lowValue . " AND " . $highValue . ";";

        header("location: index.php?module=admin");
    }
    if (isset($_POST['reset'])) {
        $_SESSION['sql'] = "SELECT game.game_id, game.price, game.name, COUNT(`user_game`.game_id) AS game_count FROM `user_game` RIGHT JOIN game ON `game`.game_id = `user_game`.`game_id` GROUP BY `game`.game_id;";
        header("location: index.php?module=admin");
    }







    $sql2 = $_SESSION['sql'];
    $category2 = mysqli_query($connect, $sql2) or die();



?>
    </br>
    <div class="table col-sm-11">
        <table class="table table-bordered">
            <tr>
                <th>Game</th>
                <th>Number of games sold</th>
                <th>% of total sales</th>
                <th>Price per unit</th>
                <th>Value per unit</th>
                <th>% of total income</th>
            </tr>
            <?php
            $total = 0;
            $percentage = 0;
            $totalPrice = 0;
            $pricePercentage = 0;

            while ($ctg2 = mysqli_fetch_array($category2, MYSQLI_ASSOC)) {
                $value = (int)$ctg2['game_count']; //broj igara
                $total += $value;
                $value2 = (float)$ctg2['price'] * $value; // ukupna cena igre
                $totalPrice += $value2;
            }
            mysqli_data_seek($category2, 0);
            // dozvoljava drugi loop kroz sql

            while ($ctg2 = mysqli_fetch_array($category2, MYSQLI_ASSOC)) {
                $value = (int)$ctg2['game_count']; //broj igara
                $value2 = (float)$ctg2['price']; //cena druge igre
                $valuePerUnit = $value * $value2;
                if ($total != 0) {
                $percentage = $value / $total * 100;
                } else {
                    $percentage = 0;
                }
                if ($totalPrice != 0) {
                    $pricePercentage = $valuePerUnit / $totalPrice * 100;
                } else {
                        $pricePercentage = 0;
                }

                echo "<tr><td>" . $ctg2['name'] . "</td><td>" . $ctg2['game_count'] . "</td><td>" . number_format($percentage, 2) . "%" . "</td><td>" . $ctg2['price'] . "</td><td>" . $valuePerUnit . "</td><td>" .  number_format($pricePercentage, 2) . "%" . "</td></tr>";
            }
            ?>
        </table>
    </div>
    <?php

    echo "<div class=\"values\">";
    echo "<p>Number of sold games = " . $total .  "</p>";
    echo "<p>Total price of all sold games = " . $totalPrice .  "</p>";


    ?>
    
    <form class="form3" name="json" method="post" enctype="multipart/form-data">
        <input class="btn btn-primary formsubmit col-sm-2" type="submit" value="JSON DL" name="download">
    </form>
    <!-- </br>
    <p>SORT</p>
    </br>
    <form class="form3" name="sort" method="post" enctype="multipart/form-data">
        <select name="sort">
            <option>Order by ...</option>
            <option value="desc">Price descending</option>
            <option value="asc">Price ascending</option>
            <option value="default">Default</option>
            <br />
            <input class="btn btn-primary formsubmit col-sm-2" type="submit" value="Sort" name="submit" onclick="this.form.submit()">
        </select>
    </form> -->




    </br>
    <p>Number of games sold between low and high value and their order</p>
    </br>
    <form class="form3" name="filter" method="post" enctype="multipart/form-data">
        <select name="sort" class="form-select">
            <option>Order by ...</option>
            <option value="desc">Price descending</option>
            <option value="asc">Price ascending</option>
            <option value="default">Default</option>
            <br />
        </select>





        </br>
        <input type="number" placeholder="Low value" name="lowvalue" class="form-control"></input>
        <input type="number" placeholder="High value" name="highvalue" class="form-control"></input>
        </br>
        </br>
        <input class="btn btn-primary formsubmit col-sm-2" type="submit" value="Apply" name="filter" onclick="this.form.submit()">
        <input class="btn btn-primary formsubmit col-sm-2" type="submit" value="Reset" name="reset" onclick="this.form.submit()">
    </form>




<?php

    if (isset($_POST['download'])) {
        mysqli_data_seek($category2, 0);
        // dozvoljava treci loop kroz sql
        $jsonData = mysqli_fetch_all($category2, MYSQLI_ASSOC);
        file_put_contents('jsonData.json', json_encode($jsonData, JSON_UNESCAPED_UNICODE));
    }



    echo "</div>";
    mysqli_close($connect);
} else {
    echo "<p>Log in as an administrator to see this page</p>";
}
?>