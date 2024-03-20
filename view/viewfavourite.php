<?php 
if(isset($_SESSION['id'])){?>

<section class="container">
    <h3 >My Favourite</h3 >
    <hr>
<div class="row">
    <?php
            foreach ($kqFav as $product) {
                echo'
        
                <ul class="box_product col-md-3 col-sm-6 col-12">
                <form action="index.php?action=sanphamyeuthich" method="post" class="p-0 ">
                    <li class=" ">
                        <a href="index.php?action=sanphamchitiet&id='.htmlspecialchars($product['id_product']).'"><img src="../images/uploads/'.htmlspecialchars($product['thumbnail']).'" alt="" width="100%"class ="img-fluid"></a>
                        <p class="name_product h6">'.htmlspecialchars ($product['name_product']).'</p>
                        <p class="name_product text-black-50">'.htmlspecialchars ($product['name_category']).'</p>
                        <p class="price">'.$format_number_1 = number_format($product['price']).'<sup class="text-decoration-underline">đ</sup></p>
                        <input type="submit" value="Mua Ngay" name="addtocart" class="offset-md-3 text-white border-0" >
                        <input type="submit" class="btn   mt-1 " name="delete-product" value="Delete">
                        <i alt="Delete" class="fa fa-trash"></i>
                        
                        
                        <input type="hidden" value="'.htmlspecialchars($product['id_product']).'" name="id">
                        <input type="hidden" value="'.htmlspecialchars ($product['thumbnail']).'" name="thumbnail" width="100%">
                        <input type="hidden" value="'.htmlspecialchars ($product['name_product']).'" name="name_product">
                        <input type="hidden" value="'.htmlspecialchars ($product['price']).'" name="price">
                        
                    </li>
                </form>
                </ul>
                ';
                # code...
            }
        ?>
        </div>
        
          
</section>

<?php }else header('location:index.php?action=dangnhap')?>
