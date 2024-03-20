 <?php
     if(isset($kqproduct)){
        foreach ($kqproduct as $kq) {
            # code...
        echo'
        <h3 class="ms-5 mb-4">'.$kq['name_category'].'\'s Product</h3>';
        break;
    }
}else {echo'<h3 class="ms-5 mb-4">ALL Product</h3>';}?> 
<section class=" d-flex">
    <div class="filter col-sm-2 container">
        <div class="filter-content">
            
            <div class="filter-body">
                
                <div class="fillter-header">
                <h6>Grender</h6>
                    <!-- <label class="container">
                    <input class="h6" type="checkbox" checked="checked">
                    <a href="index.php?action">Men</a>
                    <span class="checkmark "></span>
                    </label> -->
                    <?php
                    foreach ($list_category as $items) {
                       
                        if(isset($_GET['id'])){
                            $id=(int)$_GET['id'];
                    
                       
                        
     
                    echo'
                    <label class="container">';
                    if($items['id']==$id){

                        echo' 
                            <input class="h6" type="checkbox" checked="checked">';
                    }else{


                       echo '<input class="h6" type="checkbox" >';
                    }

                   echo' <a href="index.php?action=product'.htmlspecialchars ($items['name_category']).'&id='.htmlspecialchars ($items['id']).'" class="text-decoration-none text-dark">'.htmlspecialchars ($items['name_category']).'</a>
                    <span class="checkmark "></span>
                    </label>';
                    
                } else{
                    echo '<input class="h6" type="checkbox" ><a href="index.php?action=product'.htmlspecialchars ($items['name_category']).'&id='.htmlspecialchars ($items['id']).'" class="text-decoration-none text-dark">'.htmlspecialchars ($items['name_category']).'</a>
                    <span class="checkmark "></span>
                    </label><br>';
                }}?>
                  
                    
                </div>
                <hr>
                <div class="fillter-header">
                <h6>Shop By Price</h6>
                    <label class="container">
                    <input class="h6" type="checkbox" >
                    <a class="text-decoration-none text-dark"  href="index.php?action=sanphamcogiaduoi100000">Dưới 100,000 <sup>đ</sup></a>
                    <span class="checkmark"></span>
                    </label>
                    <label class="container">
                    <input class="h6" type="checkbox">
                    <a class="text-decoration-none text-dark" href="index.php?action=sanphamcogiatu100000den1000000"> 100,000 <sup>đ</sup> - 1,000,000 <sup>đ</sup></a>
                    <span class="checkmark"></span>
                    </label>
                    <label class="container">
                    <input class="h6" type="checkbox"><a class="text-decoration-none text-dark" href="index.php?action=sanphamcogiatu1000000den2000000"> 1,000,000 <sup>đ</sup> - 2,000,000 <sup>đ</sup></a>
                    <span class="checkmark"></span>
                    </label>
                    <label class="container">
                    <input class="h6" type="checkbox"><a class="text-decoration-none text-dark" href="index.php?action=sanphamcogiatren2000000"> Over 2,000,000 <sup>đ</sup></a>
                    <span class="checkmark"></span>
                    </label>
                    
                </div>
                <hr>
                <h6>Size</h6>
                <div class="size">

                    
                    <form action="index.php?action=timkiem" method="post">
                        <input class="btn border border-dark rounded  col-sm-3" type="submit" value="M" name="M">
                        <input class="btn border border-dark rounded  col-sm-3" type="submit" value="L" name="L">
                        <input class="btn border border-dark rounded  col-sm-3" type="submit" value="XL" name="XL">
                    </form>
                    
                </div>
                <hr>
                <div class="color row">
                    <h6>Color</h6>
                    <div class="col-sm-3">
                        <div style="border-radius:50px;width:35px;height:35px;background-color:black"></div> <span>Black</span>
                    </div>
                    <div class="col-sm-3">
                        <div style="border-radius:50px;width:35px;height:35px;background-color:blue"></div> <span>blue</span>
                    </div>
                    <div class="col-sm-3">
                        <div style="border-radius:50px;width:35px;height:35px;background-color:Brown"></div> <span>Brown</span>
                    </div>
                    <div class="col-sm-3">
                        <div style="border-radius:50px;width:35px;height:35px;background-color:Green"></div> <span>Green</span>
                    </div>
                    <div class="col-sm-3">
                        <div style="border-radius:50px;width:35px;height:35px;background-color:Orange"></div> <span>Orange</span>
                    </div>
                    <div class="col-sm-3">
                        <div style="border-radius:50px;width:35px;height:35px;background-color:Pink"></div> <span>Pink</span>
                    </div>
                    <div class="col-sm-3">
                        <div style="border-radius:50px;width:35px;height:35px;background-color:Purple"></div> <span>Purple</span>
                    </div>
                    <div class="col-sm-3">
                        <div style="border-radius:50px;width:35px;height:35px;background-color:red"></div> <span>Red</span>
                    </div>
                    <div class="col-sm-3">
                        <div style="border-radius:50px;width:35px;height:35px;background-color:White"></div> <span>White</span>
                    </div>
                    <div class="col-sm-3">
                        <div style="border-radius:50px;width:35px;height:35px;background-color:Yellow"></div> <span>Yellow</span>
                    </div>

                </div>

            </div>


        </div>
    </div>
    
<div class="row container">
    <?php
    
    if (isset($kqproduct)) {
        foreach ($kqproduct as $product) {
            $price=$product['price']-$product['price']*$product['discount']/100;

            echo'
    
            <ul class="box_product col-md-3 col-sm-6 col-12">
            <form action="index.php?action=addtocart" method="post" class="p-0 ">
                <li class=" ">
                    <a href="index.php?action=sanphamchitiet&id='.htmlspecialchars($product['id']).'"><img src="../images/uploads/'.htmlspecialchars($product['thumbnail']).'" alt="" width="100%"class ="img-fluid"></a>
                    <p class="name_product h6">'.htmlspecialchars($product['name_product']).'</p>
                    <p class="name_product text-black-50">'.htmlspecialchars ($product['name_category']).'</p>';
                    if($product['discount']>0){
                        echo'<div class="d-flex">
                            <del><p class="price">'.$format_number_1 = number_format($product['price']).'<sup class="text-decoration-underline">đ</sup></p></del>
                            <p class="price h5 text-danger ms-1">'.$format_number_1 = number_format($price).'<sup class="text-decoration-underline">đ</sup></p>
                        </div>';
                    }else{
                         echo' <p class="price">'.$format_number_1 = number_format($product['price']).'<sup class="text-decoration-underline">đ</sup></p>';
                        
                    }
                    
                    echo'<input type="hidden" value="'.htmlspecialchars ($product['id']).'" name="id">
                    <input type="hidden" value="'.htmlspecialchars ($product['thumbnail']).'" name="thumbnail" width="100%">
                    <input type="hidden" value="'.htmlspecialchars ($product['name_product']).'" name="name_product">
                    <input type="hidden" value="'.htmlspecialchars ($product['price']).'" name="price">
                    <input type="hidden" value="M" name="size_name">
                    <input type="submit" value="+" name="addtocart" class="offset-md-3  border btn shadow " >
                    
                </li>
            </form>
            </ul>
            ';
            # code...
        }
    }else{

        foreach ($list_product as $product) {
            $price=$product['price']-$product['price']*$product['discount']/100;
                echo'
        
                <ul class="box_product col-md-3 col-sm-6 col-12">
                <form action="index.php?action=addtocart" method="post" class="p-0 ">
                    <li class=" ">
                        <a href="index.php?action=sanphamchitiet&id='.htmlspecialchars($product['id']).'"><img src="../images/uploads/'.$product['thumbnail'].'" alt="" width="100%"class ="img-fluid"></a>
                        <p class="name_product h6">'.htmlspecialchars ($product['name_product']).'</p>
                        <p class="name_product text-black-50">'.htmlspecialchars ($product['name_category']).'</p>';
                        if($product['discount']>0){
                            echo'<div class="d-flex">
                                <del><p class="price">'.$format_number_1 = number_format($product['price']).'<sup class="text-decoration-underline">đ</sup></p></del>
                                <p class="price h5 text-danger ms-1">'.$format_number_1 = number_format($price).'<sup class="text-decoration-underline">đ</sup></p>
                            </div>';
                        }else{
                             echo' <p class="price">'.$format_number_1 = number_format($product['price']).'<sup class="text-decoration-underline">đ</sup></p>';
                            
                        }
                       echo' <input type="submit" value="+" name="addtocart" class="offset-md-3  border btn shadow " >
                        <input type="hidden" value="M" name="size_name">
                        
                        <input type="hidden" value="'.htmlspecialchars ($product['id']).'" name="id">
                        <input type="hidden" value="'.htmlspecialchars( $product['thumbnail']).'" name="thumbnail" width="100%">
                        <input type="hidden" value="'.htmlspecialchars ($product['name_product']).'" name="name_product">
                        <input type="hidden" value="'.htmlspecialchars ($product['price']).'" name="price">
                        
                    </li>
                </form>
                </ul>
                ';
                # code...
            }}
        ?>
        </div>
        
          
</section>