<?php

include('database.php');

echo "<p>Welcome to our website deployed to AWS using Ansible.</p>";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id' => 1]); 
    $user = $stmt->fetch();

    echo "<p>Hi " . $user['username'] . "</p>\n";

} catch (PDOException $exception) {
    die("Could not connect to the database $dbname :" . $exception->getMessage());
}