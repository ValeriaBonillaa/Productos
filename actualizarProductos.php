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

    <div id="insidecontent">
<?php
        $codigo= $_REQUEST["codigo"];
		$link = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link, "examen");
		$result = mysqli_query($link, "select * from productos where codigo = '".$codigo."'");
		mysqli_data_seek ($result, 0);
		$extraido= mysqli_fetch_array($result);
	?>
  </div>	
      <h1>Actualizar Productos</h1> 
	  <br/>
   		<form name= "actualizarAnimal" method= "POST" action= "">
            <table border="0" >
            <tr>
			<td> Codigo: </td>
			<td><input name= "codigo" type= "number" readonly required value="<?php echo $extraido['codigo']?>"/></td>
			</tr>
			<tr>
			<td> Nombre: </td>
			<td><input name= "nombre" type= "text" required value="<?php echo $extraido['nombre']?>"/></td>
			</tr>
            <tr>
			<td> Cantidad de productos a Ingresar: </td>
			<td><input name= "cantidad" type= "number" required value= "<?php echo $extraido['cantidad']?>" ></td>
            </tr>
            <tr>
			<td> De preferencia mantener:</td>
		 	  <?php 
           if(($extraido['mantener']) == 'frio'){
			echo "<td> <input type='radio' name='mantener' value='frio' checked>Frio";
		    echo"<input type='radio' name='mantener' value='ambiete'>Mantener temperatura ambiente</td>";
          }else{
	       echo "<td> <input type='radio' name='mantener' value='frio'>Frio";
		   echo"<input type='radio' name='mantener' value='ambiete' checked>Mantener temperatura ambiente</td>";
         }
          ?>
			</tr>
            <tr>
            <td> Fecha de Vencimiento: </td>
			<td><input name= "fechaVencimiento" type= "date" value="<?php echo $extraido['fechaVencimiento']?>" >  En caso que se requiera*</td>
			</tr>
			<tr>
            <td> Precio del producto: </td>
			<td><input name= "precioProducto" type= "number" value="<?php echo $extraido['precioProducto']?>" ></td>
			</tr>
	        <td><img src="LibGD2.php"></td>
		    <td><input type="number" name="confirmar" required></td>
	        </tr>
			<tr>
            <td><input type= "submit" name= "Actualizar" value= "Actualizar" ></td>
            </tr>
         </table>
		</form>
    </div>
	</div>
</body>
</html>
<?php
  session_start();
  if (!empty($_POST['Actualizar'])){
   if($_SESSION['numeroaleatorio'] == $_POST['confirmar']){
		
	$link = mysqli_connect("localhost", "root", "");

	mysqli_select_db($link, "examen");

	$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes	
			
	$query =  "UPDATE productos set codigo ='".$_REQUEST['codigo']."', nombre = '".$_REQUEST['nombre']."', cantidad = '".$_REQUEST['cantidad']."', mantener = '".$_REQUEST['mantener']."', fechaVencimiento = '".$_REQUEST['fechaVencimiento']."' , precioProducto = '".$_REQUEST['precioProducto']."' where codigo = '".$codigo."'";

	if (mysqli_query($link, $query)) {
        mysqli_close($link);
	    echo '<script language="javascript">';
	    echo 'alert("El producto se actualizo correctamente");';
	    echo '</script>';
    }
   }

   else{
	   echo '<script language="javascript">';
	   echo 'alert("El producto no se pudo actualizar correctamente");';
	   echo '</script>';		
    }
 }
  ?>