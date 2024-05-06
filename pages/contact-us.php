
<?php include_once"../config.php"; ?>

<?php include_once"../partials/header.php"; ?>
  <body>
    <div class="login contact_us">
    <div class="login_title">
   <h4> Fill Out This Form :</h4>
  </div>
        <form method="post" action="" name="frmLogin" id="frmLogin">
            <div class="loginbox">
            <div class="login-col1">
            <p>Full Name*</p>
            <input type="text" name="full_name" placeholder="First Last" required=""/>
            <p>Email Address*</p>
            <input type="email" placeholder="Please enter your email" name="email" required=""/>
            <P>Phone Number*</P>
            <input type="text" name="phone" placeholder="Please enter your phone number" data-meta="Field" value="" inputmode="numeric" pattern="[0-9]*"  required=""/>
        </div>
        <div class="login-col2 signup">
            <p>How Can We Help You*</p>
           <textarea name="description" placeholder="Enter your text here" required=""></textarea>

            <input type="submit" name="btnLogin" value="Send">
            
        </div>
        </div>
        </form>
  </div>
 <?php include_once"../partials/footer.php"; ?>