<section>
<form  class="d-flex mt-3" action="index.php?action=timkiemkhachhang" method="POST">
    <input class="form-control me-2" type="text" name="keywork" placeholder="Nhập tên khách hàng..." aria-label="Search" id="search-input">
    <input class=" btn-outline" type="submit"name="seach" value="Seach">
</form>
    <h1 class="mt-5 text-center mb-5">Khách hàng</h1>
    
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nhập Thông Tin Khách Hàng</h5>
        <button type="button" class="close bg-white border-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class=" g-3 needs-validation"id="registration" novalidate action="index.php?action=themnguoidung" method="post">
      <div class="modal-body">
                <div class="col-md-8">
                  <label for="validationCustom01" class="form-label">Your name</label>
                  <input type="text" class="form-control" name="fullname" id="validationCustom01"   required>
                  
                </div>
                <div class="col-md-8">
                  <label for="validationCustom05" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="validationCustom05"   required>
                  
                </div>
                <?php if(isset($err)&& ($err)!=""){
                  echo "<div class='text-danger '> ".$err."</div>";
                }?>
                <div class="col-md-8">
                  <label for="validationCustom03" class="form-label">Phone</label>
                  <input type="text"name="phone" class="form-control" id="validationCustom06"   required>
                  
                </div>
                <div class="col-md-8">
                  <label for="validationCustom03" class="form-label">Address</label>
                  <input type="text"name="address" class="form-control"   >
                  
                </div>
                <div class="col-md-8">
                  <label for="validationCustom03" class="form-label">Password</label>
                  <input type="password"name="password" class="form-control" id="validationCustom02"   required>
                  
                </div>
                <div class="col-md-8">
                  <label for="validationCustom04" class="form-label">Repeat Password</label>
                  <input type="password" name="repass" class="form-control" id="validationCustom04"   required>
                  
                </div>
                
                
                  
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <input class="btn btn-primary" type="submit" name="submit-add" value="Thêm">
            </div>
        </form>
    </div>
  </div>
</div>
<button type="button" class="btn border-primary" data-toggle="modal" data-target="#exampleModal">
<i class="fas fa-plus me-2 text-primary"></i>Thêm
</button>

    <?php?>
    <hr>
    <div class="container">
        <table class="mt-4 fa_table col-sm-5 bg-white shadow">
            <thead class="bg-info">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Khách Hàng</th>
                    <th scope="col">Email</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col"></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($kq)&& count($kq)>0){
                        $i=1;
                        foreach ($kq as $items) {
                            echo '
                                <tr>
                                    <td>'.$i.'</td>
                                    <td>'.htmlspecialchars ($items['fullname']).'</td>
                                    <td>'.htmlspecialchars ($items['email']).'</td>
                                    <td>'.htmlspecialchars ($items['phone']).'</td>
                                    <td>'.htmlspecialchars ($items['address']).'</td>
                                    <td class=" border-0 border-bottom border-dark">
                                    <div>
                                    <a href="index.php?action=chinhsuanguoidung&id='.htmlspecialchars ($items['id']).'"class="btn border border-success"><i class="fas fa-pencil-alt text-success"></i>Edit</a>
                                    </div class="ps-3 pe-3">
                                    
                                        <form class="form-inline ml-1 mt-1 "action="index.php?action=nguoidung" method="POST">
                                            <input type="hidden" name="id" value="'.htmlspecialchars ($items['id']).'">
                                            <button type="submit" class="btn border border-danger" name="delete-category">
                                                <i alt="Delete" class="fa fa-trash text-danger"></i> Delete
                                            </button>
                                        </form>
                                    </td>                        
                                </tr>
                            ';
                            $i++;
                        }

                    }
                ?>
                
                
            </tbody>
        </table>
    </div>
    <div id="delete-confirm-category" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close btn" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body delete-from">Do you want to delete this category?</div>
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
            $('button[name="delete-category"]').on('click', function(e){
                e.preventDefault();
                const form = $(this).closest('form');
                const nameTd = $(this).closest('tr').find('td').eq(1);
                if (nameTd.length > 0) {
                    $('.delete-from').html(
                    `Do you want to delete "${nameTd.text()}"?`
                    );
                }
                $('#delete-confirm-category').modal({
                    backdrop: 'static', keyboard: false
                })
                .one('click', '#delete', function() {
                    form.trigger('submit');
                });
            });          
        });
    </script>
</section>