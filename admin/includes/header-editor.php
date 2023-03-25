<div class="brand clearfix">

		
	<a href="../index.php" style="font-size: 20px;"><img src="img/mooneater.png" width="250px" height="60px"></a>  
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
            <?php
				$username = $_SESSION['username'];
				$sql = "SELECT * FROM admin WHERE username='$username'";
				$query = mysqli_query($koneksidb,$sql);
				$result = mysqli_fetch_array($query);
				$name=$result['name'];
				$img=$result['Image'];
				$jabatan=$result['jabatan'];

			
	
			?>
			<li class="ts-account">
				<a href="#">
				<img src="img/<?php echo $img;?>" width="20px" height="20px" padding="0px">&nbsp;
				<?php echo $name; ?> 
                <span class="fa fa-angle-down"></span>
				<?php echo $jabatan; ?> 
				</a>
				
				<ul>
					<li><a href="change-password-editor.php"><i class="fa fa-key pull-right"></i>Ganti Password</a></li>
					<li><a href="profile-editor.php"><i class="fa fa-user pull-right"></i>Profil</a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>Keluar</a></li>
				</ul>
			</li>
		</ul>
	</div>
