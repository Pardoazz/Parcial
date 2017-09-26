<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:index.php");
} elseif ($_SESSION['rol'] == 2) {
    header("Location:admin2.php");
} elseif ($_SESSION['rol'] == 3) {
    header("Location:admin3.php");
} elseif ($_SESSION['rol'] == 1) {
    header("Location:admin.php");
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
                                <li><a href="">Bienvenido <strong><?php echo $_SESSION['user']; ?></strong> </a></li>
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
                            <h4>Tabla de inventario</h4>
                            <div class="row-fluid">




                                <?php
                                require("connect_db.php");
                                $sql = ("SELECT * FROM inventario");

//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
                                $query = mysqli_query($mysqli, $sql);

                                echo "<table border='1'; class='table table-hover';>";
                                echo "<tr class='warning'>";
                                echo "<td>codigo unico</td>";
                                echo "<td>id bienes</td>";
                                echo "<td>ubicacion</td>";
                                echo "<td>fecha ingreso</td>";
                                echo "<td>id responsable</td>";
                                echo "</tr>";
                                ?>

                                <?php
                                while ($arreglo = mysqli_fetch_array($query)) {
                                    echo "<tr class='success'>";
                                    echo "<td>$arreglo[1]</td>";
                                    echo "<td>$arreglo[2]</td>";
                                    echo "<td>$arreglo[3]</td>";
                                    echo "<td>$arreglo[4]</td>";
                                    echo "<td>$arreglo[5]</td>";
                                    echo "</tr>";
                                }

                                echo "</table>";

                                extract($_GET);
                                if (@$idborrar == 2) {

                                    $sqlborrar = "DELETE FROM login WHERE id=$id";
                                    $resborrar = mysqli_query($mysqli, $sqlborrar);
                                    echo '<script>alert("REGISTRO ELIMINADO")</script> ';
                                    //header('Location: proyectos.php');
                                    echo "<script>location.href='admin.php'</script>";
                                }
                                ?>






                                <div class="span8">



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