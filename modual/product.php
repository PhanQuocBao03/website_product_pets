<?php

function deleteProduct($id){
    $conn=connectdb();
    $sql = "call deleteProduct(?)";
    $stmt=$conn->prepare($sql);
    $stmt->execute([$id]);
}

function getProduct(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT DISTINCT product.*,name_category,price,size_name FROM (product join category on product.id_category=category.id)join size on product.id=size.id group by name_product");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getSXProduct($keyw){
    $conn=connectdb();
    if ($keyw=='tang') {
       
        $stmt = $conn->prepare("SELECT product.*,name_category,price FROM (product join category on product.id_category=category.id)join size on product.id=size.id group by name_product order by name_product asc ");
    }
    if ($keyw=='giam') {
       
        $stmt = $conn->prepare("SELECT product.*,name_category,price FROM (product join category on product.id_category=category.id)join size on product.id=size.id group by name_product order by name_product desc  ");
    }
    if ($keyw=='maspT') {
       
        $stmt = $conn->prepare("SELECT product.*,name_category,price FROM (product join category on product.id_category=category.id)join size on product.id=size.id group by name_product order by product.id asc  ");
    }
    if ($keyw=='maspG') {
       
        $stmt = $conn->prepare("SELECT product.*,name_category,price FROM (product join category on product.id_category=category.id)join size on product.id=size.id group by name_product order by product.id desc  ");
    }
    
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getSize(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT size.* FROM product join size on product.id=size.id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getSizeM($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT size.*,discount FROM product join size on product.id=size.id where size_name='M' and size.id=?");
    $stmt->execute([$id]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function Updatesize($id,$size_name,$quanlity){
    $conn = connectdb();
    $sql = "UPDATE size SET quanlity=? WHERE id=? and size_name=?";
    try {
        $statement = $conn->prepare($sql);
        $statement->execute([$quanlity,$id,$size_name,]);
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }
}
function getOneSize($id){
    $conn=connectdb();
    $sql = "SELECT * from size where id=?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    } catch (PDOException $e) {
        $pdo_error =  $e->getMessage();
    }
}

function getNumberProduct(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT count(product.id) as NumberProduct  FROM product join category on product.id_category=category.id ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
// function getOneCategory($id){
//     $conn=connectdb();
//     $stmt = $conn->prepare("SELECT * FROM category where id=".$id);
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $kq=$stmt->fetchAll();
//     return $kq;
// }
function ADDProduct($id,$thumbnail,$name_product,$price,$discount,$discription,$id_category,$size_name,$quanlity){
    $conn=connectdb();
    $sql="call addProduct(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    try {
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2,$thumbnail);
        $stmt->bindParam(3,$name_product);
        $stmt->bindParam(4,$price);
        $stmt->bindParam(5,$discount);
        $stmt->bindParam(6,$discription);
        $stmt->bindParam(7,$id_category);
        $stmt->bindParam(8,$size_name);
        $stmt->bindParam(9,$quanlity);

        $stmt->execute();
    } catch (PDOException $e) {
        $pdo_error =  $e->getMessage();
    }
    

}
function addsize($id,$size_name,$quanlity){
    $conn =connectdb() ;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO size (id,size_name,quanlity)
    VALUES (?,?,?)";
    try {
        $stmt=$conn->prepare($sql);
        $stmt->execute([$id,$size_name,$quanlity]);
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }
    
}

// function editCategory($id,$name_category){
//     $conn = connectdb();
//     $sql = "UPDATE category SET name_category='".$name_category."' WHERE id=".$id;
//     $conn -> exec($sql);
//     $row = $statement->fetch();

// }
// function UpdateCategory($id,$name_category){
//     $conn = connectdb();
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $sql = "UPDATE category SET name_category='".$name_category."' WHERE id=".$id;
//     $stmt = $conn->prepare($sql); 
//     $stmt->execute();

// }
function getOneProduct($id){
    $conn=connectdb();
    $sql = "SELECT product.*,name_category,price,size_name FROM (product join category on product.id_category=category.id) join size on size.id=product.id  where product.id=?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    } catch (PDOException $e) {
        $pdo_error =  $e->getMessage();
    }
}
function getProductct($id){
    $pdo=connectdb();
    $sql="SELECT product.*,name_category,price FROM (product join category on product.id_category=category.id) join size on size.id=product.id  where id_category=? group by name_product";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    } catch (PDOException $e) {
        $pdo_error =  $e->getMessage();
    }
   
    
}
function getPrice($id,$size_name){
    $conn=connectdb();
    
    $sql = "SELECT product.*,name_category,price,size_name FROM (product join category on product.id_category=category.id) join size on size.id=product.id  where product.id=?,price=?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id,$size_name]);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    } catch (PDOException $e) {
        $pdo_error =  $e->getMessage();
    }
}

function getSeach($keyw){
    $pdo=connectdb();
    $sql="SELECT product.*,name_category,price FROM (product join category on product.id_category=category.id) join size on size.id=product.id where name_category like '%$keyw%' or name_product like '%$keyw%' or size_name = '$keyw' group by name_product";
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
function getProductPriceUnder(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT product.*,name_category,price FROM (product join category on product.id_category=category.id) join size on size.id=product.id where size.price < 100000 group by product.id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getProductTo(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT product.*,name_category ,price FROM (product join category on product.id_category=category.id) join size on size.id=product.id  where size.price > 1000000 and size.price < 2000000 group by product.id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getProductTomall(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT product.*,name_category ,price FROM (product join category on product.id_category=category.id) join size on size.id=product.id  where size.price > 100000 and size.price < 1000000 group by product.id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getProductTobig(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT product.*,name_category ,price FROM (product join category on product.id_category=category.id) join size on size.id=product.id  where size.price > 2000000  group by product.id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function addsizename($id,$size_name,$price,$quanlity){
    $conn =connectdb() ;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO size 
    VALUES (?,?,?,?)";
    try {
        $stmt=$conn->prepare($sql);
        $stmt->execute([$id,$size_name,$price,$quanlity]);
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    } 
}