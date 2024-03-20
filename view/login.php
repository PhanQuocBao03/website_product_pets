<section class="vh-100" >
  <div class="container offset-md-3">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div >
          <div class="row g-0">
            <!-- <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://kenh14cdn.com/2019/10/10/photo-4-157070198485474729624.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div> -->
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <form action="index.php?action=dangnhap" method="post" id="registration">
                  <h2 class=" mb-2 pb-3" style="letter-spacing: 1px;">Sign into your account</h2>
                  <?php
                    if(isset($err)&& $err!=""){
                      echo '<div style="color:red">'.$err.'</div>';
                    }
                  ?>
                  

                  <div class="col-md-8 mt-2">
                      <label for="validationCustom05" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" id="validationCustom05"   required>
                      
                    </div>

                    <div class="col-md-8">
                      <label for="validationCustom03" class="form-label">Password</label>
                      <input type="password"name="password" class="form-control" id="validationCustom02"   required>
                      
                    </div>
                  <div class="pt-1 mb-4">
                    <input class="btn btn-dark btn-lg btn-block" type="submit" name="submit_signin" value="Sign in">
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="index.php?action=dangky"
                      style="color: #393f81;">Register here</a></p>
                    
    
                </form>

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
