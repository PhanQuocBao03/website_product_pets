<?php
function ADDOrder($id_product,$id_user,$total,$size_name,$quanlity){
    $conn =connectdb() ;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "call addOrder(?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_user,$id_product,$quanlity,$size_name,$total]);

}
function ADDOrderDt($id_product,$id_user,$size_name,$quanlity,$id_order){
    $conn =connectdb() ;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO detail_orders(id_product,id_user,size_name,quantity,id_order) value(?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_product,$id_user,$size_name,$quanlity,$id_order]);

}
function deleteOrder($id_product,$id_user,$size_name){
    $conn=connectdb();
    $sql = "DELETE FROM cart
	WHERE id_product = ? AND id_user = ? and size=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_product,$id_user,$size_name]);
}
function getOrder() {
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size_name,quantity FROM ((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product group by id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
    
}

function getMaxid() {
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT max(id) as id from orders");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
    
}
function getSum() {
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT sum(total) as tong from orders where status='Giao thanh công'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
    
}

function getOrder1() {
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size_name,quantity FROM ((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
    
}
function getSX($keyw) {
    $conn=connectdb();
    if ($keyw=='tang') {
       
        $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size_name,quantity FROM ((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product order by created_at desc")  ;
    }
    elseif($keyw=='DG') {
       
        $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size_name,quantity FROM ((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product where status='Giao thành công'")  ;
    }
    elseif($keyw=='DgG') {
       
        $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size_name,quantity FROM ((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product where status='Đang vận chuyển'")  ;
    }
    elseif($keyw=='DH') {
       
        $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size_name,quantity FROM ((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product where status='Đã Hủy'")  ;
    }
    elseif($keyw=='Cho') {
       
        $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size_name,quantity FROM ((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product where status='Đang xử lý'")  ;
    }
    elseif($keyw=='giam') {
       
        $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size_name,quantity FROM ((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product order by created_at asc")  ;
    }
    elseif($keyw=='giaT') {
       
        $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size_name,quantity FROM ((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product order by total asc")  ;
    }
    elseif($keyw=='giaG') {
       
        $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size_name,quantity FROM ((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product order by total desc")  ;
    }
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
    
}
function getOneOrder1($id,$id_user) {
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size.size_name,quantity,thumbnail,id_product,price,email,discount,orders.created_at FROM (((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product) join size on product.id=size.id where orders.id=? and orders.id_user=? and detail_orders.size_name=size.size_name");
    $stmt->execute([$id,$id_user]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
    
}
function getOneOrder($id_user) {
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size.size_name,quantity,thumbnail,id_product,price,email,discount,orders.created_at FROM (((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product) join size on product.id=size.id where orders.id_user=? and detail_orders.size_name=size.size_name");
    $stmt->execute([$id_user]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
    
}
function getDetail_order($id) {
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size.size_name,quantity,thumbnail,id_product,price,email,discount,orders.created_at FROM (((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product) join size on product.id=size.id where orders.id=? and detail_orders.size_name=size.size_name");
    $stmt->execute([$id]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
    
}
function UpdateStatus($id,$id_user){
    $conn = connectdb();
    $sql = "UPDATE orders SET status='Đang vận chuyển' WHERE id=? and id_user=?";
    try {
        $statement = $conn->prepare($sql);
        $statement->execute([$id,$id_user]);
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }
}
function UpdateStatus1($id,$id_user){
    $conn = connectdb();
    $sql = "UPDATE orders SET status='Giao thành công' WHERE id=? and id_user=?";
    try {
        $statement = $conn->prepare($sql);
        $statement->execute([$id,$id_user]);
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }
}
function UpdateStatus2($id,$id_user){
    $conn = connectdb();
    $sql = "UPDATE orders SET status='Đã Hủy' WHERE id=? and id_user=?";
    try {
        $statement = $conn->prepare($sql);
        $statement->execute([$id,$id_user]);
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }
}
function getOneStatus1($keyw,$id_user) {
    $conn=connectdb();
    if($keyw=='dangxuly'){
        $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size.size_name,quantity,thumbnail,id_product,price,email,discount,orders.created_at FROM (((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product) join size on product.id=size.id where orders.status='Đang xử lý' and orders.id_user='$id_user' and detail_orders.size_name=size.size_name");
    }
    if($keyw=='danggiao'){
        $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size.size_name,quantity,thumbnail,id_product,price,email,discount,orders.created_at FROM (((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product) join size on product.id=size.id where orders.status='Đang vận chuyển' and orders.id_user='$id_user' and detail_orders.size_name=size.size_name");
    }
    if($keyw=='dagiao'){
        $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size.size_name,quantity,thumbnail,id_product,price,email,discount,orders.created_at FROM (((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product) join size on product.id=size.id where orders.status='Giao thành công' and orders.id_user='$id_user' and detail_orders.size_name=size.size_name");
    }
    if($keyw=='dahuy'){
        $stmt = $conn->prepare("SELECT orders.*,fullname,address,phone,name_product,size.size_name,quantity,thumbnail,id_product,price,email,discount,orders.created_at FROM (((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product) join size on product.id=size.id where orders.status='Đã Hủy' and orders.id_user='$id_user' and detail_orders.size_name=size.size_name");
    }
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
    
}
function getNumberOrder(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT count(id) as NumberOrder FROM orders ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getSeachOrder($keyw){
    $pdo=connectdb();
    $sql="SELECT orders.*,fullname,address,phone,name_product,size.size_name,quantity,thumbnail,id_product,price,email,discount,orders.created_at FROM (((orders join users on orders.id_user=users.id) join detail_orders on detail_orders.id_order=orders.id) join product on product.id=detail_orders.id_product) join size on product.id=size.id where detail_orders.size_name=size.size_name and (fullname like '%$keyw%' or phone like '%$keyw%' or status like '%$keyw%' or orders.id like '%$keyw%') ";
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

