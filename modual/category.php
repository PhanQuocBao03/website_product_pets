<?php

function deleteCategory($id){
    $conn=connectdb();
    $sql = "DELETE FROM category WHERE id=? ";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        $pdo_error =  $e->getMessage();
    }
    
}
function getCategory(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM category");
    try {
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }
    
}
function getOneCategory($id){
    $pdo=connectdb();
    $sql="SELECT * FROM category where id=?";
   
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();

    }
    
}
function ADDCategory($name_category){
    $conn =connectdb() ;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO category (name_category)
    VALUES (?)";
    try {
        $stmt=$conn->prepare($sql);
        $stmt->execute([$name_category]);
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }
    
}


function UpdateCategory($id,$name_category){
    $conn = connectdb();
    $sql = "UPDATE category SET name_category=? WHERE id=?";
    try {
        $statement = $conn->prepare($sql);
        $statement->execute([$id,$name_category]);
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }
}