<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>Estudiantes</h2>
  <table border=1>
    <tr>
      <th>Código</th>
      <th>Nombre Estudiante</th>
      <th>Matricula</th>
      <th>Profesión</th>
      <th>Recinto</th>
    </tr>

    <?php
      $host = "db";
      $user = "postgres";
      $pass = "Jean1804";
      $database = "postgres";

      //Conexión a Postgres

      $conn = pg_connect("host=$host dbname=$database user=$user password=$pass") or die ('No establecida por: '. pg_last_error());

      //Creación de tabla Estudiantes

      $query = "CREATE TABLE IF NOT EXISTS estudiantes (ID Serial PRIMARY KEY, estudiante varchar(50) NOT NULL,
      matricula varchar(50) NOT NULL, carrera varchar(50) NOT NULL, recinto varchar(50) NOT NULL)";
      $result = pg_query($conn, $query);

      // Insercción de datos si la tabla está vacía
      $query = "SELECT * FROM estudiantes";
      $result = pg_query($conn, $query);
      if (pg_num_rows($result) == 0)
      $query = "INSERT INTO estudiantes (estudiante, matricula, carrera, recinto) VALUES ('JEAN UREÑA','2-17-1955','ISC','SANTIAGO'),
      ('BALDWIN GONZÁLEZ','1-16-1355','ISC','SANTIAGO'), ('MANUEL PERZ','1-15-1533','CON','MOCA')";
      pg_query($conn, $query);
    
      $query = "SELECT * FROM estudiantes";
      $result = pg_query($conn, $query);

      while ($row = pg_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['estudiante'] . "</td>";
		    echo "<td>" . $row['matricula'] . "</td>";
        echo "<td>" . $row['carrera'] . "</td>";
        echo "<td>" . $row['recinto'] . "</td>";
        echo "</tr>";
      }
    ?>
  </table>
</body>
</html>

