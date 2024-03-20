<?php
function getFeedback($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM feedback fb join user u on fb.id_user= u.id  where u.id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getAllFeedback(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM feedback fb join user u on fb.id_user= u.id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}