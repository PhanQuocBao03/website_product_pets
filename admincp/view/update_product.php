
<?php

        $conn=connectdb();
    
    if(isset($_GET['id']) ){
                $sql = 'SELECT product.*,size_name,quanlity,price FROM product join size on product.id=size.id WHERE product.id=?';

            try{
                $statement = $conn->prepare( $sql);
                $statement->execute([$_GET['id']]);
                $row = $statement->fetch();
                // header('location:../index.php?action=quanlydanhmucsanpham');

            }catch(PDOException $e){
                $pdo_error = $e->getMessage();
            }
            if(!empty($row)){
                echo '
                <h2 class="mt-5 text-center mb-5">Chỉnh sửa sản phẩm</h2>
                <form action="index.php?action=chinhsuasanpham" method="post" enctype="multipart/form-data" >
                    <div class="d-flex justify-content-center">
                        <label  class="col-sm-2 mt-2">Hình ảnh:</label>
                        <input class="mb-2 col-sm-3" type="file" name="thumbnail" VALUE = "' .htmlspecialchars ($row['thumbnail']).'"><br>
                      
                    </div>
                    <div class="d-flex justify-content-center">
                        <label  class="col-sm-2" >Tên sản phẩm:</label>
                        <input class="mb-2 col-sm-3" type="text" name="name_product" VALUE = "' .htmlspecialchars ($row['name_product']).'"><br>
                    </div>
                    <div class="d-flex justify-content-center">
                        <label  class="col-sm-2" >Giá:</label>
                        <input class="mb-2 col-sm-3" type="text" name="price" VALUE = "' .htmlspecialchars ($row['price']).'"><br>
                    </div>
                    <div class="d-flex justify-content-center">
                        <label  class="col-sm-2" >Giá giảm:</label>
                        <input class="mb-2 col-sm-3" type="text" name="discount" VALUE = "' .htmlspecialchars ($row['discount']).'"><br>
                    </div>
                    <div class="d-flex justify-content-center">
                        <label  class="col-sm-2" >Kích Thước:</label>
                        <select name="size" id="size" class="mb-2 col-sm-3">
                            <option value="'.htmlspecialchars ($row['size_name']).'">' .htmlspecialchars ($row['size_name']).'</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                           
                        </select><br>
                    </div>
                    <div class=" d-flex justify-content-center">
                        <label  class="col-sm-2" >Mô tả:</label>
                        <textarea class="mb-2 col-sm-3"  name="discription"">' .htmlspecialchars ($row['discription']).'</textarea><br>
                    </div>
                    <div class="d-flex justify-content-center">
                        <label  class="col-sm-2" >Danh mục:</label>
                        <select name="id_category" id="" class="mb-2 col-sm-3">
                            <option value="0">Chọn danh mục</option>
                            $list_category=getCategory()';
                                
                                if (isset($list_category)) {
                                    foreach($list_category as $category){
                                        if($category['id']==$row['id_category'])
                                                echo'<option value="'.htmlspecialchars($category['id']).'" selected>'.htmlspecialchars ($category['name_category']).'</option>';
                                            else
                                                echo'<option value="'.htmlspecialchars ($category['id']).'">'.htmlspecialchars ($category['name_category']).'</option>';

                                    }

                                    # code...
                                }
                        echo'</select><br>
                    </div>
                    <input type="hidden" name ="id" VALUE="' . $_GET['id'] .'">
                    <div class="d-flex justify-content-center mt-3">
                        <input type="submit" name="submit_product" value="Cập nhật " class=" btn bg-success text-white">
                    </div>
                </form>';
                
            }else{
                $error_message = 'Không thể lấy danh mục này';
                $reason = $pdo_error ?? 'Không rõ nguyên nhân';
                include __DIR__ . '/../../db/show_error.php';
            }
        }elseif(isset($_POST['id']) ){
            $target_dir = "../images/uploads/";            
            $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
            $thumbnail=$_FILES["thumbnail"]["name"];
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $uploadOk = 0;
            }
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
            if(!empty($_POST['name_product'])){
                if(isset($thumbnail)){
                    if($thumbnail==""){
                    $sql = "UPDATE product SET name_product=?,discount=?,discription=?,id_category=? WHERE id=?";
                }
                    else{
                        $sql = "UPDATE product SET thumbnail='".$thumbnail."',name_product=?,discount=?,discription=?,id_category=? WHERE id=?";
                }
                }

                try{
                    $statement = $conn->prepare($sql);
                    $statement->execute([
                        $_POST['name_product'],
                       
                        $_POST['discount'],
                       
                        $_POST['discription'],
                        $_POST['id_category'],
                        $_POST['id']
                        ]);
                    header('location:index.php?action=sanpham');
                }catch(PDOException $e){
                    $error_message = 'Không thể câp nhật sản phẩm này này';
                    $reason=$e->getMessage();
                    include __DIR__ . '/../../db/show_error.php';
        
                }
            }else{
                $error_message = 'Nhập tên sản phẩm';
                include __DIR__ . '/../../db/show_error.php';
            }
        }else{
            include __DIR__ . '/../../db/show_error.php';
        }

    ?>