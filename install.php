require "config.php";
$connection = new PDO("mysql:host=$host", $username, $password, $options);

new PDO("mysql:host=localhost", "root", "root", 
  array(
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  );
);