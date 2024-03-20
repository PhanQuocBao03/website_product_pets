
  <section class="py-5">
    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div class=" rounded rounded-4 mb-3 d-flex justify-content-center">
            <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp">
              <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 rounded-lg rounded fit" src="../images/uploads/<?=$kqproduct[0]['thumbnail']?>" />
            </a>
          </div>
          <!-- <div class="d-flex justify-content-center mb-3">
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big2.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big2.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big3.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big3.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big4.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big4.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp" />
            </a>
          </div> -->
          <!-- thumbs-wrap.// -->
          <!-- gallery-wrap .end// -->
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
              <?=$kqproduct[0]['name_product']?>
            </h4>
            <h6 class="title text-dark">
              <?=$kqproduct[0]['name_category']?>'s Product
            </h6>
            <!-- <div class="d-flex flex-row my-3">
              <div class="text-warning mb-1 me-2">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <span class="ms-1">
                  4.5
                </span>
              </div>
              <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
              <span class="text-success ms-2">In stock</span>
            </div> -->
  
            <div class="mb-3">
              <?php
              $price=1;
                foreach ( $kqproduct as $items) {
                    echo'<div class="d-flex">
                    <p id="priceValue">
                        <span id="originalPrice"></span>
                        <span id="discountedPrice"></span>
                    </p>
                    <p id="discountValue" class="ms-2 h5 text-danger"> </p>
                </div>';
                break;
                  }

                
                
              ?>
              
              
              
            </div>
  
            
            <form action="index.php?action=addtocart" method="post">
            <div class="row mb-4">
              <div class="col-md-4 col-6">
                <label class="mb-2">Size</label>
                <select class="form-select border border-secondary rounded-pill " style="height: 35px;" name="size_name" id="sizeSelect">
                
                <?php
                
                  foreach ($kqproduct as $items) {
                    echo'<option  value="'.htmlspecialchars($items['size_name']).'" data-price="'.htmlspecialchars($items['price']).'"data-product-id="'.htmlspecialchars($items['id']).'" data-discount="'.htmlspecialchars($items['discount']).'">'.htmlspecialchars($items['size_name']).'</option>';
                    
                  }
                ?>
                  
                </select>
                
              </div>
            </div>
            
            <div class="cart mt-4 align-items-center"> 
                    <div class="mb-2" >
                        <label class="mb-2">Quantity</label> <br>
                        
                        <input type="number" name="quantity" VALUE="1" max="50" min="1" style="width: 10rem;height:2rem " class="rounded border-1 text-center rounded-pill">
                    </div>
                    <input type="hidden" VALUE="<?=htmlspecialchars($kqproduct[0]['id'])?>" name="id">
                    <input type="hidden" VALUE="<?=htmlspecialchars($kqproduct[0]['thumbnail'])?>" name="thumbnail">
                    <input type="hidden" VALUE="<?=htmlspecialchars($kqproduct[0]['name_product'])?>" name="name_product">
                    
                    <input class="btn border border-dark text-white mr-2 px-4 mb-3 mt-2 btn-dark w-50 rounded-pill"type="submit" name="addtocart" VALUE="Add To Bag"> <br>
                    <?php
                   
                    if(isset($kqOneFav)&& count($kqOneFav)>0){
                    foreach ($kqOneFav as $items) {
                      if($kqproduct[0]['id']==$items['id_product'] && $_SESSION['id']==$items['id_user']){
                            echo'<div class="btn  text-dark mr-2 px-4 border w-50 rounded-pill mb-4">
                            <input class="btn" type="submit" name="buynow" value="Mua Ngay">
                          </div>';
                          break;
                          
                      }else{
                        echo '<div class="btn  text-dark mr-2 px-4 border w-50 rounded-pill mb-4">
                          <input class="btn" type="submit" name="favourite" value="Favourite"><i class="far fa-heart btn"></i>
                          </div>'
                          ;
                          break;
                      }
                    }
                     
                    }else{
                      echo '<div class="btn  text-dark mr-2 px-4 border w-50 rounded-pill mb-4">
                        <input class="btn" type="submit" name="favourite" value="Favourite"><i class="far fa-heart btn"></i>
                        </div>'
                        ;}
                      ?>

                </form>
                                
            </div>
          <p>
              <?=htmlspecialchars ($kqproduct[0]['discription'])?>
            </p>
  
            
  
        </main>
      </div>
    </div>
  </section>
  <script>
   var sizeSelect = document.getElementById('sizeSelect');
  var originalPrice = document.getElementById('originalPrice');
  var discountedPrice = document.getElementById('discountedPrice');
  var discountValue = document.getElementById('discountValue');

// Hàm xử lý sự kiện thay đổi kích thước
function updatePrices() {
    // Lấy giá từ thuộc tính data-price của tùy chọn được chọn
    var selectedOption = sizeSelect.options[sizeSelect.selectedIndex];

    if (selectedOption) {
        var selectedPrice = parseFloat(selectedOption.getAttribute('data-price')) || 0;

        // Gọi hàm PHP để lấy phần trăm giảm từ CSDL
        var discountPercent = <?=$kqproduct[0]['discount']?>;
        var discountedPriceValue = selectedPrice - (selectedPrice * (discountPercent / 100));

        var formattedOriginalPrice = selectedPrice.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });

        var formattedDiscountedPrice = discountedPriceValue.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });
        if (discountPercent > 0) {
            discountValue.innerHTML = formattedDiscountedPrice;
             originalPrice.innerHTML = 'Giá: <del>' + formattedOriginalPrice + '</del>';

        } else {
        originalPrice.innerHTML = 'Giá: ' + formattedOriginalPrice ;

            discountValue.innerHTML = ''; 
        }
    }
}


sizeSelect.addEventListener('change', updatePrices);
document.addEventListener('DOMContentLoaded', function() {
    updatePrices();
});
</script>
  
  
  
  