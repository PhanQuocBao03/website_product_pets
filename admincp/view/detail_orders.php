<section class="container ">
    <h2>Chi tiết đơn hàng</h2>
    <hr>
    <div>
        <div class="d-flex "><h6 class="d-flex col-sm-1">Mã đơn</h6><h6><?= htmlspecialchars ($kqOneOrder[0]['id'])?></h6></div>
        <div class="d-flex "><p class="d-flex col-sm-1">Họ Tên</p><p><?= htmlspecialchars ($kqOneOrder[0]['fullname'])?></p></div>
        <div class="d-flex "><p class="d-flex col-sm-1">SĐT</p><p><?= htmlspecialchars ($kqOneOrder[0]['phone'])?></p></div>
        <div class="d-flex "><p class="d-flex col-sm-1">Email</p><p><?= htmlspecialchars ($kqOneOrder[0]['email'])?></p></div>
        <div class="d-flex "><p class="d-flex col-sm-1">Địa chỉ</p><p><?= htmlspecialchars ($kqOneOrder[0]['address'])?></p></div>
        <div class="d-flex "><p class="d-flex col-sm-1">Thời gian đặt</p><p><?= htmlspecialchars ($kqOneOrder[0]['created_at'])?></p></div>
        <div class="d-flex "><h6 class="d-flex col-sm-2 status">Trạng thái đơn</h6><p class="text-danger"><?= htmlspecialchars ($kqOneOrder[0]['status'])?></p></div>
    </div>
    <table width=75% class="border-none">
        <thead>
            <tr>
                <th colspan="2">Sản Phẩm</th>
                <th>Kích Thước</th>
                <th>Số Lượng</th>
                <th>ĐƠn Giá</th>
                <th>Sale</th>
                <th>Tiền</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $tong=0;
        $total=0;
        foreach ($kqOneOrder as $items) {
            $tong=$items['quantity']*$items['price']-$items['quantity']*$items['price']*$items['discount']/100;
            $total+=$tong;
            
            echo'
            <tr>
            <td ><img src= "../images/uploads/'.htmlspecialchars ($items['thumbnail']).'" width="70px" </td>
            <td><p>'.htmlspecialchars ($items['name_product']).'</p></td>
            <td><p>'.htmlspecialchars ($items['size_name']).'</p></td>
            <td><p>'.htmlspecialchars ($items['quantity']).'</p></td>
            <td><p>'.htmlspecialchars ($format_number_1 = number_format($items['price'])).'<sup>đ</sup></p></td>
            <td><p>'.htmlspecialchars ($items['discount']).'%</p></td>
            <td>'.htmlspecialchars ($format_number_1 = number_format($tong)).'<sup>đ</sup></p></td>

            </tr>';
        }
        $ship=0;
        if($total >= 50000 && $total <150000 ){
            $ship=15000;
        }
        if($total >= 0 && $total <50000){
            $ship = 30000;
        }
    ?>
           
        </tbody>
    </table>
    <div class="d-flex mt-2 justify-content-end w-75" >
        <p class="col-sm-3 ">Phí vận chuyển:</p><p ><?= htmlspecialchars ($format_number_1 = number_format($ship))?> <sup>đ</sup></p>
    </div>
    <div class="d-flex  justify-content-end w-75" >
        <p class="col-sm-3 ps-2">Tổng tiền:</p><p ><?= htmlspecialchars ($format_number_1 = number_format($total))?> <sup>đ</sup></p>
    </div>
    <div class="d-flex  justify-content-end w-75" >
        <p class="col-sm-3 h4">Tổng thanh toán:</p><p class="h4 text-danger"><?= htmlspecialchars ($format_number_1 = number_format($total+$ship))?> <sup>đ</sup></p>
    </div>
    <form action="index.php?action=xacnhan" method="post" class="d-flex mt-3 justify-content-end w-75" >
        <input type="hidden" value="<?= htmlspecialchars ($kqOneOrder[0]['id_user'])?>" name="id_user">
        <input type="hidden" value="<?= htmlspecialchars ($kqOneOrder[0]['id'])?>" name="id">
        <div><a href="index.php?action=donhang" class="btn bg-danger text-white">Thoát</a>
        <?php
        foreach ($kqOneOrder as $items) {
            
            if($items['status']=='Đang xử lý'){

                
                echo '<input type="submit" value="Xác nhận" class="bg-success border-0 rounded text-white shadow p-2 btn" name="confirm">';
            }else{
                echo '<input type="button" value="Xác nhận" class="btn bg-secondary text-white">';
    
            }
            break;
            }
        ?>
        <button id="printPageButton" onClick="window.print();" class="btn border">Print</button>
        </div>
    </form>
    
    
</section>



  
