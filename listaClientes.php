<?php header ('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>
    <HEAD>
        <meta charset="utf-8">
        <title>Clientes</title>
        <!-- apartado para la carga de depandencias -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        <link rel="stylesheet"  type="text/css" href="./lib\css\estilos.css" >
        <link href="css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- apartado para cargar script -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.15.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js//bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <!--script para detectar anotaciones de los botenes -->
       <script>
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();    
            });
        </script>  
    </HEAD>
    <body>
    <div class="wrapper">
        <div class="container-fliud">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 md-3 clearfix">
                        <h2 class="pull-left">Clientes</h2>
                        <a href="FormularioCliente.php"  class="btn btn-primary pull-right ">
                            <i class="fa fa-plus mr-2"></i>Crear Cliente
                        </a>
                    </div>
                </div>
            </div>
             <!-- BUSQUEDA DE EL EMPLEADOS CODIGO HTML -->
            <div class="card-search">
              
   				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<b>Buscador: </b><input type="text" id="campo" name="campo" placeholder="buscar por nombre"/>
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info mr-2" />
                    <a class="btn btn-secondary" href="../index.php" role="button">Cancelar</a>
				</form>
                <p class="black paragraph font-semibold m-2 mb-1"></p>
            </div> 
            <?php
        //archivo de conexion
        require_once "../lib/config/conexion.php";
        $where = "";
        if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor'";
		}
	}
        $sql="SELECT * FROM `clientes` $where";
        if ($result=mysqli_query($link,$sql)) {
          if (mysqli_num_rows($result)>0) {  
            echo '<table class="table table-sm table-bordered table-striped display" id="mitabla">';
            echo '<thead>';
            echo '<tr>';
                  echo '<th>Tipo de documento</th>';
                  echo '<th>Cedula</th>';
                  echo '<th>Nombre</th>';
                  echo '<th>Nacimiento</th>';
                  echo '<th>Estado civil</th>';
                  echo '<th>Dirección</th>';
                  echo '<th>Geografia</th>';
                  echo '<th>Fijo</th>';
                  echo '<th>Movil</th>';
                  echo '<th>Email</th>';
                  echo '<th>Acciones</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
             while ($row=mysqli_fetch_array($result)) {
                 echo"<tr>";
                 echo"<td fs-6>".$row['tipo_documento']."</th>";
                 echo"<td fs-6>".$row['numero_documeto']."</th>";
                 echo"<td fs-6>".$row['fecha_nacimiento']."</th>";
                 echo"<td fs-6>".$row['direccion_residencia']."</th>";
                 echo"<td fs-6>".$row['departamento_residencia']."-".$row['Ciudad']."</th>";
                 echo"<td fs-6>".$row['numero_celular']."</th>";
                 echo"<td fs-6>".$row['correo_electronico']."</th>";
                 echo"<td fs-6>";
                 echo'<a href="editarCliente.php?id='.$row['idCliente'].'" name="editar" class="mr-2" title="Editar"
                 data-toggle="tooltip"><span class="fa fa-pencil"></span> </a>';
                 echo'<a href="eliminar.php?id='.$row['idCliente'].'" name="eliminar" class="mr-2" title="Eliminar"
                 data-toggle="tooltip"><span class="fa fa-trash"></span> </a>';
                
                 echo"</td>";
                 echo"</tr>";
             }
          }   
         }
         echo '</tbody>';
         echo '</table>';
         mysqli_close($link);
        ?>              
        </div>
    </div> 

       
    </body>
     <!----- CODIGO HTML PIE DE PAGUINA  ---->
<footer style="background-color: #334FFF">
    <div class="container">
        <div class="row align-items-start">
            <div class="col" style="color:white">
                <h5>Contactenos </h5>
                <p style="color: white;">SERVICIO AL CLIENTE .<br> Telefono: 01 8000 32 65 98<br>
                </p>

            </div>
            <div class="col" style="color: white;">
                <h5>Nuestras Redes </h5>
                <div class="social"><a href="https://www.instagram.com/?hl=es-la"><i class="icon ion-social-instagram"></i></a><a href="https://www.snapchat.com/l/es/"><i class="icon ion-social-snapchat"></i></a>
                    <a href="https://twitter.com/iniciarsesion?lang=es"><i class="icon ion-social-twitter"></i></a><a href="https://www.facebook.com/"><i class="icon ion-social-facebook"></i></a>
                </div>

            </div>
            <div class="col" style="color: white;">
                <h5>Nuestras correo </h5>
                mail:mysavings@mysavings.com<br>
            </div>
        </div>
    </div>

    <p class="copyright" style="color: white;">My Savings Banc © 2018</p>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

</html>