<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Sign Up Form by Colorlib</title>

   <!-- Font Icon -->
   <link rel="stylesheet" href="../../public/login_register/fonts/material-icon/css/material-design-iconic-font.min.css">

   <!-- Main css -->
   <link rel="stylesheet" href="../../public/login_register/css/style.css">
</head>

<body>

   <div class="main">

      <!-- Sign up form -->
      <section class="signup">
         <div class="container">
            <div class="signup-content">
               <div class="signup-form">
                  <h2 class="form-title">Sign up</h2>
                  <form action="/xl_register" method="POST" class="register-form" id="register-form">

                     <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input name="username" type="text" id="name" placeholder="Your Name" />
                     </div>
                     <div class="form-group">
                        <label for="fullname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input name="fullname" type="text" id="fullname" placeholder="Your fullname" />
                     </div>
                     <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input name="email" type="email" id="email" placeholder="Your Email" />
                     </div>
                     <div class="form-group">
                        <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                        <input name="phone" type="number" id="phone" placeholder="Phone" />
                     </div>
                     <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input name="password" type="password" id="pass" placeholder="Password" />
                     </div>
                     <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input name="confirm_password" type="password" id="re_pass" placeholder="Repeat your password" />
                     </div>
                     <!-- Avata -->
                     <!-- <div class="form-group">
                        <label for="avata"><i class="zmdi zmdi-collection-image-o"></i></label>
                        <input name="avata" type="file" id="avata" />
                     </div> -->

                     <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                     </div>
                     <div class="form-group form-button">
                        <input name="button_register" type="submit" id="signup" class="form-submit" value="Register" />

                     </div>
                  </form>
               </div>
               <div class="signup-image">
                  <figure><img src="../../public/image/banner/abt.jpg" alt="sing up image"></figure>
                  <a href="/login" class="signup-image-link">I am already member</a>
               </div>
            </div>
         </div>
      </section>

   </div>

   <!-- JS -->
   <script src="../../publics/login_register/vendor/jquery/jquery.min.js"></script>
   <script src="../../publics/login_register/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>