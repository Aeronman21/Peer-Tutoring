<?php 
	session_start();
	if(!isset($_SESSION['unique_id'])){
		header("location: login.php");
	}
?>
<?php include_once "header.php" ?>
<body>
  <div class="wrapper">
    <section class="chatroom">
      <header>
	  <?php
	  include_once "php/config.php";
	  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
	  if(mysqli_num_rows($sql) > 0){
		  $row = mysqli_fetch_assoc($sql);
	  }
	  ?>
	   <div class="content">
	  <div class="details">
	  <span>Welcome to chatrooms</span>
	  <p><?php echo $row['name'] ?></p>
	  </div>
	  </div>
	   <a href="user.php" class="chatroom">Home</a>
	  <a href="login.php" class="logout">Logout</a>
	  </header>
	  <div class="search">
	  <a href="addroom.php" class="addchatroom">Add room</a>
	  <span class="text"> Select or Find a chatroom</span>
	  <input type="text" placeholder="Search User">
	  <button><i class="fas fa-search"></i></button>
	  </div>

	  </a>
	</div>
    </section>
  </div>
  
   



</body>
</html>
