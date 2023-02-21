<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form room">
      	<a href="chatroom.php" class="back"><i class="fas fa-arrow-left"></i></a><header>Creating Room</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text">There is an error</div>
        <div class="field input">
          <label>Room Name</label>
          <input type="text" name="Roomname" placeholder="Enter Room Name" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter password" required>
          <i class="fas fa-eye"></i>
        </div>
      
        <div class="field button">
          <input type="submit" name="submit" value="Create Room">
        </div>
      </form>
    </section>
  </div>
  <script src="js/showpassword.js"></script>

  
  
</body>
</html>
