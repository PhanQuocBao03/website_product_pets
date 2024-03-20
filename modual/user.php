<?php
function check_addcount($email,$password){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM users where email='".$email."' and password='".$password."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    if(count($kq)>0) return $kq[0]['role'];
    else return 0;
}
function DeleteUsers($id){
    $conn=connectdb();
    $sql = "DELETE FROM users WHERE id= ".$id;
    $conn->exec($sql);
}
function get_AllUsers(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM users ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function get_numberUser(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT count(id) as numberUser FROM users ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function get_profile($email,$password){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM users where email='".$email."' and password='".$password."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function get_Oneprofile($email){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM users where email ='".$email."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function get_OneUsers($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM users where id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function inset_addcount($fullname,$email,$phone,$address,$password){
    $conn=connectdb();
    $sql="INSERT INTO users(fullname,email,phone,address,password) VALUE ('".$fullname."','".$email."','".$phone."','".$address."','".$password."')";
    $conn->exec($sql);  
}function insetaddcount($fullname,$email,$password){
    $conn=connectdb();
    $sql="INSERT INTO users(fullname,email,password) VALUE ('".$fullname."','".$email."','".$password."')";
    $conn->exec($sql);  
}
function updatepassword($newpassword,$id){
    $conn = connectdb();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE users SET password='".$newpassword."' WHERE id=".$id;
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    
}
function updateUsers($id,$fullname,$phone,$address){
$conn = connectdb();
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE users SET fullname='".$fullname."',phone='".$phone."',address='".$address."' WHERE id=".$id;
  $stmt = $conn->prepare($sql);
  $stmt->execute();
}
function getSeachUser($keyw){
    $pdo=connectdb();
    $sql="SELECT * FROM users where fullname like '%$keyw%' or phone like '%$keyw%'";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    } catch (PDOException $e) {
        $pdo_error =  $e->getMessage();
    }
   
    
}