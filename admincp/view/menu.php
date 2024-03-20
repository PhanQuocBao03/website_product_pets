<section class="col-sm-2 bg-dark" id="menu-admin">
    <div class="d-flex justify-content-center  pt-3 text-white">
        <img src="../images/logo2.png" class="mt-2" alt="logo" width="30px" >
        <h4>PetGrove.vn</h4>
    </div>
    <hr class="text-white">
    <a href="index.php?action=trangchu" class="text-decoration-none text-white d-flex ms-2">
        <i class="fas fa-home text-white me-3 mt-2"></i>
        <h4 >Trang chủ</h4>
    </a>
    <hr class="text-white">
    <div class="mb-3">
        <a href="index.php?action=danhmuc" class="text-decoration-none text-white d-flex ms-5 mb-3">
            <i class="far fa-folder-open me-3 "></i>
            <h6>Danh Mục</h6>
        </a>
        
       
        <div class="d-flex mb-3">

            <a href="index.php?action=sanpham" class="text-decoration-none text-white d-flex  ms-5 ">
                <i class="fas fa-paw me-3 "></i>
                <h6 >Sản Phẩm</h6>
            </a>
            
        </div>
        <div class="ms-5 ps-5">
        <?php
                        if(isset($list_category)){
                            foreach ($list_category as $items) {
                                echo '
                                <div class="d-flex mb-2">
                                <a href="index.php?action=product'.htmlspecialchars ($items['name_category']).'&id='.htmlspecialchars( $items['id']).'" class=" text-decoration-none text-white d-flex ps-3">'.htmlspecialchars ($items['name_category']).'</a><i class="fas fa-chevron-right text-white ms-3 pt-2"></i><br>
                                </div>';
                            }
                        }
                    ?>
        </div>
        <a href="index.php?action=nguoidung" class="text-decoration-none text-white d-flex ms-5 mb-3">
            <i class="fas fa-user-cog me-3 "></i>
            <h6 >Khách Hàng</h6>
        </a>
        <a href="index.php?action=donhang" class="text-decoration-none text-white d-flex ms-5 mb-3">
            <i class="fas fa-clipboard me-3 "></i>
            <h6 >Đơn Hàng</h6>
        </a>
        <a href="index.php?action=lienhe" class="text-decoration-none text-white d-flex ms-5 mb-3">
            <i class="fas fa-envelope me-3"></i>
            <h6 >Liên hệ</h6>
        </a>
        <!-- <a href="index.php?action=nguoidung" class="text-decoration-none text-white d-flex  ms-5 mb-3">
                <i class="fas fa-comments me-3 "></i>
                <h6 >Feedback</h6>
            </a> -->
</div>
    <hr class="text-white">
    <a href="index.php?action=thoat"class="text-decoration-none text-white d-flex ms-2">
        <i class="fas fa-sign-out-alt me-3 mt-1"></i>
        <h5>Đăng xuất</h5>
    </a>
</section>
