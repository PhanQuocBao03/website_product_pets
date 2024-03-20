<?php
function ADDFavourite($id_product,$id_category){
    $conn =connectdb() ;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO favourite(id_product,id_user) VALUES ('$id_product','$id_category') limit 1";
    $conn->exec($sql);

}
function getFavtUser($id){
    $pdo=connectdb();
    $sql="SELECT favourite.*,thumbnail,name_product,price,name_category FROM (((favourite join product on product.id=favourite.id_product)join size on size.id=product.id)  join users on users.id=favourite.id_user)join category ON product.id_category=category.id where  id_user=$id group by product.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getOneFav($id){
    $conn=connectdb();
    $sql="SELECT favourite.*,thumbnail,name_product,price,name_category FROM (((favourite join product on product.id=favourite.id_product)join size on size.id=product.id)  join users on users.id=favourite.id_user)join category ON product.id_category=category.id where  id_product=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function getfavorite(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT name_product,thumbnail,name_category,sl, ct.id FROM (fv_favorite fv JOIN product pr ON fv.id_product=pr.id)join category ct ON ct.id=pr.id_category ORDER by sl DESC LIMIT 2;");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function deletefavorite($id){
    $conn=connectdb();
    $sql = "DELETE FROM favourite WHERE id_product=? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
}