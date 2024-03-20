<?php if(isset($_SESSION['id'])){?>

<section class="container mb-5">
    <h2>Contact</h2>
    <hr>
    <div class="row container">
    <div class="col-sm-5">
    <form action="index.php?action=lienhe" method="post">
        
        <div class="mb-3 mt-3">
            <label for="fullname" class="form-label">Họ và Tên:</label>
            <input type="text" class="form-control" placeholder="Nhập họ tên.." value="<?=htmlspecialchars($kqOneUser[0]['fullname'])?>" name="fullname">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" placeholder="Nhập email.." name="email" value="<?=htmlspecialchars($kqOneUser[0]['email'])?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="phone" class="form-label">Số Điện Thoại:</label>
            <input type="text" class="form-control" placeholder="Nhập SĐT.." name="phone" value="<?=htmlspecialchars($kqOneUser[0]['phone'])?>">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Nhập địa chỉ..." name="address" value="<?=htmlspecialchars($kqOneUser[0]['address'])?>">
        </div>
        <div class="mb-3">
            <label for="comment">Nội Dung:</label>
            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
        </div>
        <input type="hidden" name="id" value="<?=htmlspecialchars($kqOneUser[0]['id'])?>">
        <input type="submit" class="btn btn-primary" value="Gửi" name="conntact">
    </form>
    </div>
    <div class="col-sm-7">
        <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.841454377122!2d105.76804037486137!3d10.029938972519219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBD4bqnbiBUaMah!5e0!3m2!1svi!2s!4v1701872169452!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0"
            style="border:0" allowfullscreen></iframe>
        </div>
        <div class="contact-items row d-flex ">
            <div class="col-sm-3">
                <img class="col-sm-3 offset-md-5" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Smartphone_icon_-_Noun_Project_283536.svg/2048px-Smartphone_icon_-_Noun_Project_283536.svg.png" alt="" width=100%>
                <ul class="text-center mt-4 ">
                    <li class="h5">PRODUCT AND ORDERS</li>
                    <li class="h6">12346789 (Viettel)</li>
                    <li class="h6">12349873 (VTI)</li>
                    <li>5:00 - 23:00 (VTI)</li>
                    <li>7 day a weeks(VTI)</li>
                </ul>
            </div>
            <div class="col-sm-3">
                <img class="col-sm-3 offset-md-5" src="https://static-00.iconduck.com/assets.00/message-icon-512x463-tqzmxrt7.png" alt="" width=100%>
                <ul class="text-center mt-4 pt-2 ">
                    <li class="h5">PRODUCT AND ORDERS</li>
                    <li >Chat with US</li>
                    <li >24 hours</li>
                    
                    <li>7 day a weeks(VTI)</li>
                </ul>
            </div>
            <div class="col-sm-3">
                <img class="col-sm-3 offset-md-5" src="https://cdn-icons-png.flaticon.com/512/3082/3082383.png" alt="" width=100%>
                <ul class="text-center mt-4 ">
                    <li >Find Nike retail stores near you</li>
                    
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>
<?php }else header('location:index.php?action=dangnhap')?>
