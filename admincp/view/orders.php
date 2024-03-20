<?php?>
<form  class="d-flex mt-3" action="index.php?action=timkiemdonhang" method="POST">
                <input class="form-control me-2" type="text" name="keywork" placeholder="Thông tin..." aria-label="Search" id="search-input">
                <input class=" btn-outline" type="submit"name="seach" value="Seach">
            </form>
<h1 class="mt-5 text-center mb-5">Đơn Hàng</h1>
    <hr>
    <div class="container">
        <form action="index.php?action=sapxep" method="post" class="mb-3">
            <select name="cars" id="cars">
                <option value="tang">Đơn hàng gần nhất</option>
                <option value="giam">Đơn hàng lâu nhất</option>
                <option value="giaT">Tiền từ thấp đến cao</option>
                <option value="giaG">Tiền từ cao đến thấp</option>
                <option value="DG">Đã giao</option>
                <option value="DgG">Đang giao</option>
                <option value="Cho">Đang chờ xử xý</option>
                <option value="DH">Đã hủy</option>
                
            </select>
            <input type="submit" value="Thực hiện" name="sapxep">
        </form>
        <table class="mt-4 fa_table  col-sm-5 bg-white shadow">
            <thead class="bg-info">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã Đơn</th>
                    <th scope="col">Tên Khách Hàng</th>
                    <th scope="col">Sản Phẩm</th>
                    <th scope="col">
                        <table class="table-items" width=100% height=100%>
                        <thead>
                            <tr><td colspan=2>Phân Loại</td></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width=50%>Size</td>
                                <td>Số Lượng</td>
                            </tr>
                        </tbody>
                    </table></th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Tổng Tiền</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col"></th>
                    
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset( $kqOrder)&& count($kqOrder)>0){
                        $i=1;
                        foreach ( $kqOrder as $items) {
                            
                            
                        echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.htmlspecialchars ($items['id']).'</td>
                        <td>'.htmlspecialchars ($items['fullname']).'</td>
                        <td>
                           <div class="d-flex justify-content-around"><p class="col-sm-8 text-start">'.htmlspecialchars ($items['name_product']).'</p> </div>
                            
                        </td>
                        <td>
                        <table class="table-items" width=100% height=100%>
                        <tbody>';
                        
                        foreach ( $kqOrder1 as $item) {
                            if ($item['id']==$items['id']) {
                               
                           
                            echo'<tr class="border-none">
                                <td width=50%>'.htmlspecialchars ($item['size_name']).'</td>
                                <td>'.htmlspecialchars ($item['quantity']).'</div>
                            </tr>';} }
                        echo'</tbody>
                    </table>

                             
                         </td>
                         </td>
                        <td>
                           <div class="d-flex justify-content-around"><p>'.htmlspecialchars ($items['address']).'</p></div>
                             
                        </td>
                         </td>
                        <td>
                           <div class="d-flex justify-content-around"><p>'.htmlspecialchars ($format_number_1 = number_format($items['total'])).'<sup>đ</sup></p></div>
                             
                        </td>
                        <td>
                           <div class="d-flex justify-content-around"><p>'.htmlspecialchars ($items['status']).'</p></div>
                             
                        </td>
                        ';
                         
                         
                         
                        
                        

                            
                           echo' <td> 
                                    <a href="index.php?action=chitietdon&id='.htmlspecialchars ($items['id']).'" class="btn " >
                                        <i class="far fa-eye"></i> Chi Tiết
                                    </a>
                                    </td> 
                            </tr>';
                        }
                        $i++;
                    }
                ?>
                
                
            </tbody>
        </table>
    </div>
      
    <div id="delete-confirm-product" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close btn" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">Do you want to see this feeback?</div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------------------------------ -->
    
    <script>
        $(document).ready(function(){
            $('button[name="feedback"]').on('click', function(e){
                e.preventDefault();
                const form = $(this).closest('form');
                const nameTd = $(this).closest('tr').find('td').eq(2);
                if (nameTd.length > 0) {
                    $('.modal-body').html(
                    `Do you want to delete "${nameTd.text()}"?`
                    );
                }
                $('#delete-confirm-product').modal({
                    backdrop: 'static', keyboard: false
                })
                .one('click', '#delete', function() {
                    form.trigger('submit');
                });
            });          
        });
    </script>