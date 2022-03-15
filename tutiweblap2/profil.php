<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Monkeys E-sport</title>
    <link rel="stylesheet" href="profil_style.css">
</head>
<body>
    <header>
        <a href="főoldal.html" class="logo">Gas Monkeys E-Sport</a>
        <ul>
            <li>
                <a href="főoldal.php" >Főoldal</a>
            </li>
            <li>
                <a href="verseny.php">Versenyeink</a>
            </li>
            <li>
                <a href="rolunk.php">Rólunk</a>
            </li>
            <li>
                <a href="logout.php">Kijelentkezés</a>
            </li>
        </ul>
    </header>
    <section>
        <img src="kepek/csillagok.png" id="csillagok">
    </section>
    <div class="container">
        <div class="profile-box">
            <img src="kepek/menu.png" class="menu-icon">
            <img src="kepek/beallitasok.png" class="beallitasok-icon">
            <img src="kepek/felhasznalo.png" class="felhasznalo-icon">
            <?php
global $db, $errors, $id;
		include('functions.php');
		if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: regisztracio.php');
}
    $idn = $_GET['id'];
    $quiery = 'SELECT username FROM accounts WHERE id = "'. $idn .'"';
    $felhasznalonev = mysqli_query($db, $quiery);
    $row = $felhasznalonev -> fetch_array(MYSQLI_BOTH);
   			$uname = $row[0];

    echo '<h3>'. $uname .'</h3>';

?>
            
            <!--Ide írja majd a felhasználó a saját szövegét!-->
            <div class="profil-alja">
                <form action="profil.php" method="post"> 
                    <ol>
                        <li>
                            <h3>Csapat Adatai:</h3>
                        </li>
                        <li class="lista">
                            <p>Csapat neve:</p>
                            <input type="text" name="group_Name" class="input-box" placeholder="" required>
                        </li>
                        <li>
                            <p>Tag1:</p>
                            <input type="text" name="group_mem1" class="input-box" placeholder="" required>
                        </li>
                        <li>
                            <p>Tag2:</p>
                            <input type="text" name="group_mem2" class="input-box" placeholder="" required>
                        </li>
                        <li>
                            <p>Tag3:</p>
                            <input type="text" name="group_mem3" class="input-box" placeholder="" required>
                        </li>
                        <li>
                            <p>Tag4:</p>
                            <input type="text" name="group_mem4" class="input-box" placeholder="" required>
                        </li>
                        <li>
                            <p>Tag5:</p>
                            <input type="text" name="group_mem5" class="input-box" placeholder="" required>
                        </li>
                        <li>
                            <p>Nevezés ideje:</p>
                            <input type="date" name="group_date" class="input-box" placeholder="">
                        </li>
                        <li>
                        <button type="submit" name="group_btn" class="submit-btn">Jelentkezés</button>
</li>
                    </ol>
                </form>
            </div>
    </div>
</body>
</html>