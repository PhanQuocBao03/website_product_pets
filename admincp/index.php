    
<?php
session_start();
ob_start();
include_once __DIR__ . '/../db/db_connect.php';
// include_once __DIR__ . '/../view/head.php';
include_once __DIR__ . '/../modual/user.php';
include_once __DIR__ . '/../modual/conntact.php';
include_once __DIR__ . '/../modual/category.php';
include_once __DIR__ . '/../modual/feedback.php';
$list_category=getCategory();
include_once __DIR__ . '/../modual/product.php';
$kqS=getSize();
include_once __DIR__ . '/../modual/orders.php';
$kqOrd=getOrder();
$kqSum=getSum();
if(isset($_SESSION['role']) && ($_SESSION['role'])==1){

    include_once __DIR__ . '/view/head.php';
    include_once __DIR__ . '/view/navbar.php';

    echo '<div class="d-flex row bg-light pt-0">';
        include_once __DIR__ . '/view/menu.php';
        echo '<div class="col-sm-10 ">';
            if(isset($_GET['action'])){
                switch($_GET['action']){
                    case 'trangchu':
                        $kq=get_numberUser();
                        $kqCT=getNumberProduct();
                        $kqOd=getNumberOrder();
                        include_once __DIR__ . '/view/dashboard.php';
                        break;
                    case 'danhmuc':
                        if(isset($_POST['name_category'])&&($_POST['name_category'])!=""){
                            $name_category=$_POST['name_category'];
                            $kq=ADDCategory($name_category);
                        }
                        if(isset($_POST['id']) && is_numeric($_POST['id'])&& ($_POST['id']>0) ){
                            $id=$_POST['id'];
                            $kqdl=deleteCategory($id);
                            $kq=getCategory();

                            include_once __DIR__ . '/view/category.php';
                        }
                        $kq=getCategory();
                        include_once __DIR__ . '/view/category.php';
                        break;
                    case 'chinhsuadanhmuc':
                       if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $kqone=getOneCategory($id);
                        $kq=getCategory();
                       include_once __DIR__ . '/view/update_category.php';

                       }
                       if(isset($_POST['name_category'])&&($_POST['name_category'])!=""){
                        $id=$_POST['id'];
                        $name_category=$_POST['name_category'];
                        UpdateCategory($id,$name_category);
                        $kq=getCategory();
                        include_once __DIR__ . '/view/category.php';
                       }

                        break;
                    case 'sanpham':
                        $list_category=getCategory();
                        if(isset($_POST['id'])){
                                $id=$_POST['id'];
                                $kqdl=deleteProduct($id);
                                $kq=getProduct();
                                include_once __DIR__ . '/view/product.php';
                        }
                        $kq=getProduct();
                        include_once __DIR__ . '/view/product.php';
                        break;
                    case 'themsanpham':
                        
                        if(isset($_POST['submit-add'])&&($_POST['submit-add'])){
                            $target_dir = "../images/uploads/";            
                            $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
                            $thumbnail=$_FILES["thumbnail"]["name"];
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif" ) {
                                $uploadOk = 0;
                            }
                            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
                            $id=$_POST['id_product'];
                            $name_product=$_POST['name_product'];
                            $price=$_POST['price'];
                            $discount=$_POST['discount'];
                            $size_name=$_POST['size'];
                           
                            $discription=$_POST['discription'];
                            $id_category=$_POST['id_category'];
                            if(isset($_POST['quanlity'])&&($_POST['quanlity']>0)){
                                $quanlity=$_POST['quanlity'];
                            }else {$quanlity=1;}
                            
                            $fg=0;
                            $kqsize=getOneSize($id);
                            foreach($kqsize as $items){
                                if($items['id']==$id && $items['size_name']==$size_name){
                                    
                                    $quanlity=$quanlity+$items['quanlity'];
                                    $kq=Updatesize($id,$size_name,$quanlity);
                                    $fg=1;
                                    break;
                                }
                                elseif ($items['id']==$id && $items['size_name']!=$size_name) {
                                    $kq=addsizename($id,$size_name,$price,$quanlity);
                                    $fg=1;
                                    break;
                                }
                            }
                            if($fg==0){
                                
                                $kqAdd=ADDProduct($id,$thumbnail,$name_product,$price,$discount,$discription,$id_category,$size_name,$quanlity);
                               

                            }
                            
                            header('location:index.php?action=sanpham');
                        }
                        break;
                    case 'productDogs':
                        if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $kq=getProductct($id,"");
                            include_once __DIR__ . '/view/product.php';

                        }
                        // include_once __DIR__ . '/view/dashboard.php';
                        break;
                    case 'productCats':
                        if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $kq=getProductct($id,"");
                            include_once __DIR__ . '/view/product.php';
    
                            }
                            // include_once __DIR__ . '/view/dashboard.php';
                            break;
                    case 'productSmall Pets':
                        if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $kq=getProductct($id,"");
                            include_once __DIR__ . '/view/product.php';
            
                        }
                                    // include_once __DIR__ . '/view/dashboard.php';
                        break;
                    case 'chinhsuasanpham':
                        $list_product= getProduct();
                        include_once __DIR__ . '/view/update_product.php';
                        break;
                    case 'nguoidung':
                        if(isset($_POST['id']) && is_numeric($_POST['id'])&& ($_POST['id']>0) ){
                            $id=$_POST['id'];
                            $kqdl=DeleteUsers($id);
                            $kq=get_AllUsers();
                            include_once __DIR__ . '/view/user.php';
                        }
                        $kq=get_AllUsers();
                        include_once __DIR__ . '/view/user.php';
                        break;
                    // case 'phanhoi':
                    //     $kq=getAllFeedback();
                    //     include_once __DIR__ . '/view/feedback.php';
                    //     break;
                    case 'themnguoidung':
                        if (isset($_POST['submit-add']) && $_POST['submit-add']) {
                            $fullname = $_POST['fullname'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];
                            $password = $_POST['password'];
                            $kqF=get_Oneprofile($email);
                            if(count($kqF)>0){
                                $err="Email đã tồn tại!!";
                            }else{
                                inset_addcount($fullname,$email,$phone,$address,$password);
                                header ('location:index.php?action=nguoidung');
        
                            }
                            
               
                        }

                        include_once __DIR__ . '/view/user.php';
                        break;
                    case 'chinhsuanguoidung':
                        $list_user= get_AllUsers();
                        include_once __DIR__ . '/view/update_user.php';
                        break;
                    case 'timkiemkhachhang':
                        if(isset($_POST['seach'])&&$_POST['seach']){
                            $keyw=$_POST['keywork'];
                            $kq=getSeachUser($keyw);
                            include_once __DIR__ . '/view/user.php';
    
                        }
                        
                        break;
                    case 'donhang':
                        $kqOrder=getOrder();
                        $kqOrder1=getOrder1();
                        include_once __DIR__ . '/view/orders.php';
                        break;
                    case 'sapxep':
                        if(isset($_POST['sapxep'])&&$_POST['sapxep']){

                        $keyw=$_POST['cars'];
                        $kqOrder=getSX($keyw);
                        $kqOrder1=getSX($keyw);
                        include_once __DIR__ . '/view/orders.php';
                        }
                        if(isset($_POST['sapxepsanpham'])&&$_POST['sapxepsanpham']){

                            $keyw=$_POST['cars'];
                            $kq=getSXProduct($keyw);
                            include_once __DIR__ . '/view/product.php';
                            }
                        break;
                    case 'xacnhan':
                        if (isset($_POST['confirm'])&&($_POST['confirm'])) {
                            $id=$_POST['id'];
                            $id_user=$_POST['id_user'];
                            $kq=UpdateStatus($id,$id_user);
                        }
                        header('location:index.php?action=donhang');

                        break;
                    case 'chitietdon':
                        if (isset($_GET['id'])) {
                            $id=$_GET['id'];
                        $kqOneOrder=getDetail_order($id);
                        }
                        include_once __DIR__ . '/view/detail_orders.php';

    
                            break;
                    case 'timkiemdonhang':
                        if(isset($_POST['seach'])&&$_POST['seach']){
                            $keyw=$_POST['keywork'];
                            $kqOrder=getSeachOrder($keyw);
                            $kqOrder1=getSeachOrder($keyw);
                            include_once __DIR__ . '/view/orders.php';

                        }
                        break;
                    case 'thoat':
                        session_unset();
                        session_destroy();
                        header('location:../public/index.php?action=dangnhap');
                        break;
                    case 'timkiem':
                   
                            if(isset($_POST['seach'])&&$_POST['seach']){
                                $keyw=$_POST['keywork'];
                                $kq= getSeach($keyw);
                                include_once __DIR__ . '/view/product.php';
        
                            }
                            if(isset($_POST['M'])&&$_POST['M']){
                                $keyw='M';
                                $kq= getSeach($keyw);
                                include_once __DIR__ . '/view/product.php';
        
                            }
                            if(isset($_POST['L'])&&$_POST['L']){
                                $keyw='L';
                                $kq= getSeach($keyw);
                                include_once __DIR__ . '/view/product.php';
        
                            }
                            if(isset($_POST['XL'])&&$_POST['XL']){
                                $keyw='XL';
                                $kq= getSeach($keyw);
                                include_once __DIR__ . '/view/product.php';
        
                            }
                        
                                
                            break;   
                        case 'lienhe':
                            $kq=get_AllConntact();
                            include_once __DIR__ . '/view/contact.php';

                            break; 
                    default:
                        include_once __DIR__ . '/view/dashboard.php';
                        break;
                   
                        

                }
                
            }else  header ('location:index.php?action=trangchu');
            include_once __DIR__ . '/view/foodter.php';

        echo '</div>';

    echo '</div>';
    
}else{
    unset($_SESSION['role']);
    header('location:../public/index.php?action=dangnhap');
}
?>

    
