<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["username"]) and isset($_POST["password"])) {
        try {
          $hostname = "localhost";
          $dbname = "pruebasphp";
          $username = "cjuradog";
          $pw = "P@ssw0rd";
          $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
        } catch (PDOException $e) {
          echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
  }
        $contrasenya = $_POST["password"];
        $usuari = $_POST["username"];
        

        $query = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = '$usuari' and password = '$contrasenya'");
        $query -> execute();
        $row = $query -> fetch();
        if ($row !== false) {
          echo "<h2>Logeado correctamente.</h2>";
        } else {
          echo "<h2>Error al Logear, revisa usuario o password.</h2>";
        }
      }
     ?>
    <h2>Login</h2>
    <form action="index.php" method="post">
      <label for="username">Usuari: </label>
      <input type="text" name="username"><br>
      <label for="password">Contrasenya: </label>
      <input type="password" name="password"><br>
      <input type="submit" name="submit" value="Start">
    </form>

  </body>
</html>