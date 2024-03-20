<section class=" container">
    <a href="index.php?action=xemdonhang" class="text-dark text-decoration-none "><h2 class="text-center">Đơn Hàng</h2></a>
<form class=" ml-1 mt-3 "action="index.php?action=xacnhan" method="POST" width=100%>
    <div class="d-flex justify-content-center pb-3">
        <a  href="index.php?action=trangthai&keyw=dangxuly" class="ms-5 text-dark text-decoration-none">Chờ xác nhận </a>
        <a  href="index.php?action=trangthai&keyw=danggiao" class="ms-5 text-dark text-decoration-none">Đang giao </a>
        <a  href="index.php?action=trangthai&keyw=dagiao" class="ms-5 text-dark text-decoration-none">Đã giao </a>
        <a  href="index.php?action=trangthai&keyw=dahuy" class="ms-5 text-dark text-decoration-none">Đã hủy </a>
    </div>
    <hr>
    <div>
        <div>
            <h6>Địa Chỉ</h6>
            <?php
                if(isset($kqStatus)&& count($kqStatus)>0 ){
            echo'<p><i class="fas fa-map-marker-alt me-3"></i>'.htmlspecialchars ($kqStatus[0]['address']).'</p>';
        }else{
            echo'<p><i class="fas fa-map-marker-alt me-3"></i>'.htmlspecialchars ( $kqAllOder[0]['address']).'</p>';
        }
            ?>
        </div>
       
        <div>
          
            
            <?php
            if((isset($_SESSION['id']))){
                echo' <table class="mt-4 fa_table">
                <thead >
                    <tr>
                        <th scope="col">Sản Phẩm</th>
                        <th scope="col">Số Lương</th>
                        <th scope="col">Đơn Giá</th>
                        <th scope="col">Tiền</th>
                        <th scope="col">Trạng Thái</th>
                        
                        
                        
                        
                    </tr>
                </thead>
                <tbody>';
                    
                        if(isset($kqStatus)&& count($kqStatus)>0 ){
                           
                            $i=1;
                            $tong=0;
                            $total=0;
                            
                           
                            foreach( $kqStatus as $items){
                                $tong = $items['quantity'] * $items['price'];
                               $total+=$tong;
                            echo '<tr>
                            
                                
                            
                               <td> <div class="d-flex justify-content-around mb-2"><img src="../images/uploads/'.htmlspecialchars ($items['thumbnail']).'" width=50px><p>'.htmlspecialchars ($items['name_product']).'</p> <p>Size: '.htmlspecialchars ($items['size_name']).'</p></div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-around"><p>'.htmlspecialchars ($items['quantity']).'</p></div>
                            </td>
                             <td> <div class="d-flex justify-content-around"><p>'.htmlspecialchars ($format_number_1 = number_format($items['price'])).'<sup>đ</sup></span></p></div>
                                </td>
                             <td>
                          
                             <div class="d-flex justify-content-around"><p>'.htmlspecialchars ($format_number_1 = number_format($tong)).'<sup>đ</sup></span></p></div>
                                </td>
                             
                             </td>
                           
                            
                            <td>
                             <div class="d-flex justify-content-around"><p>'.htmlspecialchars ($items['status']).'</p></div>
                               
                                 
                            
                            </td>
                             
                             
                                </tr>';
                                $i++;
                        }
                    
                    
               echo' </tbody>
            </table>';
            }}

            ?>
            <hr>
            <div class=" d-flex justify-content-end">

                <table class="col-sm-5">
                    <tr>
                        <td class="col-sm-10"><p >Tổng Tiền Hàng:</p></td>
                        <?php if(isset($kqStatus)&& count($kqStatus)>0 ){
                        echo'<td><span class="ps-5">'.$format_number_1 = number_format($total).'<sup>đ</sup></span></td>';}?>
                        
                    </tr>
                    <tr>
                        <td class="col-sm-2 "><p >Tiền vận chuyển:</p></td>
                        <td>
                            <?php if(isset($kqStatus)&& count($kqStatus)>0 ){
                                    if( 150000 < $total || $total==0){
                                        $ship=0;
                                        echo'<span class="ms-5">'.$format_number_1 = number_format($ship)  .'<sup>đ</sup></span>';
                                    }else{
                                        if($total>=50000){
                                            $ship=15000;
                                            echo'<span class="ms-5">'.$format_number_1 = number_format($ship) .'<sup>đ</sup></span>';
                                        }else{
                                            $ship=30000;
                                            echo'<span class="ms-5">'.$format_number_1 = number_format($ship) .'<sup>đ</sup></span>';
                                        }
                                        
                                    }}
                                    ?> 
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2 "><p >Tổng Thanh Toán:</p></td>
                        <?php  if(isset($kqStatus)&& count($kqStatus)>0 ){
                       echo' <td><span class="h4 text-danger ps-5">'.$format_number_1 = number_format($total+$ship).'<sup>đ</sup></span></td>';}?>
                    </tr>
                </table>
            </div>
        </div>

    </div>
                <div class="d-flex justify-content-end mb-5 mt-2">
                    
                    
                    <?php foreach ($kqStatus as $items){
                       echo' <input type="hidden" name="id" VALUE="'.$items['id'].'" class="btn bg-danger text-white me-3">';
                        if ($items['status']=='Đang xử lý') {
                            echo'
                            <input type="submit" name="cancel" VALUE="Hủy đơn" class="btn bg-danger text-white me-3">

                            <input type="submit" name="receive" VALUE="Liên hệ shop" class="btn bg-success text-white">

                        ';
                        break;
                        }
                        if($items['status']=='Giao thành công'){
                            echo'
                            <input type="submit" name="rebuy" VALUE="Mua lại" class="btn bg-danger text-white me-3">

                            <input type="submit" name="receive" VALUE="Đánh giá" class="btn bg-success text-white">

                        ';
                        break;
                            
                        }
                        if ($items['status']=='Đã Hủy') {
                            echo'
                            <input type="submit" name="rebuy" VALUE="Mua lại" class="btn bg-danger text-white me-3">
                        ';
                        }
                        else{
                            echo '<input type="submit" name="receive" VALUE="Đã nhận hàng" class="btn bg-success text-white">';

                        }
                        break;
                    }?>

                </div>
</form>
    
</section>