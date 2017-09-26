<?php

	$realname=$_POST['realname'];
        $apel=$_POST['realnames'];
        $gen=$_POST['realgenero'];
	$mail=$_POST['nick'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];
        if($_POST['rl']=="Lectura, Creacion de usuarios, Edicion de usuarios y Eliminar"){
            $rl=1;
        }elseif($_POST['rl']=="Lectura, Creacion de usuarios y Edicion de usuarios"){
            $rl=2;
        }elseif($_POST['rl']=="Lectura y Creacion de usuarios"){
            $rl=3;
        }elseif($_POST['rl']=="Lectura"){
            $rl=4;
        }
        

	require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$mail'");
	$check_mail=mysqli_num_rows($checkemail);
		if($pass==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el mail designado para un usuario, verifique sus datos");</script> ';
			}else{
				
				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
        
            mysqli_query($mysqli,"INSERT INTO login VALUES('','$realname','$pass','$mail','$rl','$apel','$gen')");
        
            
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				
			}
			
		}else{
			echo 'Las contraseñas son incorrectas';
		}

	
?>