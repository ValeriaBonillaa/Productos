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
      <h1>Agregar Productos</h1> 
	  <br/>
   		<form name= "actualizarAnimal" method= "POST" action= "">
            <table border="0" >
            <tr>
			<td> Codigo: </td>
			<td><input name= "codigo" type= "number" required value=""/></td>
			</tr>
			<tr>
			<td> Nombre: </td>
			<td><input name= "nombre" type= "text" required value=""/></td>
			</tr>
            <tr>
			<td> Cantidad de productos a Ingresar: </td>
			<td><input name= "cantidad" type= "number" required value= "" ></td>
            </tr>
            <tr>
			<td> De preferencia mantener:</td>
			<td><input name= "mantener" type= "radio" value= "frio" >Frio
			<input name= "mantener" type= "radio" value= "ambiente" >Temperatura Ambiente</td>
			</tr>
            <tr>
            <td> Fecha de Vencimiento: </td>
			<td><input name= "fechaVencimiento" type= "date" value="" >   *En caso que se requiera</td>
			</tr>
			<tr>
            <td> Precio del producto: </td>
			<td><input name= "precioProducto" type= "number" value="" > colones</td>
			</tr>
			<tr>
            <td><input type= "submit" name= "aceptar" value= "Aceptar" >      
	        <input type= "reset" name= "cancelar" value= "Cancelar" ></td>
            </tr>
         </table>
		</form>
    </div>
	</div>
</body>
</html>
  	<?php
    
	if(!empty($_REQUEST['aceptar'])) {
		
	 session_start();
	 $_SESSION['nombre']= $_REQUEST['nombre'];
		
	$link = mysqli_connect("localhost", "root", "");

	mysqli_select_db($link, "examen");

	$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes	
			
	$query = "INSERT INTO productos VALUES('$_REQUEST[codigo]' , '$_REQUEST[nombre]' , '$_REQUEST[cantidad]' , '$_REQUEST[mantener]', '$_REQUEST[fechaVencimiento]', '$_REQUEST[precioProducto]')";
    
	   
	   if($rs = mysqli_query($link, $query)){
	     mysqli_close($link);
	    echo '<script language="javascript">';
	    echo 'alert("El producto se agrego correctamente");';
	    echo '</script>';
		session_destroy();
		
	   }
	else{
	   echo '<script language="javascript">';
	   echo 'alert("El producto no se pudo agregar correctamente")';
	   echo '</script>';		
    }
	echo $_SESSION['nombre'];
}
?>


