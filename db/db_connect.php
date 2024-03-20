<?php
function connectdb(){ 
    try {
        $conn = new PDO('mysql:host=localhost;dbname=web_pet_story', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error_message = 'Không thể kết nối đến CSDL';
        $reason = $e->getMessage();
        include 'show_error.php';
        exit();
    }
    return $conn;
}

