
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Monkeys E-sport</title>
    <link rel="stylesheet" href="style_regisztracio.css">
</head>
<body>
    <header>
        <a href="#" class="logo">Gas Monkeys E-Sport</a>
        <ul>
            <li>
                <a href="főoldal.php">Főoldal</a>
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
                <a href="regisztracio.php" class="aktiv">Bejelentkezés</a>
            </li>
        </ul>
    </header>
    <section>
        <img src="kepek/csillagok.png" id="csillagok">
        <img src="kepek/hegyek_szemben.png" id="hegyek_szemben">
        <img src="kepek/hegyek_hatul.png" id="hegyek_hatul">
        <div class="container">
            <div class="card">
                <div class="inner-box" id="card">
                    <div class="card-front">
                        <h2>BEJELENTKEZÉS</h2>
                        <?php echo display_error(); ?>
                        <form action="regisztracio.php" method="post">
                            <input type="text" name="log_uName" class="input-box" placeholder="Felhasználónév" required>
                            <input type="password" name="log_uPass" class="input-box" placeholder="Jelszó" required>
                            <button type="submit" name="login_btn" class="submit-btn">Bejelentkezés</button>
                            <input type="checkbox"><span>Emlékezz Rám</span>
                        </form>
                        <button type="button" class="btn" onclick="openRegisztráció()">Még nics fiókom!</button>
                        <a href="">Elfelejtette jelszavát?</a>
                    </div>
                    <div class="card-back">
                        <h2>REGISZTRÁCIÓ</h2>
                        <?php echo display_error(); ?>
                        <form action="regisztracio.php" method="post">
                            <input type="text" name="reg_uName" class="input-box" placeholder="Felhasználónév" required>
                            <input type="email" name="reg_uEmail" class="input-box" placeholder="E-mail" required>
                            <input type="password" name="reg_uPass" class="input-box" placeholder="Jelszó" required>
                            <input type="password" name="reg_uPassConf" class="input-box" placeholder="Jelszó mégegyszer" required>
                            <button type="submit" name="register_btn" class="submit-btn">Regisztráció</button>
                            <input type="checkbox"><span>Emlékezz Rám</span>
                        </form>
                        <button type="button" class="btn"onclick="openBejelentkezés()">Van már fiókom!</button>
                        <a href="">Elfelejtette jelszavát?</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="kod_regisztracio.js"></script>
</body>
</html>