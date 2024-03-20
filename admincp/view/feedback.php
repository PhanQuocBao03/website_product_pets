<?php?>
<h1>Phản hồi</h1>
    <hr>
    <div class="container">
        <table class="mt-4 table table-bordered col-sm-5">
            <thead >
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Khách Hàng</th>
                    <th scope="col">Nội Dung</th>
                    
                    <th scope="col"></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($kq)&& count($kq)>0){
                        $i=1;
                        foreach($kq as $items){
                            echo '<tr>
                            <td>'.$i.'</td>
                            <td>'.htmlspecialchars ($items['fullname']).'</td>
                            <td>'.htmlspecialchars( $items['content']).'</td>
                            <td class="d-flex">
                                    
                                    <strong class="pt-1">|</strong>
                                        <form class="form-inline ml-1"action="index.php?action=sanpham" method="POST">
                                            <input type="hidden" name="id" value="'.htmlspecialchars ($items['id']).'">
                                            <button type="submit" class="btn" name="feedback">
                                            <i class="far fa-eye"></i></i> Xem
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