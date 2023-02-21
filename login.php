<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>TUTORING PROGRAM</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text">There is an error</div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter password" required>
          <i class="fas fa-eye"></i>
        </div>
      
        <div class="field button">
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Create an account now</a></div>
    </section>
  </div>
  <script src="js/showpassword.js"></script>
  <script src="login.js"></script>

  
  
</body>
</html>
