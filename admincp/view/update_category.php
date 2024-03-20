
<section>
    <h1>Danh mục</h1>
    <form action="index.php?action=chinhsuadanhmuc" method="post">
        <label for="nameCatrgory">Tên danh mục :</label>
        <input type="text"  name ="name_category" VALUE="<?= $kqone[0]['name_category']?>">
        <input type="hidden" name="id" value="<?= $kqone[0]['id'] ?>">
        <input type="submit" value="Cập nhật" class="btn bg-success ms-2 text-white" name="submit-add">
    </form>
    <?php?>
    <hr>
    <div class="container">
        <table class="mt-4 fa_table col-sm-5 bg-white shadow">
            <thead class="bg-info">
                <tr>
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
                                    <td>'.htmlspecialchars($items['name_category']).'</td>
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
    
    <!-- ------------------------------------------------------------------------------------------------ -->
   
</section>