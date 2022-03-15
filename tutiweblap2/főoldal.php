<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Monkeys E-sport</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--Navigáció-->
    <header>
        <a href="főoldal.html" class="logo" >Gas Monkeys E-Sport</a>
        <ul>
            <li>
                <a href="főoldal.php" class="aktiv">Főoldal</a>
            </li>
            <li>
            <?php 
    include('functions.php');
    global $db, $errors;

    if (!isLoggedIn()) {
        echo '';
    } else {
    
           echo '<a href="verseny.php">Versenyeink</a>';
    }

    ?>
            </li>
            <li>
                <a href="rolunk.php">Rólunk</a>
            </li>
            <li>
            <?php

       

        if (!isLoggedIn()) {
            echo '<a href="regisztracio.php">Bejelentkezés</a>';
        } else {
            $sid = $_SESSION['user']['id'];
            $quiery = 'SELECT username FROM accounts WHERE id = "'. $sid .'"';
            $felhasznalonev = mysqli_query($db, $quiery);
            $row = $felhasznalonev -> fetch_array(MYSQLI_BOTH);
   			$uname = $row[0];

               echo '<a href="profil.php?id='. $sid .'">'. $uname .'</a>';
        }

        ?>
                
            </li>
        </ul>
    </header>
    <!--Képek-->
    <section>
        <img src="kepek/csillagok.png" id="csillagok" class="img-fluid">
        <img src="kepek/hold.png" id="hold" class="img-fluid">
        <img src="kepek/hegyek_hatul.png" id="hegyek_hatul" class="img-fluid">
        <h2 id="szoveg">Légy Győztes!</h2>
        <a href="#sec" id="gomb">Csatlakozz</a>
        <img src="kepek/hegyek_szemben.png" id="hegyek_szemben" class="img-fluid">
    </section>
    <!--Szöveg Rész-->
    <div class="sec" id="sec">
        <h2 id="szoveg2">Légy csapat tagunk még ma!</h2>
        <p id="szoveg3">Nálunk megtalálod azt az E-sport játékot, amiben erősnek érzed magad.</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/k9UhAD9esOY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" id="video1" ></iframe>
        <p id="szoveg3">Játékaink</p>
        <!--Játék-->
    <div class="container">
        <article class="art1">
            <div class="container">
                <div class="card">
                    <div class="inner-box" id="card">
                        <div class="card-front">
                            <button type="button" class="btn" onclick="openElolap()" id="comb" >CS:GO</button>
                        </div>
                        <div class="card-back">
                            <p>A <strong>Counter-Strike: Global Offensive</strong> (röviden: CS:GO) online csapatalapú first-person shooter, amelyet a <strong>Valve Corporation</strong> és a <strong>Hidden Path Entertainment</strong> fejleszt, akik korábban a <strong>Counter-Strike: Source</strong> frissítéseiért is feleltek. Ez a negyedik része a <strong>Counter-Strike</strong> sorozatnak, leszámítva a <strong>Counter-Strike: Neo</strong> és a <strong>Counter-Strike: Online</strong> játékokat.</p>
                            <p>A <strong>Global Offensive</strong> kiadási időpontja 2012. augusztus 21. <strong>Microsoft Windows, OS X, PlayStation 3, Xbox 360</strong> és <strong>Linux</strong> platformokon egyaránt. </p>
                            <button type="button" class="btn"onclick="openHatlap()">Vissza</button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article class="art1">
            <div class="container">
                <div class="card1">
                    <div class="inner-box" id="kartya">
                        <div class="card-front1">
                            <button type="button" class="btn" onclick="openElolap1()" id="comb" >Valorant</button>
                        </div>
                        <div class="card-back1">
                            <p>A játék keresztezi a <strong>Counter-Strike</strong>, az <strong>Siege</strong>, az <strong>Overwatch</strong> és a <strong>Team Fortress 2</strong> csipetét. Noha távolról sem másról van szó, megpróbálja egyesíteni az egyes elemeket, hogy valami egyediet hozzon létre. A <strong>CS:GO</strong> lassabb, kerek felépítése teljes kijelzőn van, vásárlási menükkel, míg a <strong>Overwatch</strong> és a <strong>Team Fortress 2</strong> karakterképességekben és a <strong>"Hero-Shooter"</strong> stílusban jelenik meg. </p>
                            <p>Vizuálisan a játék sokkal inkább az utóbbihoz hasonló. A <strong>Riot Games</strong> segítségével egyértelműen a <strong>Blizzard</strong> képletét használva a játékot a lehető legtöbb ember számítógépére lehet helyezni, művészeti stílus használatával, nem pedig a realizmus felé.</p>
                            <button type="button" class="btn"onclick="openHatlap1()">Vissza</button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article class="art1">
            <div class="container">
                <div class="card2">
                    <div class="inner-box" id="kartya1">
                        <div class="card-front2">
                            <button type="button" class="btn" onclick="openElolap2()" id="comb" >Dota 2</button>
                        </div>
                        <div class="card-back2">
                            <p>A <strong>DOTA 2</strong> (Defense of the Ancients 2) egy <strong>MOBA</strong>, a <strong>Defense of the Ancients</strong> videójáték felújított, különálló verziója, melyet a <strong>Valve Corporation</strong> készített el a <strong>Source Engine</strong> felhasználásával. Kiadására kizárólag a <strong>Steam</strong> áruházában került sor (<strong>Windows</strong> alatt 2013. július 9-én, <strong>Linux</strong>, illetve <strong>Mac</strong> rendszerekre 2013. július 18-án).</p>
                            <p>A játék ingyenesen játszható, a felhasználóknak azonban lehetőségük van további, kozmetikai tartalmak vásárlására, melyek a játék és a játszott hősök külsejét változtathatják meg. A vásárolható tartalmak túlnyomó része a <strong>Steam</strong> alkalmazáson keresztül cserélhető.</p>
                            <button type="button" class="btn"onclick="openHatlap2()">Vissza</button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>

    <!--JavaScript-->
    <script src="kod.js"></script>
</body>
</html>