<?php
session_start();

// adadbázis ÉLES OLDAL

$db = mysqli_connect('pma.adminom.hu','c1445_gasmonkeys', 'Nagyakukac1','c1445_gasmonkeys');
// változók deklalárása
$errors   = array(); 

// előhívja a "register()" funkciót, a regisztráció gombra kattintva
if (isset($_POST['register_btn'])) {
	register();
}

// előhívja a "login()" funkciót, a bejelentkezés gombra kattintva
if (isset($_POST['login_btn'])) {
	login();
}

if (isset($_POST['group_btn'])) {
	group_add();
}

if (isset($_POST['gr_del'])) {
	group_delete();
}

function group_delete() {
	global $db, $errors, $id;

	$sorszam = $_GET['id'];
	$query = 'DELETE FROM groups WHERE id = "'. $sorszam .'"';
	mysqli_query($db, $query);

	header('verseny.php');
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' || $_SESSION['user']['mindenhato'] == 'yes') {
		return true;
	}else{
		return false;
	}
}

function group_add() {


	global $db, $errors, $username, $email, $logged_in_user;

	$group_name    =  e($_POST['group_Name']);
	$member1       =  e($_POST['group_mem1']);
	$member2       =  e($_POST['group_mem2']);
	$member3       =  e($_POST['group_mem3']);
	$member4       =  e($_POST['group_mem4']);
	$member5       =  e($_POST['group_mem5']);
	$group_date       =  e($_POST['group_date']);
	$sid = $_SESSION['user']['id'];


	if (empty($group_name)) { 
		array_push($errors, "Csapat nevet kötelező megadni!"); 
	}
	if (empty($member1)) { 
		array_push($errors, "Csapat tagot kötelező megadni!"); 
	} 
	if (empty($member2)) { 
		array_push($errors, "Csapat tagot kötelező megadni!"); 
	} 
	if (empty($member3)) { 
		array_push($errors, "Csapat tagot kötelező megadni!"); 
	} 
	if (empty($member4)) { 
		array_push($errors, "Csapat tagot kötelező megadni!"); 
	} 
	if (empty($member5)) { 
		array_push($errors, "Csapat tagot kötelező megadni!"); 
	} 
	if (empty($group_date)) { 
		array_push($errors, "Dátumot kötelező megadni!"); 
	}     

	if (count($errors) == 0) {

		

		$groupsql = "INSERT INTO groups (group_name, member1, member2, member3, member4, member5, group_date)
		values ('$group_name', '$member1', '$member2', '$member3', '$member4', '$member5', '$group_date')";
		if ($db->query($groupsql)){
			header('location: profil.php?id='. $sid .'');
			array_push($errors, "Sikeres jelentkezés!");
	
		}
		else{
			echo "Error: ". $sql ."
		". $db->error;
		}
		$db->close();
	
	
	}else {
		
	}
	

}

// FELHZASZNÁLÓ REGISZTRÁCIÓJA
function register(){
	// egész funkción belül elérhető dolgok
	global $db, $errors, $username, $email;

	// e() funkcióra hivatkozinak
    // üres változók deklarálása
	$username    =  $_POST['reg_uName'];
	$email       =  $_POST['reg_uEmail'];
	$password  =  $_POST['reg_uPass'];
	$passwordconf  =  $_POST['reg_uPassConf'];
	$date = date("Y-m-d H:i:s");
	$ip = $_SERVER['REMOTE_ADDR'];
    
     
    

	// megnézi hogy minden kivan-e töltve
	if (empty($username)) { 
		array_push($errors, "Felhasználónevet kötelező megadni!"); 
	}    
	if (empty($email)) { 
		array_push($errors, "Email címet kötelező megadni!"); 
	}
	if (empty($password)) { 
		array_push($errors, "Jelszót kötelező megadni!"); 
	}
	if ($password != $passwordconf) {
		array_push($errors, "A két jelszó nem egyezik!");
	}
    if (strlen($password)<6) {
		array_push($errors, "A jelszó legalább 6karakter legyen!");
	}
    if (strlen($username)<4) {
		array_push($errors, "A felhasználónév legalább 4 karakter legyen!");
	}
  $sql = "SELECT * FROM accounts WHERE username='" . $_POST["reg_uName"] . "'";
        
        if($stmt = mysqli_prepare($db, $sql)){
            //előkésziti az adatbázist
         
            
            // paramétereket beállítja
            $param_username = trim($_POST["reg_uName"]);
            
            // megpróbálja felvinni az adatokat
            if(mysqli_stmt_execute($stmt)){
                /* eltárolja az eredményt */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    array_push($errors, "A felhasználónév foglalt!");
					
                } else{
                    $username = trim($_POST["reg_uName"]);
                }
            } 
        }
           // lezárja a próbát
            mysqli_stmt_close($stmt);
    
	// regisztrálja a felhasználót, ha nincs hiba
	if (count($errors) == 0) {
		$password = md5($password); //titkosítja a jelszót, még az adatfelvétel előtt

		if (isset($_POST['user_type'])) {
			$user_type = $_POST['user_type'];
			$query = "INSERT INTO accounts (username, email, user_type, password, ip) 
					  VALUES('$username', '$email', '$user_type', '$password', '$ip')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "Regisztráció sikeres volt, felhasználó létrehozva!";
			header('location: regisztracio.php');
		}else{
			$query = "INSERT INTO accounts (username, email, user_type, password, ip) 
					  VALUES('$username', '$email', 'user', '$password', '$ip')";
			mysqli_query($db, $query);

			// lekéri a kreált felhasználó ID-jét
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // beloginolt felh.-t sessionba dobja
			$_SESSION['success']  = "Jelentkezz be!";
			header('location: regisztracio.php');				
		}
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// id alapján dolgok
function getUserById($id){
	global $db;
	$query = "SELECT * FROM accounts WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

//error kijelzés az oldalon
function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

// FELHASZNÁLÓ BEJELENTKEZÉS
function login(){
	global $db, $username, $errors;

	// változókba menti a beirt adatokat
	$username = ($_POST['log_uName']);
	$password = ($_POST['log_uPass']);
	$ip = $_SERVER['REMOTE_ADDR'];


	// megnézi h kivan e töltve minden
	if (empty($username)) {
		array_push($errors, "Felhasználónevet kötelező megadni!");
	}
	if (empty($password)) {
		array_push($errors, "Jelszót kötelező megadni!");
	}

	// megpróbál bejelentkezni ha nincs error
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM accounts WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // talált felhasználót
			// megnézi h admin vagy user a felhasználó
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
                header('location: admin.php');	
                	  
			}else{
                if ($logged_in_user['user_type'] == 'user') {
				
				$_SESSION['user'] = $logged_in_user;
				$sid = $_SESSION['user']['id'];
				header('location: profil.php?id='. $sid .'');
			}else {
			array_push($errors, "Hibás felhasználónév/jelszó");
		}
	}
}
}
}

?>