<section class="vh-100" >
  <div class="container ">

    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-lg-12 col-xl-11">
        <div class=" text-black" >
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <div class="d-flex justify-content-center">
                  <p class="h2 mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                </div>

                <form class=" g-3 needs-validation"id="registration" novalidate action="index.php?action=dangky" method="post">
                
                    <div class="col-md-8">
                      <label for="validationCustom01" class="form-label">Your name</label>
                      <input type="text" class="form-control" name="fullname" id="validationCustom01"   required>
                      
                    </div>
                    <div class="col-md-8">
                      <label for="validationCustom05" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" id="validationCustom05"   required>
                      
                    </div>
                    <?php if(isset($err)&& ($err)!=""){
                      echo "<div class='text-danger '> ".$err."</div>";
                    }?>
                    <div class="col-md-8">
                      <label for="validationCustom03" class="form-label">Password</label>
                      <input type="password"name="password" class="form-control" id="validationCustom02"   required>
                      
                    </div>
                    <div class="col-md-8">
                      <label for="validationCustom04" class="form-label">Repeat Password</label>
                      <input type="password" name="repass" class="form-control" id="validationCustom04"   required>
                      
                    </div>
                    
                    <div class="col-12">
                      <input class="btn btn-dark mt-4" type="submit" name="submit_register" value="Register">
                    </div>
                </form>

                <p>I have an account ? <a href="index.php?action=dangnhap">Login</a></p>
                
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
    include_once __DIR__ . '/../view/footer.php';
