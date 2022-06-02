<?php 

$host = "localhost";
$user = "root";
$password = "";
$database ="sistema-busca";


try {
    
    $pdo = new PDO("mysql:dbname=$database; host=$host; charset=utf8", "$user", "$password");

} catch (\Throwable $th) {
    
    echo "Erro ao conectar com o banco de dados " .$e;
}

?>