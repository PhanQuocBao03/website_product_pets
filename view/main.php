<section>
    <div class="title text-center mt-3">
        <h1 class="fw-bold">GIFTS THAT MOVE YOU</h1>
        <p>This year's gift. Net year's greatness.</p>
        <a class="btn border rounded-pill btn-fav" href="index.php?action=tatcasanpham">Shop</a>

    </div>
    <div class="container">
        <h5 class="mb-4 mt-3">Sản phẩm được nhiều yêu thích</h5>
        <div class="row   d-flex ">

            <?php
       
       if(isset($kqfavorite)&&count($kqfavorite)>0){
           foreach ($kqfavorite as $items) {
               
               echo '
               <div class="product-favorite position-relative col-sm-6  " >
                            <img src="../images/uploads/'.$items['thumbnail'].'" alt=""width=100%>
                            <div class="position-absolute "  style="font-size:20px;bottom:1rem; left: 6rem;">
                            <div class="text-muted" >'.$items['name_category'].'</div>
                            <div class="h5">'.$items['name_product'].'</div>
                            <a class="btn border rounded-pill btn-fav" href="index.php?action=product'.$items['name_category'].'&id='.$items['id'].'">Shop</a>
                        
                            </div>
                        </div>

                        ';
                        
                        
                    }
                }
                ?>
                </div>
        <div>
            <h5 class="mt-3 mb-3">Product</h5>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <div class="card-wrapper d-flex">
                    <?php
                        $name="Small Pets";
                        $i=0;
                        foreach ($list_product as $items) {
                            if($items['name_category']==$name){
                                echo'
                                <div class="d-none">'.$i.'</div>
                                <div class="card col-sm-3 ms-2" style="width: 18rem;height:18rem;">
                                    <img src="../images/uploads/'.$items['thumbnail'].'" class="card-img-top" alt="..." height=100%>
                                    
                                </div>
                                
                                ';
                                if($i == 4) break;
                            }
                            $i++;
                           
                        }
                    ?>
                </div>
                </div>
                <div class="carousel-item">
                <div class="card-wrapper d-flex">
                    <?php
                        $name="Dogs";
                        $i=0;
                        foreach ($list_product as $items) {
                            if($items['name_category']==$name){
                                echo'
                                <div class="d-none">'.$i.'</div>
                                <div class="card col-sm-3 ms-2" style="width: 18rem;height:18rem;">
                                    <img src="../images/uploads/'.$items['thumbnail'].'" class="card-img-top" alt="..."height=100%>
                                    
                                </div>
                                
                                ';
                                if($i == 4) break;
                            }
                            $i++;
                        }
                    ?>
                </div>
                </div>
                <div class="carousel-item">
                <div class="card-wrapper d-flex">
                    <?php
                            $name="Cats";
                            $i=0;
                        foreach ($list_product as $items) {
                            if($items['name_category']==$name){
                                echo'
                                <div class="d-none">'.$i.'</div>
                                <div class="card col-sm-3  ms-2" style="width: 18rem;height:18rem;">
                                    <img src="../images/uploads/'.$items['thumbnail'].'" class="card-img-top" alt="..." height=100%;>
                                    
                                    
                                </div>
                                
                                ';
                                if($i == 3) break;
                            }
                            $i++;
                            
                        }
                    ?>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>
        <h5 class="mt-3 mb-3">The Essentials</h5>
        <div class="list-category row mb-5">
            <div class="col-sm-4 position-relative">
                <img src="https://images.pexels.com/photos/1805164/pexels-photo-1805164.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" width=100%>
                <div class="position-absolute"style="font-size:20px;bottom:1rem; left: 3rem;">
                    <a href="index.php?action=productDogs&id=1" class="btn bg-light rounded-pill border border-dark btn-fav">Dog's</a>
                </div>
            </div>
            <div class="col-sm-4 position-relative">
                <img src="https://images.pexels.com/photos/1741205/pexels-photo-1741205.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" width=100%>
                <div class="position-absolute"style="font-size:20px;bottom:1rem; left: 6rem;">
                    <a href="index.php?action=productCats&id=2" class="btn bg-light rounded-pill border border-dark btn-fav">Cat's</a>
                </div>
            </div>
            <div class="col-sm-4 position-relative">
                <img src="https://images.pexels.com/photos/4383761/pexels-photo-4383761.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" width=100%>
                <div class="position-absolute"style="font-size:20px;bottom:1rem; left: 4rem;">
                    <a href="index.php?action=productSmall Pets&id=3" class="btn bg-light rounded-pill border border-dark btn-fav">Small Pet's</a>
                </div>
            </div>
        </div>
        
    </div>
</section>
     
