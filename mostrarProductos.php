<html>
<head>
<title>Examen</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="css.css" media="screen" />
</head>

<body>

  <div id="menu"> 
    <ul>
      <li><a href="Inicio.php" title="">Inicio</a></li>
      <li><a href="AgregarProductos.php" title="">Agregar Productos</a></li>
      <li><a href="MostrarProductos.php" title="">Mostrar Productos</a></li>
    </ul>
  </div>
  <div id="content"> 

    <div id="insidecontent"> <br>
     <?php
     
        echo "<h1>Mostrar Productos</h1><br/>";
        	$link = mysqli_connect("localhost", "root", "");

			mysqli_select_db($link, "examen");

			$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes

			$result = mysqli_query($link, "SELECT * FROM `productos`");
			
			
            echo "<table border= 1>";
			    echo "<tr>";
				echo "<td>" . "Codigo " . "</td>";
				echo "<td>" . "Nombre " . "</td>" ;	
				echo "<td>" . "Cantidad " . "</td>";
				echo "<td>" . "Mantener " . "</td>";
				echo "<td>" . "Fecha Vencimiento " . "</td>";
				echo "<td>" . "Precio Producto" . "</td>";
				echo "<td>" . "Opcion de Actualizar" . "</td>";
				echo"</tr>";
			
			for ($i=0; $i < $result->num_rows ; $i++ )
			{
				mysqli_data_seek ($result, $i);
				$extraido= mysqli_fetch_array($result);
				
				echo "<tr>";
			    echo "<td>" . $extraido['codigo'] . "</td>";
				echo "<td>" . $extraido['nombre'] . "</td>";
				echo "<td>" . $extraido['cantidad']. "</td>";
				echo "<td>" . $extraido['mantener']. "</td>";
				echo "<td>" . $extraido['fechaVencimiento']. "</td>";
				echo "<td>" . $extraido['precioProducto']. "</td>";
                echo "<td><a href='actualizarProductos.php?codigo=" . $extraido['codigo'] . "'>Actualizar</a></td>";   
				echo"</tr>";
			}
			echo "</table>";
			
			mysqli_free_result($result);  //libera el $result

			mysqli_close($link);

	?>

    </div>
</body>
</html>