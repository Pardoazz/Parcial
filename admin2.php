<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}elseif ($_SESSION['rol']==1) {
	header("Location:admin.php");
}elseif ($_SESSION['rol']==3) {
	header("Location:admin3.php");
}elseif ($_SESSION['rol']==4) {
	header("Location:admin4.php");
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Proyecto web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
<body data-offset="40" background="images/fondotot.jpg" style="background-attachment: fixed">
<div class="container">
<header class="header">
</header>

  <!-- Navbar
    ================================================== -->

<div class="navbar">
  <div class="navbar-inner">
	<div class="container">
	  <div class="nav-collapse">
		<ul class="nav">
			<li class=""><a href="admin.php">ADMINISTRADOR DEL SITIO</a></li>
			 
	
		</ul>
		<form action="#" class="navbar-search form-inline" style="margin-top:6px">
		
		</form>
		<ul class="nav pull-right">
		<li><a href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a></li>
			  <li><a href="desconectar.php"> Cerrar Sesión </a></li>			 
		</ul>
	  </div><!-- /.nav-collapse -->
	</div>
  </div><!-- /navbar-inner -->
</div>

<!-- ======================================================================================================================== -->
<div class="row">
	
	
		
	<div class="span12">

		<div class="caption">
		
<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h2> Administración de usuarios registrados</h2>	
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Tabla de Usuarios</h4>
		<div class="row-fluid">
		



			<?php

				require("connect_db.php");
				$sql=("SELECT * FROM login");
	
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				$query=mysqli_query($mysqli,$sql);

				echo "<table border='1'; class='table table-hover';>";
					echo "<tr class='warning'>";
						echo "<td>Id</td>";
						echo "<td>Nombre de usuario</td>";
                                                echo "<td>Apellido</td>";
						echo "<td>Password</td>";
						echo "<td>Correo</td>";
                                                echo "<td>Genero</td>";
                                                echo "<td>Rol</td>";
						echo "<td>Editar</td>";
					echo "</tr>";

			    
			?>
			  
			<?php 
				 while($arreglo=mysqli_fetch_array($query)){
				  	echo "<tr class='success'>";
				    	echo "<td>$arreglo[0]</td>";
				    	echo "<td>$arreglo[1]</td>";
                                        echo "<td>$arreglo[5]</td>";
				    	echo "<td>$arreglo[2]</td>";
				    	echo "<td>$arreglo[3]</td>";
                                        echo "<td>$arreglo[6]</td>";
                                        if($arreglo[4]==1)
                                        echo "<td>Lectura, Creacion de usuarios, Edicion de usuarios y Eliminar</td>";
                                        elseif($arreglo[4]==2)
                                        echo "<td>Lectura, Creacion de usuarios y Edicion de usuarios</td>";
                                        elseif($arreglo[4]==3)
                                        echo "<td>Lectura y Creacion de usuarios</td>";
                                        elseif($arreglo[4]==4)
                                        echo "<td>Lectura</td>";                                        
				    	echo "<td><a href='actualizar.php?id=$arreglo[0]'><img src='images/actualizar.gif' class='img-rounded'></td>";
						

						
					echo "</tr>";
				}

				echo "</table>";

					extract($_GET);
					if(@$idborrar==2){
		
						$sqlborrar="DELETE FROM login WHERE id=$id";
						$resborrar=mysqli_query($mysqli,$sqlborrar);
						echo '<script>alert("REGISTRO ELIMINADO")</script> ';
						//header('Location: proyectos.php');
						echo "<script>location.href='admin.php'</script>";
					}

			?>
			
				  
			  			  
			  
		
		
		<div class="span8">
                    
                    
<!-- formulario registro -->

<form method="post" action="" >
    <fieldset>
        <legend  style="font-size: 18pt"><b>Registrar</b></legend>
        <div class="form-group">
            <label style="font-size: 14pt"><b>Ingresar nombre de usuario</b></label>
            <input type="text" name="realname" class="form-control" placeholder="Ingresa tu nombre" />
        </div>
        <div class="form-group">
            <label style="font-size: 14pt"><b>Ingresar apellido</b></label>
            <input type="text" name="realnames" class="form-control" placeholder="Ingresa tu apellido" />
        </div>
        <div class="form-group">
            <label style="font-size: 14pt"><b>Ingresar genero</b></label>
            <input type="text" name="realgenero" class="form-control" placeholder="Ingresa tu genero" />
        </div>
        <div class="form-group">
            <label style="font-size: 14pt; "><b>Ingresa tu email</b></label>
            <input type="text" name="nick" class="form-control"  required placeholder="Ingresa mail"/>
        </div>
        <div class="form-group">
            <label style="font-size: 14pt;"><b>Ingresa Password</b></label>
            <input type="password" name="pass" class="form-control"  placeholder="Ingresa contraseña" />
        </div>
        <div class="form-group">
            <label style="font-size: 14pt"><b>Repite contraseña</b></label>
            <input type="password" name="rpass" class="form-control" required placeholder="repite contraseña" />
        </div>
        <div class="form-group">
            <label style="font-size: 14pt"><b>Ingresar rol</b></label>          
            <select id="rl" name="rl">
                <option >Lectura, Creacion de usuarios, Edicion de usuarios y Eliminar</option>
                <option >Lectura, Creacion de usuarios y Edicion de usuarios</option>
                <option >Lectura y Creacion de usuarios</option>
                <option >Lectura</option>        
            </select>       

        </div>

        </div>

        <input  class="btn btn-danger" type="submit" name="submit" value="Registrar"/>

    </fieldset>
</form>
</div>
<?php
if (isset($_POST['submit'])) {
    require("registro.php");
}
?>
<!--Fin formulario registro -->
                    
		
		</div>	
		</div>	
		<br/>
		


		<!--EMPIEZA DESLIZABLE-->
		
		 <!--TERMINA DESLIZABLE-->



		
		
		</div>

		


		

<!--///////////////////////////////////////////////////Termina cuerpo del documento interno////////////////////////////////////////////-->
</div>

	</div>
</div>
<!-- Footer
      ================================================== -->
<hr class="soften"/>
</div><!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>