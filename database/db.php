<?php
require_once BASE_PATH . '/core/envLoader.php';
function getDbConnection() {
    try {
        EnvLoader::load(BASE_PATH. '/.env');
        $databaseUrl = getenv('DATABASE_PROVIDER') . ':host=' . getenv('DATABASE_HOST') . ';dbname=' . getenv('DATABASE_NAME');
        $pdo = new PDO($databaseUrl,getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
    return $pdo;
}
?>