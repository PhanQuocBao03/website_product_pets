<section>
<form  class="d-flex mt-3" action="index.php?action=timkiem" method="POST">
    <input class="form-control me-2" type="text" name="keywork" placeholder="Nhập tên danh mục..." aria-label="Search" id="search-input">
    <input class=" btn-outline" type="submit"name="seach" value="Seach">
</form>

    <h1 class="mt-5 mb-5">Danh mục</h1>
    <button type="button" class="btn border-primary" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-plus me-2 text-primary"></i>Thêm
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
        <button type="button" class="close border-0 bg-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="index.php?action=danhmuc" method="post">
      <div class="modal-body">
        <label for="nameCatrgory">Tên danh mục :</label>
        <input type="text"  name ="name_category">
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Thêm" class="btn bg-success ms-2" name="submit-add">
    </div>
</form>
    </div>
  </div>
</div>
    
    <?php?>
    <hr>
    <div class="container">
        <table class="mt-4 fa_table col-sm-5 bg-white shadow " >
            <thead class="bg-info">
                <tr >
                    <th scope="col">STT</th>
                    <th scope="col">Tên danh mục</th>
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
                                    <td>'.htmlspecialchars ($items['name_category']).'</td>
                                    <td class=" border-0 border-bottom border-dark">
                                        <div class="ps-3 pe-3">
                                            <a href="index.php?action=chinhsuadanhmuc&id='.htmlspecialchars($items['id']).'"class="btn border-success mt-1 col-sm-2 " ><i class="fas fa-pencil-alt me-2 text-success "></i>Edit</a>
                                        </div>
                    
                                    
                                        <form class="form-inline ml-1 mt-1 "action="index.php?action=danhmuc" method="POST">
                                            <input type="hidden" name="id" value="'.htmlspecialchars($items['id']).'">
                                            <button type="submit" class="btn border-danger" name="delete-category">
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
                <div class="modal-body delete-form">Do you want to delete this category?</div>
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
                    $('.delete-form').html(
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