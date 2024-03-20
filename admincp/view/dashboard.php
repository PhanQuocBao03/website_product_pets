<section >
    <h1 class="text-center border bg-white  border-warning p-4 mt-3 rounded shadow">Thống kê</h1>
    <hr>
    
    <div class="d-flex justify-content-center  mt-5">

        <div class="border border-primary shadow-sm p-3 bg-white  col-sm-2 me-2    rounded" style="height:120px" >
            <p >Số Lượng Tài Khoản</p>
            <div class="d-flex justify-content-center">
                <i class="fas fa-users me-3 mt-2" style="font-size:30px"></i>
                <div style="font-size:30px">
                    <?php foreach ($kq as $kq) {

                        echo $kq['numberUser'];
                    }
                    ?>
                </div>
            </div>
        
        </div>
    
        <div class="border border-primary shadow-sm p-3   bg-white  col-sm-2 ms-2   rounded" style="height:120px" >
            <p >Số Lượng Sản Phẩm</p>
            <div class="d-flex justify-content-center">
            <i class="fas fa-paw me-3 mt-2" style="font-size:30px"></i>

                <div style="font-size:30px">
                <?php foreach ($kqCT as $kq) {
                
                echo $kq['NumberProduct'];
            }
            ?>
                </div>
            </div>
        
        </div>
        
    
        <div class="border border-primary shadow-sm p-3   bg-white  col-sm-2 ms-2   rounded" style="height:120px" >
            <p >Số Lượng Đơn Hàng</p>
            <div class="d-flex justify-content-center">
                
            <img src="https://static.thenounproject.com/png/101952-200.png" alt="" width=40px>

                <div style="font-size:30px">
                <?php foreach ($kqOd as $kq) {
                
                echo $kq['NumberOrder'];
            }
            ?>
                </div>
            </div>
        
        </div>
        
    </div>
    <div class="border border-danger  ms-5 rounded mt-3 me-5  offsset-md-2 p-5 shadow bg-white    " >
        <p class="h4 ms-5">Tổng Danh Số</p>
        <div class="d-flex justify-content-center mt-5">
        
        <i class="fas fa-coins me-3 mt-2" style="font-size:30px"></i>

            <div class="h1">
            <?php 
            $total=0;
            foreach ($kqSum as $kq) {
                $total+=$kq['tong'];
            }
        echo $format_number_1 = number_format($total) ;echo'<sup>VND</sup>';
        ?>
            </div>
        </div>
    
    </div>

    
</section>
