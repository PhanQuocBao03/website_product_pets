<footer id ="footer" >
  <ul class="footer_left">
       <h6 class="text-white">FIND A STORE</h6>
       <h6 class="text-white">BECOME A MEMBER</h6>
       <h6 class="text-white">Send Us Feedback</h6>
        
    </ul>
    <ul class="footer_left ">
       <h6 class="text-white">ABOUT NIKE</h6>
        <li class="text-secondary">News</li>
        <li class="text-secondary">Careers</li>
        <li class="text-secondary">Investors</li>
        <li class="text-secondary">Sustainability</li>
    </ul>
    <ul class="footer_left ">
        <h6 class="text-white">GET HELP</h6>
        <li  class="text-secondary">Order Status</li>
        <li  class="text-secondary">Delivery</li>
        <li  class="text-secondary">Returns</li>
        <li  class="text-secondary">Payment Options</li>
        <li  class="text-secondary"> Contact Us</li>
    </ul>
    <div class="footer_right ">
        <img src="../images/favico.png" alt="">
        <div class="icon_social" >
            <i class="fab fa-instagram" id="insta"></i>
            <i class="fab fa-facebook-square"id="facebook"></i>
            <i class="fab fa-twitter"id="twitter"></i>
            <i class="fab fa-github-square github" id="github"></i>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script>
$("#registration").validate({
    rules: {
      fullname: "required",
      
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 5
      },
      repass: {
        required: true,
        equalTo: "#validationCustom02",
        minlength: 5
      }
    },

    messages: {
      fullname: "Please enter your firstname!",
      
      password: {
        required: "Please provide a password!",
        minlength: "Your password must be at least 5 characters long!"
      },
      repass: {
        required: "Please provide a repeat password!",
        equalTo: "The two passwords must be the same!",
        minlength: "Your password must be at least 5 characters long!"
      },
      email: "Please enter a valid email address!"
    },
    // highlight: function (element) {
    //             $(element).parent().addClass('error')
    //         },
    //         unhighlight: function (element) {
    //             $(element).parent().removeClass('error')
    //         }

    submitHandler: function(form) {
      form.submit();
    }
 });
 
$("#shower").click(function() {
       $("#myDiv").toggle();
    });


 
</script>