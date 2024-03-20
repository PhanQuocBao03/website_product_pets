
<section class="">
    <div class="on-navbar d-flex justify-content-between p-1 navbar navbar-expand-lg navbar-light bg-light">
        <a href="index.php" class="on-navbar left ms-5">
            <img src="../images/logo2.png" alt="logo" style="width:40px">
        </a>
        <div class="on-navbar right d-flex me-5 navbar-nav">
            <a href="index.php?action=lienhe" class="nav-link text-dark">Contact</a>
            <span class="me-2 ms-2 mt-2 text-dark">|</span>
            <a href="index.php?action=hotro" class="nav-link text-dark">Helps</a>
            <span class="me-2 ms-2 mt-2 text-dark">|</span>
            <?php
                if(isset($_SESSION['id'])&& $_SESSION['id']>0){
                    foreach ($kqOneUser as $items) {
                    echo'
                    <div class="navbar-brand d-flex me-5">
                        <div class="dropdown">
                            
                            <a  class="d-flex justify-content-center text-dark text-der text-decoration-none" id="shower">
                            
                                <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 40px;">
                                <h6 class="mt-2" style="font-size:13px">'.htmlspecialchars ($items['fullname']).'</h6>     
                            </a>
                            <div class="dropdown-content " id="myDiv" >
                                <div class="text-center ">
                                <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 70px;"><br>
                                <button type="button" class="btn " data-bs-toggle="modal" href="#exampleModalToggle" role="button">
                                    <i class="far fa-edit"></i>Edit
                                </button>
                               
                                </div>
                                <ul class="m-0">
                                    <li style="font-size:16px" class="mt-1 d-flex"><span class="h6 col-sm-3">Name:</span> <p> '.htmlspecialchars ($items['fullname']).'</p></li>
                                    <li style="font-size:16px" class="mt-1 d-flex"><span class="h6 col-sm-3">Email:</span> <p> '.htmlspecialchars ($items['email']).'</p></li>
                                    <li style="font-size:16px" class="mt-1 d-flex"><span class="h6 col-sm-3">SĐT:</span> <p> '.htmlspecialchars( $items['phone']).'</p></li>
                                    <hr width=80%>
                                    <a href="index.php?action=xemdonhang" style="font-size:16px" class="text-decoration-none text-dark">Đơn hàng</a>
                                    <hr width=80%>
                                    <li style="font-size:16px" class="mt-3"><button type="button" class="border-0 bg-0 m-0 p-0" style="background-color: #f9f9f9;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Đổi mật khẩu
                                    </button></li>
                                    <hr width=80%>

                                    

                                    <li style="font-size:16px" class="d-flex mb-3">
                                        <i class="fas fa-sign-out-alt pt-2 mt-1"></i>
                                        <a href="index.php?action=thoat" class="nav-link text-dark" >Sign out</a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>';
                    echo'
                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Chỉnh sữa thông tin cá nhân</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class=" g-3 needs-validation"id="registration" novalidate action="index.php?action=chinhsuanguoidung" method="post">
                            <div class="modal-body">
                    
                            <div class="col-md-8">
                            <label for="validationCustom01" class="form-label">Your name</label>
                            <input type="text" class="form-control" name="fullname" id="validationCustom01" value="'.htmlspecialchars($items['fullname']).'"  required>
                            
                            </div>
                            <div class="col-md-8">
                            <label for="validationCustom05" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="validationCustom05"  value="'.htmlspecialchars($items['email']).'"  >
                            
                            </div>
                            ';
                        
                            
                            echo'<div class="col-md-8">
                            <label for="validationCustom03" class="form-label">Phone</label>
                            <input type="text"name="phone" class="form-control" value="'.htmlspecialchars($items['phone']).'">
                            
                            </div>
                            <div class="col-md-8">
                            <label for="validationCustom04" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="validationCustom04" value="'.htmlspecialchars($items['address']).'">
                            
                            </div>
                            <input type="hidden" name="id" class="form-control" id="validationCustom04" value="'.htmlspecialchars($items['id']).'">


                            
                            
                        
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <input type="submit" class="btn btn-primary" value="Lưu" name="edit-user">
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                    
                   
                    ';                  
                }
                


                    
                }else echo '<a href="index.php?action=dangnhap" class="nav-link text-dark" >Sign In</a>';
            ?>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid ps-5 pe-5">
        <a href="index.php" class="navbar-nav me-auto mb-2 mb-lg-0 text-decoration-none">

            <img src="../images/logo.png" alt="" style="width:100px">
            <div class="text-center text-dark">
                <h2>PetGrove.vn</h2>
                <p class="text-secondary " style="font-size: 13px;">Trusted partner for pet life</p>
            </div>
        </a>
    
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li li class="nav-item"><a class="nav-link " href="index.php?action=tatcasanpham">ALL</a></li>
            <?php
            if(isset($list_category)){
                foreach ($list_category as $items) {
                   echo' <li class="nav-item">
                        <a class="nav-link "  href="index.php?action=product'.htmlspecialchars ($items['name_category']).'&id='.htmlspecialchars ($items['id']).'">'.htmlspecialchars ($items['name_category']).'</a>
                    </li>';
                }
            }
            if(isset($_SESSION['id'])&& $_SESSION['id']==1){

              echo'<li  class="nav-item"><a class="nav-link " href="index.php?action=admin">Admin</a></li>';
            }
            ?>

            
            <!-- <li class="nav-item">
            <a class="nav-link "  href="index.php?action=sanpham">Men</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Wonmen</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Kids</a>
            </li> -->
        </ul>
        <div class="navbar right">

            <form  class="d-flex" action="index.php?action=timkiem" method="POST">
                <input class="form-control me-2" type="text" name="keywork" placeholder="Nhập tên sản phẩm..." aria-label="Search" id="search-input">
                <input class=" btn-outline" type="submit"name="seach" value="Seach">
            </form>
            <a href="index.php?action=sanphamyeuthich" class="heart-icon navbar-icon ps-4 pe-4 text-dark"><i class="far fa-heart "> <sup class="text-danger "><?php if(isset ($kqFav)){ $number=count($kqFav); echo $number;}?></sup></i></a>
            <a href="index.php?action=giohang" class="cart-icon navbar-icon pe-3 text-dark"><i class="fas fa-shopping-bag"><sup class="text-danger ms-2 "><?php if(isset ($kqFav)){ $number=count($kqCart); echo $number;}?></sup></i></a>
        </div>
        
    </div>
    </nav>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đổi Mật Khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="index.php?action=doimatkhau" method="post" id="registration">
        <div class="modal-body">
                <?php
                    if(isset($err)&& $err!=""){
                      echo '<div style="color:red">'.$err.'</div>';
                    }
                  ?>
            <div class="form-outline d-flex mb-3">
                <label class="form-label col-sm-5 text-dark offset-md-1">Mật Khẩu Củ:</label>
                <input class="intput_login col-sm-5 offset-md-1" type="password" name="password"VALUE = ""id="validationCustom02" required><br>
            </div> 
            <div class="form-outline d-flex mb-3">
                <label class="form-label col-sm-5 text-dark offset-md-1">Mật Khẩu Mới:</label>
                <input class="intput_login col-sm-5 offset-md-1" type="password" name="newpassword"VALUE = ""id="validationCustom06" required><br>
            </div> 
            <div class="form-outline d-flex mb-3">
                <label class="form-label col-sm-5 text-dark offset-md-1">Nhập Lại Mật Khẩu Mới:</label>
                <input class="intput_login col-sm-5 offset-md-1" type="password" name="renewpassword"VALUE = "" required><br>
            </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <input type="submit" class="btn btn-primary" VALUE="Cập nhật" name="update-password">
        </div>
      </form>
    </div>
  </div>
</div>
    </div>
    
</section>
<hr>
<script>
    function submitForm() {
            document.getElementById("checkoutForm").submit();
        }
</script>