<?php require_once('header.php'); 

	require_once('devlop/function.php');

?>







<!-- Start CMT area -->

	<section class="cmt_area py-5">

		<div class="container">

			<div class="row">

				<div class="col-md-12 py-5">

					<div class="technology">

						<h2>Computer Technology (666)</h2>

					</div>

				</div>

			</div>





			<!--start 1st semester -->

			<div class="row align-items-center gx-5">



				<!-- Semester -->

				<div class="col-md-12">

					<div class="sh_semester py-3 px-3 my-5">

						<h3>1st semester</h3>

					</div>

				</div>

				<?php  

				$stm= $pdo->prepare("SELECT * FROM sell_books WHERE dpt_name=? AND sem_name=? ORDER BY sell_id DESC");

				$stm->execute(array('cmt','1st'));

				$Ubooks =$stm->rowCount();

				if ($Ubooks != 0) {

					$count = 0;

				$result = $stm->fetchAll(PDO::FETCH_ASSOC);

					foreach ($result as $row):

					$count++;

					if($count <=4){

				?>

				<!-- books itms -->

				<div class="col-lg-3 col-md-4 col-sm-6 col-6">

					<div class="card sh_card">

						<div class="sh_card-img">

							<img src="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>" alt="books">

							<div class="sh_boks_overlay">

								<a class="sh_books_popup" href="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>"><i class="fas fa-eye"></i></a>

							</div>

						</div>

						<div class="card-body sh_card_body">

						    <h4 class="card-title"><?= ucfirst($row['books_name']); ?></h4>

						    <h4 class="card-subtitle mb-4 text-muted">Subject Code: <?= $row['subject_code']; ?></h4>

						    <p class="sh_dpt"><strong> DPT:</strong> <?= $row['dpt_name']; ?></p>

						    <p class="sh_sem mb-3"><strong> SEM:</strong> <?= $row['sem_name']; ?></p>

						    <div class="card_button">

						    	<p class="sh_Books_Price"><strong>৳.<?=$row['books_price']; ?> </strong></p>

								<a href="buy-now.php?uid=<?= base64_encode($row['user_id']); ?>&bid=<?=base64_encode($row['sell_id']);  ?>" class="card-link">

						    	<span class="Sh_card_left"><i class="fas fa-shopping-cart"></i></span> 

								<span class="Sh_card_right">

									<span class="Sh_right_btn"></span>

									Buy Now

								</span>

								</a>

							</div>

						</div>

					</div>

				</div>

				<?php 

					} 

				endforeach;

					if ($count>4){

						$dpt_name = $row['dpt_name'];

						$sem_name = $row['sem_name'];

					echo "

						<a class='show_more' href='dpt-more-data.php?dpt=$dpt_name&sem=$sem_name'>Show More<i class= 'fas fa-angle-double-right'></i></a>

					";

				}

				}

				

				else{

					echo "<h3 style='font-size:30px;color:#f00;'>"."Books Not Stock!";

				}

				?>

			</div>

			<!--end 1st semester -->





			<!--start 2nd semester -->

			<div class="row align-items-center gx-5">



				<!-- Semester -->

				<div class="col-md-12">

					<div class="sh_semester py-3 px-3 my-5">

						<h3>2nd semester</h3>

					</div>

				</div>

				<?php  

				$stm= $pdo->prepare("SELECT * FROM sell_books WHERE dpt_name=? AND sem_name=? ORDER BY sell_id DESC ");

				$stm->execute(array('cmt','2nd'));

				$Ubooks =$stm->rowCount();

				if ($Ubooks != 0) {

					$count = 0;

				$result = $stm->fetchAll(PDO::FETCH_ASSOC);

					foreach ($result as $row):

					$count++;

					$status = $row['sell_status'];

					if($count <=4){

				?>

				<!-- books itms -->

				<div class="col-lg-3 col-md-4 col-sm-6 col-6">

					<div class="card sh_card">

						<div class="sh_card-img">

							<img src="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>" alt="books">

							<div class="sh_boks_overlay">

								<a class="sh_books_popup" href="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>"><i class="fas fa-eye"></i></a>

							</div>

						</div>

						<div class="card-body sh_card_body">

						    <h4 class="card-title"><?= ucfirst($row['books_name']); ?></h4>

						    <h4 class="card-subtitle mb-4 text-muted">Subject Code: <?= $row['subject_code']; ?></h4>

						    <p class="sh_dpt"><strong> DPT:</strong> <?= $row['dpt_name']; ?></p>

						    <p class="sh_sem mb-3"><strong> SEM:</strong> <?= $row['sem_name']; ?></p>

						    <div class="card_button">

						    	<p class="sh_Books_Price"><strong>৳.<?=$row['books_price']; ?> </strong></p>

								<a href="buy-now.php?uid=<?= base64_encode($row['user_id']); ?>&bid=<?=base64_encode($row['sell_id']);  ?>" class="card-link">

						    	<span class="Sh_card_left"><i class="fas fa-shopping-cart"></i></span> 

								<span class="Sh_card_right">

									<span class="Sh_right_btn"></span>

									Buy Now

								</span>

								</a>

							</div>

						</div>

					</div>

				</div>

				<?php 

					} 

				endforeach;

					if ($count>4){

						$dpt_name = $row['dpt_name'];

						$sem_name = $row['sem_name'];

					echo "

						<a class='show_more' href='dpt-more-data.php?dpt=$dpt_name&sem=$sem_name'>Show More<i class= 'fas fa-angle-double-right'></i></a>

					";

				}

				}

				

				else{

					echo "<h3 style='font-size:30px;color:#f00;'>"."Books Not Stock!";

				}

				?>

				<!-- books itms -->

			</div>

			<!--end 2nd semester -->







			<!--start 3rd semester -->

			<div class="row align-items-center gx-5">



				<!-- Semester -->

				<div class="col-md-12">

					<div class="sh_semester py-3 px-3 my-5">

						<h3>3rd Semester</h3>

					</div>

				</div>

				<?php  

				$stm= $pdo->prepare("SELECT * FROM sell_books WHERE dpt_name=? AND sem_name=? ORDER BY sell_id DESC");

				$stm->execute(array('cmt','3rd'));

				$Ubooks =$stm->rowCount();

				if ($Ubooks != 0) {

					$count = 0;

				$result = $stm->fetchAll(PDO::FETCH_ASSOC);

					foreach ($result as $row):

					$count++;

					if($count <=4){

				?>

				<!-- books itms -->

				<div class="col-lg-3 col-md-4 col-sm-6 col-6">

					<div class="card sh_card">

						<div class="sh_card-img">

							<img src="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>" alt="books">

							<div class="sh_boks_overlay">

								<a class="sh_books_popup" href="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>"><i class="fas fa-eye"></i></a>

							</div>

						</div>

						<div class="card-body sh_card_body">

						    <h4 class="card-title"><?= ucfirst($row['books_name']); ?></h4>

						    <h4 class="card-subtitle mb-4 text-muted">Subject Code: <?= $row['subject_code']; ?></h4>

						    <p class="sh_dpt"><strong> DPT:</strong> <?= $row['dpt_name']; ?></p>

						    <p class="sh_sem mb-3"><strong> SEM:</strong> <?= $row['sem_name']; ?></p>

						    <div class="card_button">

						    	<p class="sh_Books_Price"><strong>৳.<?=$row['books_price']; ?> </strong></p>

								<a href="buy-now.php?uid=<?= base64_encode($row['user_id']); ?>&bid=<?=base64_encode($row['sell_id']);  ?>" class="card-link">

						    	<span class="Sh_card_left"><i class="fas fa-shopping-cart"></i></span> 

								<span class="Sh_card_right">

									<span class="Sh_right_btn"></span>

									Buy Now

								</span>

								</a>

							</div>

						</div>

					</div>

				</div>

				<?php 

					} 

				endforeach;

					if ($count>4){

						$dpt_name = $row['dpt_name'];

						$sem_name = $row['sem_name'];

					echo "

						<a class='show_more' href='dpt-more-data.php?dpt=$dpt_name&sem=$sem_name'>Show More<i class= 'fas fa-angle-double-right'></i></a>

					";

				}

				}

				

				else{

					echo "<h3 style='font-size:30px;color:#f00;'>"."Books Not Stock!";

				}

				?>

			</div>

			<!--end 3rd semester -->





			<!--start 4th semester -->

			<div class="row align-items-center gx-5">



				<!-- Semester -->

				<div class="col-md-12">

					<div class="sh_semester py-3 px-3 my-5">

						<h3>4th Semester</h3>

					</div>

				</div>

				<?php  

				$stm= $pdo->prepare("SELECT * FROM sell_books WHERE dpt_name=? AND sem_name=? ORDER BY sell_id DESC");

				$stm->execute(array('cmt','4th'));

				$Ubooks =$stm->rowCount();

				if ($Ubooks != 0) {

					$count = 0;

				$result = $stm->fetchAll(PDO::FETCH_ASSOC);

					foreach ($result as $row):

					$count++;

					if($count <=4){

				?>

				<!-- books itms -->

				<div class="col-lg-3 col-md-4 col-sm-6 col-6">

					<div class="card sh_card">

						<div class="sh_card-img">

							<img src="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>" alt="books">

							<div class="sh_boks_overlay">

								<a class="sh_books_popup" href="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>"><i class="fas fa-eye"></i></a>

							</div>

						</div>

						<div class="card-body sh_card_body">

						    <h4 class="card-title"><?= ucfirst($row['books_name']); ?></h4>

						    <h4 class="card-subtitle mb-4 text-muted">Subject Code: <?= $row['subject_code']; ?></h4>

						    <p class="sh_dpt"><strong> DPT:</strong> <?= $row['dpt_name']; ?></p>

						    <p class="sh_sem mb-3"><strong> SEM:</strong> <?= $row['sem_name']; ?></p>

						    <div class="card_button">

						    	<p class="sh_Books_Price"><strong>৳.<?=$row['books_price']; ?> </strong></p>

								<a href="buy-now.php?uid=<?= base64_encode($row['user_id']); ?>&bid=<?=base64_encode($row['sell_id']);  ?>" class="card-link">

						    	<span class="Sh_card_left"><i class="fas fa-shopping-cart"></i></span> 

								<span class="Sh_card_right">

									<span class="Sh_right_btn"></span>

									Buy Now

								</span>

								</a>

							</div>

						</div>

					</div>

				</div>

				<?php 

					} 

				endforeach;

					if ($count>4){

						$dpt_name = $row['dpt_name'];

						$sem_name = $row['sem_name'];

					echo "

						<a class='show_more' href='dpt-more-data.php?dpt=$dpt_name&sem=$sem_name'>Show More<i class= 'fas fa-angle-double-right'></i></a>

					";

				}

				}

				

				else{

					echo "<h3 style='font-size:30px;color:#f00;'>"."Books Not Stock!";

				}

				?>

			</div>

			<!--end 4th semester -->





			<!--start 5th semester -->

			<div class="row align-items-center gx-5">



				<!-- Semester -->

				<div class="col-md-12">

					<div class="sh_semester py-3 px-3 my-5">

						<h3>5th Semester</h3>

					</div>

				</div>

				<?php  

				$stm= $pdo->prepare("SELECT * FROM sell_books WHERE dpt_name=? AND sem_name=? ORDER BY sell_id DESC");

				$stm->execute(array('cmt','5th'));

				$Ubooks =$stm->rowCount();

				if ($Ubooks != 0) {

					$count = 0;

				$result = $stm->fetchAll(PDO::FETCH_ASSOC);

					foreach ($result as $row):

					$count++;

					if($count <=4){

				?>

				<!-- books itms -->

				<div class="col-lg-3 col-md-4 col-sm-6 col-6">

					<div class="card sh_card">

						<div class="sh_card-img">

							<img src="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>" alt="books">

							<div class="sh_boks_overlay">

								<a class="sh_books_popup" href="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>"><i class="fas fa-eye"></i></a>

							</div>

						</div>

						<div class="card-body sh_card_body">

						    <h4 class="card-title"><?= ucfirst($row['books_name']); ?></h4>

						    <h4 class="card-subtitle mb-4 text-muted">Subject Code: <?= $row['subject_code']; ?></h4>

						    <p class="sh_dpt"><strong> DPT:</strong> <?= $row['dpt_name']; ?></p>

						    <p class="sh_sem mb-3"><strong> SEM:</strong> <?= $row['sem_name']; ?></p>

						    <div class="card_button">

						    	<p class="sh_Books_Price"><strong>৳.<?=$row['books_price']; ?> </strong></p>

								<a href="buy-now.php?uid=<?= base64_encode($row['user_id']); ?>&bid=<?=base64_encode($row['sell_id']);  ?>" class="card-link">

						    	<span class="Sh_card_left"><i class="fas fa-shopping-cart"></i></span> 

								<span class="Sh_card_right">

									<span class="Sh_right_btn"></span>

									Buy Now

								</span>

								</a>

							</div>

						</div>

					</div>

				</div>

				<?php 

					} 

				endforeach;

					if ($count>4){

						$dpt_name = $row['dpt_name'];

						$sem_name = $row['sem_name'];

					echo "

						<a class='show_more' href='dpt-more-data.php?dpt=$dpt_name&sem=$sem_name'>Show More<i class= 'fas fa-angle-double-right'></i></a>

					";

				}

				}

				

				else{

					echo "<h3 style='font-size:30px;color:#f00;'>"."Books Not Stock!";

				}

				?>

			</div>

			<!--end 5th semester -->





			<!--start 6th semester -->

			<div class="row align-items-center gx-5">



				<!-- Semester -->

				<div class="col-md-12">

					<div class="sh_semester py-3 px-3 my-5">

						<h3>6th Semester</h3>

					</div>

				</div>

				<?php  

				$stm= $pdo->prepare("SELECT * FROM sell_books WHERE dpt_name=? AND sem_name=? ORDER BY sell_id DESC");

				$stm->execute(array('cmt','6th'));

				$Ubooks =$stm->rowCount();

				if ($Ubooks != 0) {

					$count = 0;

				$result = $stm->fetchAll(PDO::FETCH_ASSOC);

					foreach ($result as $row):

					$count++;

					if($count <=4){

				?>

				<!-- books itms -->

				<div class="col-lg-3 col-md-4 col-sm-6 col-6">

					<div class="card sh_card">

						<div class="sh_card-img">

							<img src="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>" alt="books">

							<div class="sh_boks_overlay">

								<a class="sh_books_popup" href="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>"><i class="fas fa-eye"></i></a>

							</div>

						</div>

						<div class="card-body sh_card_body">

						    <h4 class="card-title"><?= ucfirst($row['books_name']); ?></h4>

						    <h4 class="card-subtitle mb-4 text-muted">Subject Code: <?= $row['subject_code']; ?></h4>

						    <p class="sh_dpt"><strong> DPT:</strong> <?= $row['dpt_name']; ?></p>

						    <p class="sh_sem mb-3"><strong> SEM:</strong> <?= $row['sem_name']; ?></p>

						    <div class="card_button">

						    	<p class="sh_Books_Price"><strong>৳.<?=$row['books_price']; ?> </strong></p>

								<a href="buy-now.php?uid=<?= base64_encode($row['user_id']); ?>&bid=<?=base64_encode($row['sell_id']);  ?>" class="card-link">

						    	<span class="Sh_card_left"><i class="fas fa-shopping-cart"></i></span> 

								<span class="Sh_card_right">

									<span class="Sh_right_btn"></span>

									Buy Now

								</span>

								</a>

							</div>

						</div>

					</div>

				</div>

				<?php 

					} 

				endforeach;

					if ($count>4){

						$dpt_name = $row['dpt_name'];

						$sem_name = $row['sem_name'];

					echo "

						<a class='show_more' href='dpt-more-data.php?dpt=$dpt_name&sem=$sem_name'>Show More<i class= 'fas fa-angle-double-right'></i></a>

					";

				}

				}

				

				else{

					echo "<h3 style='font-size:30px;color:#f00;'>"."Books Not Stock!";

				}

				?>

			</div>

			<!--end 6th semester -->





			<!--start 7th semester -->

			<div class="row align-items-center gx-5">



				<!-- Semester -->

				<div class="col-md-12">

					<div class="sh_semester py-3 px-3 my-5">

						<h3>7th Semester</h3>

					</div>

				</div>

				<?php  

				$stm= $pdo->prepare("SELECT * FROM sell_books WHERE dpt_name=? AND sem_name=? ORDER BY sell_id DESC");

				$stm->execute(array('cmt','7th'));

				$Ubooks =$stm->rowCount();

				if ($Ubooks != 0) {

					$count = 0;

				$result = $stm->fetchAll(PDO::FETCH_ASSOC);

					foreach ($result as $row):

					$count++;

					if($count <=4){

				?>

				<!-- books itms -->

				<div class="col-lg-3 col-md-4 col-sm-6 col-6">

					<div class="card sh_card">

						<div class="sh_card-img">

							<img src="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>" alt="books">

							<div class="sh_boks_overlay">

								<a class="sh_books_popup" href="

							<?php  

								$book_img = $row['books_image'];

								echo "assets/images/books/".$book_img;

							?>"><i class="fas fa-eye"></i></a>

							</div>

						</div>

						<div class="card-body sh_card_body">

						    <h4 class="card-title"><?= ucfirst($row['books_name']); ?></h4>

						    <h4 class="card-subtitle mb-4 text-muted">Subject Code: <?= $row['subject_code']; ?></h4>

						    <p class="sh_dpt"><strong> DPT:</strong> <?= $row['dpt_name']; ?></p>

						    <p class="sh_sem mb-3"><strong> SEM:</strong> <?= $row['sem_name']; ?></p>

						    <div class="card_button">

						    	<p class="sh_Books_Price"><strong>৳.<?=$row['books_price']; ?> </strong></p>

								<a href="buy-now.php?uid=<?= base64_encode($row['user_id']); ?>&bid=<?=base64_encode($row['sell_id']);  ?>" class="card-link">

						    	<span class="Sh_card_left"><i class="fas fa-shopping-cart"></i></span> 

								<span class="Sh_card_right">

									<span class="Sh_right_btn"></span>

									Buy Now

								</span>

								</a>

							</div>

						</div>

					</div>

				</div>

				<?php 

					} 

				endforeach;

					if ($count>4){

						$dpt_name = $row['dpt_name'];

						$sem_name = $row['sem_name'];

					echo "

						<a class='show_more' href='dpt-more-data.php?dpt=$dpt_name&sem=$sem_name'>Show More<i class= 'fas fa-angle-double-right'></i></a>

					";

				}

				}

				

				else{

					echo "<h3 style='font-size:30px;color:#f00;'>"."Books Not Stock!";

				}

				?>

			</div>

			<!--end 7th semester -->

		</div>

	</section>







<?php require_once('footer.php'); ?>