<?php


function ADDCart($id,$id_category,$quantity,$size_name){
    $conn =connectdb() ;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO cart(id_product,id_user,quantity,size) VALUES ('$id','$id_category','$quantity','$size_name')";
    $conn->exec($sql);

}

// function editCategory($id,$name_category){
//     $conn = connectdb();
//     $sql = "UPDATE category SET name_category='".$name_category."' WHERE id=".$id;
//     $conn -> exec($sql);
//     $row = $statement->fetch();

// }
function UpdateCart($id,$quantity){
    $conn = connectdb();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE cart SET quantity='".$quantity."' WHERE id_product=?";
    $stmt = $conn->prepare($sql); 
    $stmt->execute([$id]);

}

function getCartUser($id){
    $pdo=connectdb();
    $sql="SELECT cart.*,thumbnail,name_product,discount,price,size_name FROM ((cart join product on product.id=cart.id_product)join size on size.id=product.id ) join users on users.id=cart.id_user where id_user=$id and size=size_name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function deleteCart($id,$size_name){
    $conn=connectdb();
    $sql = "DELETE FROM cart WHERE id_product= ? and size=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id,$size_name]);
}