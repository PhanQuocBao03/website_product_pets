<section>

    <h1 class="mt-5 text-center mb-5">Liên hệ</h1>
    
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nhập Thông Tin Khách Hàng</h5>
        <button type="button" class="close bg-white border-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>

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
                    <th scope="col">Nội dung</th>
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
                                    <td>'.htmlspecialchars ($items['content']).'</td>
                                    <td class=" border-0 border-bottom border-dark">
                                        <form class="form-inline ml-1 mt-1 "action="index.php?action=nguoidung" method="POST">
                                            <input type="hidden" name="id" value="'.htmlspecialchars ($items['id']).'">
                                            <button type="submit" class="btn border border-success" name="delete-category">
                                                <i alt="Delete" class="far fa-eye "></i> Xem
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
                    <h4 class="modal-title">Nội dung</h4>
                    <button type="button" class="close btn" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body delete-from">Do you want to delete this category?</div>
                <div class="modal-footer">
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
                const nameTd = $(this).closest('tr').find('td').eq(5);
                if (nameTd.length > 0) {
                    $('.delete-from').html(
                    `${nameTd.text()}`
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