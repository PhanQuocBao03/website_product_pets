<?php if(isset($_SESSION['id'])){?>
<section class="ab-info-main py-5">
    <div class="container py-5">
        <h3 class="title text-center mb-5">Thanh Toán</h3>
        <div>
            <h3><i class="fas fa-map-marker-alt me-3"></i>Địa chỉ nhận hàng</h3>
            <div class="d-flex h6">
                <p class="me-2"><?=$kqOneUser[0]['fullname']?></p>
                <p class="me-5"><?=$kqOneUser[0]['phone']?></p>
                <p><?=$kqOneUser[0]['address']?></p>
                <button type="button" class="border-0 text-primary bg-white ms-5 h6" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                    Thay đổi
                </button>
            </div>
            <hr>
        </div>
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index.php?action=chinhsuanguoidung" method="post" id="registration">
                    <div class="modal-body">
                            <?php
                                if(isset($err)&& $err!=""){
                                echo '<div style="color:red">'.$err.'</div>';
                                }
                            ?>
                         <div class="form-outline d-flex mb-3">
                            <label class="form-label col-sm-3 text-dark ">Họ và tên:</label>
                            <input class="intput_login col-sm-8 offset-md-1" type="text" name="fullname"VALUE = "<?=$kqOneUser[0]['fullname']?>"><br>
                        </div>
                        <div class="form-outline d-flex mb-3">
                            <label class="form-label col-sm-3 text-dark ">Địa chỉ:</label>
                            <input class="intput_login col-sm-8 offset-md-1" type="text" name="address"VALUE = "<?=$kqOneUser[0]['address']?>"><br>
                        </div>
                        <div class="form-outline d-flex mb-3">
                            <label class="form-label col-sm-3 text-dark ">SĐT:</label>
                            <input class="intput_login col-sm-8 offset-md-1" type="text" name="phone"VALUE = "<?=$kqOneUser[0]['phone']?>"><br>
                        </div>
                         
                        
                        <input class="intput_login col-sm-8 offset-md-1" type="hidden" name="id"VALUE = "<?=$kqOneUser[0]['id']?>"><br>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" VALUE="Thay đổi" name="edit-address">
                    </div>
                </form>
            </div>
            </div>
            </div>
        <form id="checkoutForm" class="form-inline ml-1"action="index.php?action=thanhtoan" method="POST">

        <div class="row contact-right-content">
           <?php
            if((isset($_SESSION['id']))){
                echo'<table>
                <tr class="">
                    <th class="p-4">Sản phẩm</th>
                    <th class="p-4">Đơn Giá</th>
                    <th class="p-4">Số Lượng</th>
                    <th class="p-4">Tiền</th>
                   
                </tr>';
                foreach($kqCart as $items){
                    $price=$items['price']-$items['price']*$items['discount']/100;
                    if (isset($items['discount'])) {
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
                            echo'<td >'.$items['quantity'].'</td>
                            <td>'.$format_number_1 = number_format($total).'<sup>đ</sup></td>
                        </tr>';
                }
                echo'</table>';
            }

            ?>
            <hr>
            <div class=" bg-white  mt-5 text-end">
                
                <?php
                $total=0;
                $tong=0;
                $myArray= array();
                foreach ($kqCart as $items) {
                    $tong=$items['quantity']*$items['price']-($items['quantity']*$items['price']*$items['discount'])/100;
                    $total+=$tong;
                
                    // Thêm thông tin từ mỗi vòng lặp vào mảng kết hợp
                    $itemData = array(  
                        'id_product' => $items['id_product'],
                        'size_name' => $items['size'],
                        'quantity' => $items['quantity'],
                        'id_user' => $_SESSION['id']
                    );
                
                    // Thêm mảng kết hợp vào mảng chính
                    $dataArray[] = $itemData;
                
                    // Hiển thị các input (nếu cần)
                    foreach ($dataArray as $index => $item){
                    echo '
                    <input type="hidden" name="data['.$index.'][id_product]" value="'.$item['id_product'].'">
                    <input type="hidden" name="data['.$index.'][size_name]" value="'.$item['size_name'].'">
                    <input type="hidden" name="data['.$index.'][quantity]" value="'.$item['quantity'].'">
                    <input type="hidden" name="data['.$index.'][id_user]" value="'.$item['id_user'].'">
                    ';
                    }
                }
                
               
                echo'  <div class="d-flex justify-content-end"><p class="col-sm-4 me-5">Tổng Tiền Hàng:</p><span class="ps-5"> '.$format_number_1 = number_format($total).'<sup>đ</sup></span></div>
                        <div class="d-flex justify-content-end"><p class="col-sm-4 me-5">Tiền vận chuyển:</p> <span class="ms-5">30,000 <sup>đ</sup></span></div>
                        <div class="d-flex justify-content-end"><p class="col-sm-4 pe-2">Tổng Thanh Toán:</p><span class="h4 text-danger ps-5"> '.$format_number_1 = number_format($total+30000).'<sup>đ</sup></span></div>
                            <input type="hidden" value="'.$format_number_1= ($total).'" class="btn bg-danger text-white"class="col-sm-2" name="total">
                            <button type="button" onclick="submitForm()"class="btn bg-danger text-white col-sm-2" name="add-order">Đặt Hàng</button>
                            
                        ';
                    
                ?>
                

            </div>
        </div>
        </form>
        
    </div>
</section>
<script>
        function submitForm() {
            document.getElementById("checkoutForm").submit();
        }
    </script>
        <?php }else header('location:index.php?action=dangnhap')?>
