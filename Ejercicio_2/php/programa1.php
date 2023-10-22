<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Procesar Archivos</title>
</head>

<body>
    <div class="container">

        <h1>Subir Archivo</h1>
        <form class="d-flex" action="programa1.php" method="post" enctype="multipart/form-data">
            <input required type="file" class="form-control" name="archivo" accept=".txt">
            <input class="btn btn-primary" type="submit" value="Procesar">
        </form>
        <br>

        <?php
        $host = "localhost"; 
        $port = "5432"; 
        $dbname = "datosdb"; 
        $user = "postgres"; 
        $password = "root";

        try {
            $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }

        function createTable($pdo)
        {
            $sql = "CREATE TABLE IF NOT EXISTS informacion (
                codigo SERIAL PRIMARY KEY,
                nombrearchivo VARCHAR(250),
                cantlineas INT,
                cantpalabras INT,
                cantcaracteres INT,
                fecharegistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            $pdo->exec($sql);
        }

        function procesarArchivo($pdo, $archivo)
        {
            $nombrearchivo = basename($archivo);
            $lineas = file($archivo, FILE_IGNORE_NEW_LINES);
            $cantlineas = count($lineas);
            $contenido = implode(" ", $lineas);
            $palabras = str_word_count($contenido);
            $cantcaracteres = strlen($contenido);

            $sql = "INSERT INTO informacion (nombrearchivo, cantlineas, cantpalabras, cantcaracteres) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nombrearchivo, $cantlineas, $palabras, $cantcaracteres]);
        }

        function mostrarRegistrosPaginados($pdo, $currentPage, $perPage)
        {
            $sql = "SELECT * FROM informacion";
            $stmt = $pdo->query($sql);

            $totalRows = $stmt->rowCount();
            $totalPages = ceil($totalRows / $perPage);
            $offset = ($currentPage - 1) * $perPage;

            $sql = "SELECT * FROM informacion LIMIT $perPage OFFSET $offset";
            $stmt = $pdo->query($sql);

            echo "<div class='table-responsive'>";
            echo "<table class='table'>";
            echo "<tr><th>Código</th><th>Nombre del Archivo</th><th>Cantidad de Líneas</th><th>Cantidad de Palabras</th><th>Cantidad de Caracteres</th><th>Fecha de Registro</th></tr>";
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['codigo'] . "</td>";
                echo "<td>" . $row['nombrearchivo'] . "</td>";
                echo "<td>" . $row['cantlineas'] . "</td>";
                echo "<td>" . $row['cantpalabras'] . "</td>";
                echo "<td>" . $row['cantcaracteres'] . "</td>";
                echo "<td>" . $row['fecharegistro'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";

            // Agregar enlaces de navegación para la paginación.
            echo "<nav aria-label='Page navigation example'>";
            echo "<ul class='pagination'>";
            if ($currentPage > 1) {
                echo "<li class='page-item'><a class='page-link' href='programa1.php?page=" . ($currentPage - 1) . "'>Previous</a></li>";
            }
            if ($currentPage < $totalPages) {
                echo "<li class='page-item'><a class='page-link' href='programa1.php?page=" . ($currentPage + 1) . "'>Next</a></li>";
            }
            echo "</ul>";
            echo "</nav>";
            echo "<a href='exportar_excel.php' class='btn btn-primary'>Generar Excel</a>";
        }

        createTable($pdo);

        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
            $archivoTmpName = $_FILES['archivo']['tmp_name'];
            $archivoName = $_FILES['archivo']['name'];
            move_uploaded_file($archivoTmpName, $archivoName);
            procesarArchivo($pdo, $archivoName);
        }

        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $perPage = 10;
        mostrarRegistrosPaginados($pdo, $currentPage, $perPage);

        $pdo = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Location: programa1.php');
            exit;
        }

        ?>

    </div>


</body>

</html>