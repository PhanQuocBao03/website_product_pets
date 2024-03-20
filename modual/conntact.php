<?php
function addConntact($id,$comment){
    $conn =connectdb() ;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO contact (id_user,content)
    VALUES (?,?)";
    try {
        $stmt=$conn->prepare($sql);
        $stmt->execute([$id,$comment]);
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }
    
}
function get_AllConntact(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM users join contact on users.id=contact.id_user ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}