<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script>
$("#registration").validate({
    rules: {
      fullname: "required",
      
      email: {
        required: true,
        email: true
      },
      phone: {
        required: true,
        minlength: 10
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
      password: {
        required: "Please provide a phone!",
        minlength: "Your password must be at least 10 characters long!"
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
 
</script>