<?php 
while($row = mysqli_fetch_assoc($sql)){
			$output .= ' <a href="chat.php?user_id='.$row['unique_id'].'">
						  <img src="php/photos/'. $row['img'].'?>" alt="">
						  <div class="details"> 
						  <span>'. $row['name'] .'</span>
							<p> testing message </p> 
						  </div>
							<div class="status-dot"><i class="fas fa-circle"></i></div>
						   </a>';
		}

?>