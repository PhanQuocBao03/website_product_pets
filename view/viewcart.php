<?php if(isset($_SESSION['id'])){?>

<section class="ab-info-main py-5">
    <div class="container py-5">
        <h3 class="title text-center mb-5">Giỏ Hàng</h3>
        <?php
            if (isset($err)) {
                echo $err;
            }
        ?>
        <div class="row contact-right-content">
           <?php
            if((isset($_SESSION['id']))){
                echo'<table>
                <tr class="border ">
                    <th class="p-4">Sản phẩm</th>
                    <th class="p-4">Đơn Giá</th>
                    <th class="p-4">Số Lượng</th>
                    <th class="p-4">Tiền</th>
                    <th class="p-4">Thao Tác</th>
                </tr>';
                foreach($kqCart as $items){

                   
                    $price=$items['price']-$items['price']*$items['discount']/100;
                    if ($items['discount']>0) {
                        $total=$items['quantity']*$price;
                    }else{
                        
                        $total=$items['quantity']*$items['price'];
                    }
                    echo'<tr class="border">
                            <td class="d-flex "><img src= "../images/uploads/'.htmlspecialchars ($items['thumbnail']).'" width="70px" class="me-2 ms-2"><h6 class="pt-4 col-sm-4 ms-3">'.$items['name_product'].'</h6> <div class="ms-5"><p>Phân Loại:</p><div>'.$items['size'].'</div></td>';
                            if(isset($items['discount'])){
                                echo'
                                    <td>'.$format_number_1 = number_format($price).'<sup>đ</sup></td>
                                
                                ';
                            }else {
                                echo'
                                    <td>'.$format_number_1 = number_format($items['price']).'<sup>đ</sup></td>
                                
                                ';
                            }
                           echo' <td><input type="number" value="'.$items['quantity'].'" min="1" class="col-sm-2"></td>
                            <td>'.$format_number_1 = number_format($total).'<sup>đ</sup></td>
                            <td><form class="form-inline ml-1"action="index.php?action=giohang" method="POST">
                            <input type="hidden" name="id" value="'.htmlspecialchars ($items['id_product']).'">
                            <input type="hidden" name="size_name" value="'.htmlspecialchars ($items['size_name']).'">
                            <input type="submit" class="btn   mt-1 " name="delete-product" value="Delete">
                                <i alt="Delete" class="fa fa-trash"></i>
                            
                        </form></td>
                        </tr>';
                }
                echo'</table>';
            }

            ?>
            <input type="text" name="content" >
            <div class="d-flex bg-white justify-content-between mt-5 ">
                <a href="index.php?action=deletecart" class="btn text-danger col-sm-1">Xóa</a>
                <?php
                $total=0;
                foreach($kqCart as $items){
                    $price=$items['price']-$items['price']*$items['discount']/100;

                    if ($items['discount']>0) {
                        $total+= ($items['quantity']*$price);

                    }else {
                       
                        $total+= ($items['quantity']*$items['price']);
                    }
                }
                echo'  <p class="col-sm-2">Tổng thanh toán: '.$format_number_1 = number_format($total).'<sup>đ</sup></p>';
                ?>
                <a href="index.php?action=thanhtoan" class="btn bg-danger text-white"class="col-sm-2">Mua hàng</a>
            </div>
        </div>
        <div class="row contact-left-content">
            <!-- left -->
        </div>
    </div>
</section>
        <?php }else header('location:index.php?action=dangnhap')?>
