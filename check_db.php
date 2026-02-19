<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=luxur_men_salon_db', 'root', 'password');
    echo "Connected successfully\n";
    $stmt = $pdo->query('SHOW TABLES');
    while ($row = $stmt->fetch()) {
        echo $row[0] . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
