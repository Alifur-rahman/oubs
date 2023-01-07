<?php require_once('header.php'); 
	require_once('devlop/function.php');

	$sub_name = $_POST['sub_name'];
	$sub_code = $_POST['sub_code'];
	
?>


<!-- Start CMT area -->
<section class="cmt_area py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12 py-5">
				<div class="technology">
				</div>
			</div>
		</div>


		<!--start 1st semester -->
		<div class="row align-items-center gx-5">

			<!-- Semester -->
			<?php  
			$stm= $pdo->prepare("SELECT * FROM sell_books WHERE books_name=? LIKE '%$sub_code%' AND subject_code=?   ORDER BY sell_id DESC");
			$technologyData = $stm->execute(array($sub_name,$sub_code));
			$Ubooks =$stm->rowCount();
			if ($Ubooks != 0) {
				$count = 0;
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($result as $row):
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
			endforeach;
			}
			else{
				echo "<h3 style='font-size:30px;color:#f00;'>"."Books Not Found!";
			}
			?>
		</div>
		<!--end 1st semester -->

	
	</div>
</section>

	



<?php require_once('footer.php'); ?>