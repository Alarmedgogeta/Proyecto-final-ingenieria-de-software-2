<?php 
	$host = "localhost";     
	$usuariodb = "root";   
	$clavedb = "";	
	$basededatos = "musica";
	$conexion = new mysqli($host,$usuariodb,$clavedb);

	if ($conexion->connect_error) {
        die("Error al conectar con el host");
    }
    //Se crea la base de datos si no existe
    $sql = "CREATE DATABASE IF NOT EXISTS $basededatos";
	$conexion->query($sql);
    mysqli_close($conexion);
    
	$conexion = new mysqli($host,$usuariodb,$clavedb, $basededatos);
    if ($conexion->connect_error) {
        die("Error al conectar con la base de datos:".$conexion->connect_error);
    }
    //Se crea la tabla Artistas
	$sql = "CREATE TABLE IF NOT EXISTS Artistas(
		Id INT AUTO_INCREMENT PRIMARY KEY,
		Nombre VARCHAR(100),
        Apellido VARCHAR(100),
		Nacionalidad VARCHAR(20)
    )";
	$conexion->query($sql);
    //Se ingresan 5 registros a la tabla Artistas
	$sql = "INSERT INTO Artistas
	VALUES (null, 'Billie', 'Eilish', 'Estadounidense')";
	$conexion->query($sql);
	$sql = "INSERT INTO Artistas
	VALUES (null, 'Eduardo', 'Hernández Saucedo', 'Mexicana')";
	$conexion->query($sql);
	$sql = "INSERT INTO Artistas
	VALUES (null, 'Benito Antonio', 'Martínez Ocasio', 'Puertoriqueño')";
	$conexion->query($sql);
	$sql = "INSERT INTO Artistas
	VALUES (null, 'Phillip LaDon', 'Phillips, Jr.', 'Estadounidense')";
	$conexion->query($sql);
	$sql = "INSERT INTO Artistas
	VALUES (null, 'James Gabriel', 'Keogh', 'Australiana')";
    $conexion->query($sql);
    //Se crea la tabla Albumes
	$sql = "CREATE TABLE IF NOT EXISTS Albumes(
		Id int AUTO_INCREMENT PRIMARY KEY,
		Nombre varchar(100),
		FechaDeLanzamiento DATE,
		Artista int,
		FOREIGN KEY (Artista) REFERENCES Artistas(Id)
	)";	
    $conexion->query($sql);
    //Se insertan 5 registros a la tabla Albumes
	$sql = "INSERT INTO Albumes 
	VALUES (null, 'When We All Fall Asleep, Where Do We Go?', '2019-03-29', 1)";
	$conexion->query($sql);
	$sql = "INSERT INTO Albumes
	VALUES (null, 'mix pa llorar en tu cuarto', '2018-03-2', 2)";
	$conexion->query($sql);
	$sql = "INSERT INTO Albumes
	VALUES (null, 'YHLQMDLG', '2020-02-29', 3)";
	$conexion->query($sql);
	$sql = "INSERT INTO Albumes
	VALUES (null, 'The World from the Side of the Moon', '2012-11-19', 4)";
	$conexion->query($sql);
	$sql = "INSERT INTO Albumes
	VALUES (null, 'God Loves You When You''dre Dancing', '2013-03-22', 5)";
    $conexion->query($sql);
    //Se crea la tabla Canciones
	$sql = "CREATE TABLE IF NOT EXISTS Canciones(
		Id int AUTO_INCREMENT PRIMARY KEY,
		Nombre varchar(100),
		Artista varchar(100),
		Album int,
		FOREIGN KEY (Album) REFERENCES Albumes(Id)
	)";	
    $conexion->query($sql);
    //Se insertan 5 registros a la tabla Canciones
	$sql = "INSERT INTO Canciones 
	VALUES (null, 'Bad Guy', 'Billie Eilish', 1)";
	$conexion->query($sql);
	$sql = "INSERT INTO Canciones
	VALUES (null, 'Fuentes de Ortiz', 'Ed Maverick', 2)";
	$conexion->query($sql);
	$sql = "INSERT INTO Canciones
	VALUES (null, 'Si Veo A Tu Mamá', 'Bad Bunny', 3)";
	$conexion->query($sql);
	$sql = "INSERT INTO Canciones
	VALUES (null, 'Gone, Gone, Gone', 'Phillip Phillips', 4)";
	$conexion->query($sql);
	$sql = "INSERT INTO Canciones
	VALUES (null, 'Riptide', 'Vance Joy', 5)";
    $conexion->query($sql);
    //Se crea la tabla Usuarios
	$sql = "CREATE TABLE IF NOT EXISTS Usuarios(
		Id int AUTO_INCREMENT PRIMARY KEY,
        Nombre varchar(100),
        CorreoElectronico varchar(100),
		FechaDeCreacion date
    )";
	$conexion->query($sql);
    //Se insertan 5 registros a la tabla Usuarios
	$sql = "INSERT INTO Usuarios 
	VALUES (null, 'Alarmedgogeta', 'AlanDiazYanez@outlook.com', now())";
	$conexion->query($sql);
	$sql = "INSERT INTO Usuarios
	VALUES (null, 'Ramiro', 'RamiroDeLaCruz@outlook.com', now())";
	$conexion->query($sql);
	$sql = "INSERT INTO Usuarios
	VALUES (null, 'Cindy', 'CindyAnahi@outlook.com', now())";
	$conexion->query($sql);
	$sql = "INSERT INTO Usuarios
	VALUES (null, 'Anthonyt DeWitt', 'MarioRafaelJimenez@outlook.com', now())";
	$conexion->query($sql);
	$sql = "INSERT INTO Usuarios
	VALUES (null, 'Adriancito', 'AdrianVillegas@outlook.com', now())";
	$conexion->query($sql);
    //Se crea la tabla CancionesEscuchadas
	$sql = "CREATE TABLE IF NOT EXISTS CancionesEscuchadas(
		Id int AUTO_INCREMENT PRIMARY KEY,
        Usuario int,
        Cancion int,
		Fecha date,
		FOREIGN KEY (Usuario) REFERENCES Usuarios(Id),
		FOREIGN KEY (Cancion) REFERENCES Canciones(Id)
    )";
    $conexion->query($sql);
    //Se insertan 5 registros a la tabla CancionesEscuchadas
    $sql = "INSERT INTO CancionesEscuchadas 
	VALUES (null, 1, 1, now())";
	$conexion->query($sql);
	$sql = "INSERT INTO CancionesEscuchadas
	VALUES (null, 2, 2, now())";
	$conexion->query($sql);
	$sql = "INSERT INTO CancionesEscuchadas
	VALUES (null, 3, 3, now())";
	$conexion->query($sql);
	$sql = "INSERT INTO CancionesEscuchadas
	VALUES (null, 4, 4, now())";
	$conexion->query($sql);
	$sql = "INSERT INTO CancionesEscuchadas
	VALUES (null, 5, 5, now())";
    $conexion->query($sql);
    //Se crea la tabla ListaDeReproduccion
	$sql = "CREATE TABLE IF NOT EXISTS ListasDeReproduccion(
		Id int AUTO_INCREMENT PRIMARY KEY,
        Nombre varchar(100),
        Usuario int,
		FOREIGN KEY (Usuario) REFERENCES Usuarios(Id)
    )";
    $conexion->query($sql);
    //Se insertan 5 registros a la tabla ListaDeReproduccion
    $sql = "INSERT INTO ListasDeReproduccion 
	VALUES (null, 'Rolitas preciosas', 1)";
	$conexion->query($sql);
	$sql = "INSERT INTO ListasDeReproduccion
	VALUES (null, 'Rolitas para manejar', 2)";
	$conexion->query($sql);
	$sql = "INSERT INTO ListasDeReproduccion
	VALUES (null, 'Rolitas para bañarse', 3)";
	$conexion->query($sql);
	$sql = "INSERT INTO ListasDeReproduccion
	VALUES (null, 'Rolitas para llorar', 4)";
	$conexion->query($sql);
	$sql = "INSERT INTO ListasDeReproduccion
	VALUES (null, 'Rolitas para dedicar', 5)";
    $conexion->query($sql);
    //Se crea la tabla CancionesDeListaDeReproduccion
	$sql = "CREATE TABLE IF NOT EXISTS CancionesDeListaDeReproduccion(
		Id int AUTO_INCREMENT PRIMARY KEY,
        ListaDeReproduccion int,
        Cancion int,
		FOREIGN KEY (ListaDeReproduccion) REFERENCES ListasDeReproduccion(Id),
		FOREIGN KEY (Cancion) REFERENCES Canciones(Id)
    )";
    $conexion->query($sql);
    //Se insertan 5 registros a la tabla CancionesDeListaDeReproduccion
    $sql = "INSERT INTO CancionesDeListaDeReproduccion 
	VALUES (null, 1, 1)";
	$conexion->query($sql);
	$sql = "INSERT INTO CancionesDeListaDeReproduccion
	VALUES (null, 2, 2)";
	$conexion->query($sql);
	$sql = "INSERT INTO CancionesDeListaDeReproduccion
	VALUES (null, 3, 3)";
	$conexion->query($sql);
	$sql = "INSERT INTO CancionesDeListaDeReproduccion
	VALUES (null, 4, 4)";
	$conexion->query($sql);
	$sql = "INSERT INTO CancionesDeListaDeReproduccion
	VALUES (null, 5, 5);";
	$conexion->query($sql);
	
	echo "Base de datos generada<br>";
	mysqli_close($conexion);
?>