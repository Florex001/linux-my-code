<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Monkeys E-sport</title>
    <link rel="stylesheet" href="stylerolunk.css">
</head>
<body>
    <header>
        <a href="főoldal.html" class="logo" >Gas Monkeys E-Sport</a>
        <ul>
            <li>
                <a href="főoldal.php" >Főoldal</a>
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
                <a href="rolunk.php" class="aktiv">Rólunk</a>
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
    <section>
        <img src="kepek/csillagok.png" id="csillagok" class="img-fluid">
        <img src="kepek/hold.png" id="hold" class="img-fluid">
        <img src="kepek/hegyek_hatul.png" id="hegyek_hatul" class="img-fluid">
        <img src="kepek/hegyek_szemben.png" id="hegyek_szemben" class="img-fluid">
        <p id="szoveg">
            Ez a weblap egy verseny céljából készült!
        </p>
    </section>
    
</body>
</html>