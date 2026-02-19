<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=luxur_men_salon_db', 'root', 'password');
    $stmt = $pdo->query('SELECT migration FROM migrations');
    while ($row = $stmt->fetch()) {
        echo $row['migration'] . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
