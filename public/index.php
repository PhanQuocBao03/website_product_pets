<?php 
    session_start();
    ob_start();
    include_once __DIR__ . '/../db/db_connect.php';
    include_once __DIR__ . '/../modual/user.php';
    include_once __DIR__ . '/../modual/cart.php';
    include_once __DIR__ . '/../modual/category.php';
    $list_category=getCategory();
    include_once __DIR__ . '/../modual/product.php';
    $list_product=getProduct();
    

    include_once __DIR__ . '/../modual/favourite.php';
    $kqfavorite=getfavorite();
    include_once __DIR__ . '/../modual/orders.php';
    include_once __DIR__ . '/../modual/conntact.php';
    // print_r($_SESSION);  
    if(isset($_SESSION['id'])){
        $id_user=$_SESSION['id'];
        $kqCart=getCartUser($id_user);
        $kqFav=getFavtUser($id_user);
        $kqOneUser=get_OneUsers($id_user);
        $kqAllOder=getOneOrder($id_user);


    }
    include_once __DIR__ . '/../view/head.php';
    include_once __DIR__ . '/../view/navbar.php';
    if(isset($_GET['action'])){
        switch ($_GET['action']) {
            case 'dangnhap':
                if (isset($_POST['submit_signin']) && $_POST['submit_signin']) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $kq=get_profile($email,$password);
                    if(isset($kq)&& count($kq)>0)
                    {
                    $role=$kq[0]['role'];
                    $id=$kq[0]['id'];
                      if($role==1){
                        $_SESSION['role']=$role;
                        $_SESSION['id']=$id;

                        header('location:../public/index.php');
        
                    }
                    else{
                        $_SESSION['role']=$role;
                        $_SESSION['id']=$id;
                        header ('location:../public/index.php');
                    }
                  }
                    else{
                      $err="Email Hoặc Mật Khẩu Không Đúng!";
                    }           
                }
                include_once __DIR__ . '/../view/login.php';
                break;
            case 'thoat':
                session_unset();
                header ('location:index.php?action=trangchu');
                break;
            case 'dangky':
                if (isset($_POST['submit_register']) && $_POST['submit_register']) {
                    $fullname = $_POST['fullname'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $password = $_POST['password'];
                    $kqF=get_Oneprofile($email);
                    if(count($kqF)>0){
                        $err="Email đã tồn tại!!";
                    }else{
                        insetaddcount($fullname,$email,$password);
                        header ('location:index.php?action=dangnhap');

                    }
                    
       
                }

                include_once __DIR__ . '/../view/register.php';
                break;
            case 'doimatkhau':
                if(isset($_POST['update-password'])&&$_POST['update-password']){
                    $password=$_POST['password'];
                    $newpassword=$_POST['newpassword'];
                    $renewpassword=$_POST['renewpassword'];
                    foreach ( $kqOneUser as $items) {
                        if ($password==$items['password']) {
                            $kq=updatepassword($newpassword,$id_user);
                            session_unset();
                            session_destroy();
                            header('location:index.php?action=dangnhap');

                        }else{$err="Mật Khẩu không đúng!";}
                    }
                }

               
                break;
                case 'tatcasanpham':
                    
                    include_once __DIR__ . '/../view/product.php';

                    break;
                case 'productDogs':
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $kqproduct=getProductct($id,"");
                        include_once __DIR__ . '/../view/product.php';

                    }
                    // include_once __DIR__ . '/view/dashboard.php';
                    break;
                case 'productCats':
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $kqproduct=getProductct($id,"");
                        include_once __DIR__ . '/../view/product.php';

                        }
                        // include_once __DIR__ . '/view/dashboard.php';
                        break;
                case 'productSmall Pets':
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $kqproduct=getProductct($id,"");
                        include_once __DIR__ . '/../view/product.php';
        
                    }
                                // include_once __DIR__ . '/view/dashboard.php';
                    break;
                case 'sanphamchitiet':
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $kqproduct=getOneProduct($id);
                        $kqOneFav=getOneFav($id);
                        $kqSize=getOneSize($id);
                        $kqM=getSizeM($id);

                        include_once __DIR__ . '/../view/detail_product.php';
                    } 
                    break;
                case 'thanhtoan':
                    if(count($kqCart)>0){

                        include_once __DIR__ . '/../view/order.php';
                    }else {
                        header ('location:index.php?action=giohang');
                        


                    }
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        
                        $dataArrayFromForm = $_POST['data'];
                        // print_r($dataArrayFromForm);
                        $total=$_POST['total'];
                        $element=false;
                        foreach ($dataArrayFromForm as $items) {
                           $id_product=$items['id_product'];
                           $size_name=$items['size_name'];
                           $quanlity=$items['quantity'];
                           if(!$element){
                                $id_user=$items['id_user'];
                               $kqOrder=ADDOrder($id_product,$id_user,$total,$size_name,$quanlity);
                               $element=true;
                           }else{
                            $kqod=getMaxid();
                            foreach ($kqod as $items) {
                                $id_order=$items['id'];
                                $kq=ADDOrderDt($id_product,$id_user,$size_name,$quanlity,$id_order);
                                $dele=deleteOrder($id_product,$id_user,$size_name);
                                break;
                            }

                           }
                           
                        }
                        header ('location:index.php?action=giohang');

                    
                    
                    }

                        
                    
                    

                    // include_once __DIR__ . '/../view/order.php';
                        
                    break;
                case 'addtocart':
                    if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                        if(isset($_SESSION['id'])&&($_SESSION['id'])>0){
                            $id_user=$_SESSION['id'];
                            $id=$_POST['id'];
                            $thumbnail=$_POST['thumbnail'];
                            $name_product=$_POST['name_product'];
                            $price=$_POST['price'];
                            $size_name=$_POST['size_name'];
                            if(isset($_POST['quantity'])&&($_POST['quantity']>0)){
                                $quantity=$_POST['quantity'];
                            }else {$quantity=1;}
                            
                            $fg=0;
                            $kqCart=getCartUser($id_user);
                            foreach($kqCart as $items){
                                if($items['name_product']==$name_product && $items['size']==$size_name ){
                                    
                                    $quantity=$quantity+$items['quantity'];
                                    $kq=UpdateCart($id,$quantity);
                                    $fg=1;
                                    break;
                                }
                            }
                            if($fg==0){
                                
                               $kq=ADDCart($id,$id_user,$quantity,$size_name,$price);
                            }
                            
                            header('location:index.php?action=giohang');
                        }else{
                            
                            header('location:index.php?action=dangnhap');
                        }
                    }
                    if(isset($_POST['favourite'])&&($_POST['favourite'])){
                        if(isset($_SESSION['id'])&&($_SESSION['id'])>0){
                            $id_user=$_SESSION['id'];
                            $id=$_POST['id'];
                            $thumbnail=$_POST['thumbnail'];
                            $name_product=$_POST['name_product'];
                            $price=$_POST['price'];
                            $kq=ADDFavourite($id,$id_user);
                            header('location:index.php?action=sanphamyeuthich');
                        }else{
                            
                            header('location:index.php?action=dangnhap');
                        }
                    }
                    
                    
                    break;
                case 'giohang':
                    if(isset($_POST['delete-product'])&&($_POST['delete-product'])){
                        $id=$_POST['id'];
                        $size_name=$_POST['size_name'];
                        $kq=deleteCart($id,$size_name);
                        header ('location:index.php?action=giohang');

                    }
                    
                    include_once __DIR__ . '/../view/viewcart.php';

                    break;
                case 'sanphamyeuthich':
                    if(isset($_POST['delete-product'])&&($_POST['delete-product'])){
                        $id=$_POST['id'];
                        $kq=deletefavorite($id);
                        
                        header ('location:index.php?action=sanphamyeuthich');

                    }
                    include_once __DIR__ . '/../view/viewfavourite.php';

                    break;
                
                case 'sanphamcogiaduoi100000':
                    

                        $kqproduct=getProductPriceUnder();
                        include_once __DIR__ . '/../view/product.php';
    
                        break; 
                case 'sanphamcogiatu100000den1000000':
                    

                    $kqproduct=getProductTomall();
                        include_once __DIR__ . '/../view/product.php';
        
                            break;
                case 'sanphamcogiatu1000000den2000000':
                    $kqproduct=getProductTo();
                        include_once __DIR__ . '/../view/product.php';
        
                        break;
                case 'sanphamcogiatren2000000':
                            $kqproduct=getProductTobig();
                                include_once __DIR__ . '/../view/product.php';
                
                                break;
                case 'lienhe':
                    if(isset($_POST['conntact'])){
                        $id=$_POST['id'];
                        $comment=$_POST['comment'];
                        $kqConntact=addConntact($id,$comment);
                        include_once __DIR__ . '/../view/contact.php';

                    }
                    include_once __DIR__ . '/../view/contact.php';
                case 'timkiem':
                   
                    if(isset($_POST['seach'])&&$_POST['seach']){
                        $keyw=$_POST['keywork'];
                        $kqproduct= getSeach($keyw);
                        include_once __DIR__ . '/../view/product.php';

                    }
                    if(isset($_POST['M'])&&$_POST['M']){
                        $keyw='M';
                        $kqproduct= getSeach($keyw);
                        include_once __DIR__ . '/../view/product.php';

                    }
                    if(isset($_POST['L'])&&$_POST['L']){
                        $keyw='L';
                        $kqproduct= getSeach($keyw);
                        include_once __DIR__ . '/../view/product.php';

                    }
                    if(isset($_POST['XL'])&&$_POST['XL']){
                        $keyw='XL';
                        $kqproduct= getSeach($keyw);
                        include_once __DIR__ . '/../view/product.php';

                    }
                
                        
                     break;    
                case 'chinhsuanguoidung':
                    if(isset($_POST['edit-user'])&&($_POST['edit-user'])){
                        $id=$_POST['id'];
                        $fullname=$_POST['fullname'];
                        $phone=$_POST['phone'];
                        $address=$_POST['address'];
                        $kq=updateUsers($id,$fullname,$phone,$address);
                        header('location:index.php');
                    }
                    if(isset($_POST['edit-address'])&&($_POST['edit-address'])){
                        $id=$_POST['id'];
                        $fullname=$_POST['fullname'];
                        $phone=$_POST['phone'];
                        $address=$_POST['address'];
                        $kq=updateUsers($id,$fullname,$phone,$address);
                        header('location:index.php?action=thanhtoan');
                    }
                    break;
                case 'hotro':
                    include_once __DIR__ . '/../view/help.php';
                    break;
                case 'admin':
                    header('location:../admincp/index.php');
                    break;
                case 'xemdonhang':
                    $keyw='dangxuly';
                    $kqStatus=getOneStatus1($keyw,$id_user);
                    include_once __DIR__ . '/../view/vieworder.php';

                    break;
                case 'trangthai':
                    if (isset($_GET['keyw'])) {
                       $keyw=$_GET['keyw'];
                       $kqStatus=getOneStatus1($keyw,$id_user);
                       include_once __DIR__ . '/../view/vieworder.php';
                    }
    
                        break;
                case 'xacnhan':
                    if (isset($_POST['receive'])&&($_POST['receive'])) {
                        $id=$_POST['id'];
                        $kq=UpdateStatus1($id,$id_user);
                        header('location:index.php?action=xemdonhang');
                        
                    }
                    if (isset($_POST['cancel'])&&($_POST['cancel'])) {
                        $id=$_POST['id'];
                        $kq=UpdateStatus2($id,$id_user);
                        header('location:index.php?action=xemdonhang');
                        
                    }
                    break;
                
    



            default:
            
                header('location:index.php');

            // include_once __DIR__ . 'index.php';
            break;
        }
    }else{
        
        include_once __DIR__ . '/../view/navbar.php';
        include_once __DIR__ . '/index.php';
        include_once __DIR__ . '/../view/carousel.php';
        include_once __DIR__ . '/../view/main.php';

    }
    include_once __DIR__ . '/../view/footer.php';
