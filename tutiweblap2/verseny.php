
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
        <img src="kepek/hegyek_szemben.png" id="hegyek_szemben" class="img-fluid">
        <a href="#sec" id="gomb">Csapatok</a>
    </section>

    
    <article>
    <h3 style="text-align:center;">Ha a csapatod vesztett töröld a listából!</h3>
    <div class="container" id="sec">
        <article class="art1">
            <div class="container">
                
                        <?php

			

            $query = 'SELECT id, group_name, member1, member2, member3, member4 ,member5 , group_date FROM groups'; 
   			$result = mysqli_query($db, $query);
    		
    		$datas = array();
    		 if (mysqli_num_rows($result) > 0) {
    		 	while($row = mysqli_fetch_assoc($result)){
    		 		$datas[] = $row;
    		 	}
    		 }

             foreach($datas as $data)
{
            $gr_id = $data['id'];
            $gr_name = $data['group_name'];
			$gr_member1 = $data['member1'];
			$gr_member2 = $data['member2'];
            $gr_member3 = $data['member3'];
            $gr_member4 = $data['member4'];
            $gr_member5 = $data['member5'];
			$gr_date = $data['group_date'];

            echo ' 
            <div class="card">
                    <div class="inner-box" id="card">
                        <div class="card-front4">
                        </div>
            <div class="card-back4">
            <h1>Csapatnév</h1>
            <p> '. $gr_name .' </p>
            <br>
            <h1>Csapat tagok</h1>
            <p> '. $gr_member1 .', '. $gr_member2 .', '. $gr_member3 .', '. $gr_member4 .', '. $gr_member5 .', </p>
            <br>
            <h1>Csapat nevezésének dátuma</h1>
            <p> '. $gr_date .' </p>
            <form method="post" action="verseny.php?id='. $gr_id .'">
                    <input type="submit" name="gr_del" value="Törlés">
                </form>
            
        </div> 
        </div>
                </div>';
}

            ?>
                       
                
            </div>
        </article>
        
    <!--JavaScript-->
    <script src="kod.js"></script>
</body>
</html>