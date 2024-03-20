
<?php
            // include_once __DIR__ . '/../modual/head.php';

            // require_once __DIR__ . '/../../db/config.php';
            $pdo=connectdb();
        if(isset($_GET['id']) && is_numeric($_GET['id'])&&($_GET['id']>0)){
            $sql = 'SELECT * FROM users WHERE id=?';
            try{
                $statement = $pdo->prepare( $sql);
                $statement->execute([$_GET['id']]);
                $row = $statement->fetch();
                // header('location:../index.php?action=quanlydanhmucsanpham');

            }catch(PDOException $e){
                $pdo_error = $e->getMessage();
            }
            if(!empty($row)){
                echo '
                <div class="container">
                    <h1 style="padding: 50px;" class="text-uppercase text-center mb-5 text-dark">Sửa Thông Tin</h1>    
                    <form action="index.php?action=chinhsuanguoidung" method ="post" class="col-sm-6 offset-md-3">
                    <div class="form-outline d-flex mb-3">
                        <label class="form-label col-sm-2 text-dark offset-md-1">Họ và tên:</label>
                        <input class="intput_login col-sm-7 offset-md-1" type="text" name="fullname"VALUE = "' .htmlspecialchars ($row['fullname']).'"><br>
                    </div>
                    <div class="form-outline d-flex mb-3">
                        <label class="form-label col-sm-2 text-dark offset-md-1">SĐT:</label>
                        <input class="intput_login col-sm-7 offset-md-1" type="text" name="phone"VALUE = "' .htmlspecialchars ($row['phone']).'"><br>
                    </div>
                    <div class="form-outline d-flex mb-3">
                        <label class="form-label col-sm-2 text-dark offset-md-1">Email:</label>
                        <input class="intput_login col-sm-7 offset-md-1" type="email" name="email"VALUE = "' .htmlspecialchars ($row['email']).'"><br>
                    </div>
                    <div class="form-outline d-flex mb-3">    
                        <label class="form-label col-sm-2 text-dark offset-md-1">Địa Chỉ:</label>
                        <input class="intput_login col-sm-7 offset-md-1" type="text" name="address"VALUE = "' .htmlspecialchars ($row['address']).'"><br>
                    </div>
                    
                    <div class="form-outline d-flex mb-3">
                        <label class="form-label col-sm-2 text-dark offset-md-1">Mật Khẩu:</label>
                        <input class="intput_login col-sm-7 offset-md-1" type="password" name="password"VALUE = "' .htmlspecialchars ($row['password']).'"><br>
                    </div>
                        <input class="intput_login col-sm-7 offset-md-1" type="hidden" name ="id" VALUE="' . $_GET['id'] .'">
                    <div class="d-flex justify-content-center">
                        <input type="submit" value="Cập nhật!" class="btn btn-signup btn-block btn-lg gradient-custom-4 text-white bg-success">
                    </div>
                    </form>
                </div>';
                
            }else{
                $error_message = 'Không thể lấy danh mục này';
                $reason = $pdo_error ?? 'Không rõ nguyên nhân';
                include __DIR__ . '/../../db/show_error.php';
            }
        }elseif(isset($_POST['id']) && is_numeric($_POST['id'])&& ($_POST['id']>0)){
            if(!empty($_POST['fullname'])&&!empty($_POST['phone'])&&!empty($_POST['email'])&&!empty($_POST['address'])
                &&!empty($_POST['password'])){
                $sql = 'UPDATE users SET fullname=?,phone=?,email=?,address=?,password=? WHERE id=?';
        
                try{
                    $statement = $pdo->prepare($sql);
                    $statement->execute([
                        $_POST['fullname'],
                        $_POST['phone'],
                        $_POST['email'],
                        $_POST['address'],
                        $_POST['password'],
                        $_POST['id']
                        
                    ]);
                    header('location:index.php?action=nguoidung');
                }catch(PDOException $e){
                    $error_message = 'Không thể câp nhật danh mục này';
                    $reason=$e->getMessage();
                    include __DIR__ . '/../../db/show_error.php';
        
                }
            }else{
                $error_message = 'Hãy nhập tên danh mục';
                include __DIR__ . '/../../db/show_error.php';
            }
        }else{
            include __DIR__ . '/../../db/show_error.php';
        }

    ?>