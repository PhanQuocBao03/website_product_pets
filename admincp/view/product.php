
<section>
<form  class="d-flex mt-3" action="index.php?action=timkiem" method="POST">
                <input class="form-control me-2" type="text" name="keywork" placeholder="Nhập tên sản phẩm..." aria-label="Search" id="search-input">
                <input class=" btn-outline" type="submit"name="seach" value="Seach">
            </form>
   <h1 class="mt-5 text-center mb-5">Sản Phẩm</h1>
   <button type="button" class="btn border-primary" data-toggle="modal" data-target="#exampleModal">
   <i class="fas fa-plus me-2 text-primary"></i>Thêm
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Sản Phẩm</h5>
        <button type="button" class="close bg-white border-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="index.php?action=themsanpham" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
            <div class="d-flex justify-content-center">
                <label  class="col-sm-3 mt-2">Hình ảnh:</label>   
                <input class="mb-2 col-sm-5" type="file" name="thumbnail"><br>
            </div>
            <div class="d-flex justify-content-center">
                <label  class="col-sm-3" >Mã sản phẩm:</label>
                <input class="mb-2 col-sm-5" type="text" name="id_product"><br>
            </div>
            <div class="d-flex justify-content-center">
                <label  class="col-sm-3" >Tên sản phẩm:</label>
                <input class="mb-2 col-sm-5" type="text" name="name_product"><br>
            </div>
            <div class="d-flex justify-content-center">
                <label  class="col-sm-3" >Giá:</label>
                <input class="mb-2 col-sm-5" type="text" name="price"><br>
            </div>
            <div class="d-flex justify-content-center">
                <label  class="col-sm-3" >Giá Giảm:</label>
                <input class="mb-2 col-sm-5" type="text" name="discount"><br>
            </div>
            <div class="d-flex justify-content-center">
                <label  class="col-sm-3" >Kích Thước:</label>
                <select name="size" id="size" class="mb-2 col-sm-5">
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    
                </select><br>
            </div>
            <div class=" d-flex justify-content-center">
                <label  class="col-sm-3" >Số lượng:</label>
                <input type="number" class="mb-2 col-sm-5"  name="quanlity" VALUE="1" min="1"><br>
            </div>
            <div class=" d-flex justify-content-center">
                <label  class="col-sm-3" >Mô tả:</label>
                <textarea class="mb-2 col-sm-5"  name="discription"></textarea><br>
            </div>
            <div class="d-flex justify-content-center">
                <label  class="col-sm-3" >Danh mục:</label>
                <select name="id_category" id="" class="mb-2 col-sm-5">
                    <option value="0">Chọn danh mục</option>
                    <?php
                        $list_category=getCategory();
                        if (isset($list_category)) {
                            foreach($list_category as $category){
                                echo'<option value="'.htmlspecialchars( $category['id']).'">'.htmlspecialchars ($category['name_category']).'</option>';
                            }
                            # code...
                        }
                        ?>
                </select><br>
            </div>
            
                
          
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="submit-add" value="Thêm " class=" btn bg-success text-white">
        </div>
    </form>
    </div>
  </div>
</div>

    <?php?>
    <hr>
    <div class="container">
    <form action="index.php?action=sapxep" method="post" class="mb-3">
            <select name="cars" id="cars">
                <option value="tang">Tên a->z</option>
                <option value="giam">Tên z->a</option>
                <option value="maspT">MaSP từ thấp đến cao </option>
                <option value="maspG">MaSP từ Cao đến thấp </option>
                
            </select>
            <input type="submit" value="Thực hiện" name="sapxepsanpham">
        </form>
        <table class="fa_table shadow-lg rounded " style="width:100%">
            <thead class="bg-info">
                <tr>
                    <th>STT</th>
                    <th>Mã Sản Phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Tên Sản phẩm</th>
                    <th>Giá giảm</th>
                    <th>
                    <table class="table-items" width=100%>
                            <thead >
                                <tr>
                                    <td colspan="3" >Phân Loại</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width=30%>Kích Thước</td>
                                    <td width=40%>Giá</td>
                                    <td width=30%>Số Lượng</td>
                                </tr>
                            </tbody>
                        </table>
                    </th>
                    <th>Tổng số lượng</th>

                    <!-- <th>Số lượng</th> -->
                    <th ></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($kq)&& count($kq)>0){
                        $i=1;
                        
                        foreach($kq as $items){
                            
                            echo '<tr>
                            <td >'.$i.'</td>
                            <td>'.$items['id'].'</td>
                            <td><img src="../images/uploads/'.$items['thumbnail'].'"width="30px"></td>
                            <td>'.$items['name_product'].'</td>
                            <td>'.$items['discount'].'%</td>
                            <td> 
                                <table class="table-items" width=100% height=100%>
                                    <tbody>';
                                
                                        $total=0;
                                        foreach($kqS as $item){
                                            if ($item['id']===$items['id']) {
                                                $total+=$item['quanlity'] ;
                                                echo'<tr ><td width=30% >'.$item['size_name'].'</td>
                                                            <td width=40%>'.$format_number_1 = number_format($item['price']).' <sup>đ</sup></td>

                                                <td width=30%>'.$item['quanlity'].'</td></tr>';
                                            }
                                            
                                        }
                            echo'</tbody>
                            </table>
                           </td>
                           <td>'.$total.'</td>
                           
                           <td class=" ">
                                    <a href="index.php?action=chinhsuasanpham&id='.$items['id'].'"class="text-decoration-none text-dark p-0 m-0 " name=""><i class="fas fa-pencil-alt text-primary"></i>Edit</a>
                           <hr class="m-0">
                                        <form class="form-inline "action="index.php?action=sanpham" method="POST">
                                            <input type="hidden" name="id" value="'.$items['id'].'">
                                           
                                            <button type="submit" class="btn p-0" name="delete-product">
                                                <i alt="Delete" class="fa fa-trash text-danger"></i> Delete
                                            </button>
                                        </form>
                                    </td> 
                            </tr>';
                            $i++;
                            
                        }
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
                <div class="modal-body delete-form">Do you want to delete this product?</div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-success" id="delete">Delete</button>
                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------------------------------ -->
    
    <script>
        $(document).ready(function(){
            $('button[name="delete-product"]').on('click', function(e){
                e.preventDefault();
                const form = $(this).closest('form');
                const nameTd = $(this).closest('tr').find('td').eq(3);
                if (nameTd.length > 0) {
                    $('.delete-form').html(
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
</section>