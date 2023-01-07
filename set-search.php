<?php require_once('header.php'); 
	require_once('devlop/function.php');

	$dpt_name = $_POST['dpt_fullset'];
	$sem_name = $_POST['sem_fellSet'];

	if(isset($_REQUEST['page'])){
		$dpt_name = $_REQUEST['dpt'];
		$sem_name = $_REQUEST['sem'];
	}
	
?>


<!-- Start CMT area -->
<section class="cmt_area py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12 py-5">
				<div class="technology">
					<?php
					if ($dpt_name == 'cmt'){
					  $cmt_name = 'Computer';
					}
					else if($dpt_name == 'food'){
						$cmt_name = "Food";
					}
					else if($dpt_name == 'aidt'){
						$cmt_name = "Architecture";
					}
					else if($dpt_name == 'rac'){
						$cmt_name = "RAC";
					}
					else if($dpt_name == 'mac'){
						$cmt_name = "MAC";
					}
					?>
					<h2> <?php echo $cmt_name; ?> Technology</h2>
				</div>
			</div>
		</div>


		<!--start 1st semester -->
		<div class="row align-items-center gx-5">

			<!-- Semester -->
			<div class="col-md-12">
				<div class="sh_semester py-3 px-3 my-5">
					<h3> <?= $sem_name ?> semester</h3>
				</div>
			</div>

			<?php  

			$limit = 8;
			if(isset($_REQUEST['page'])){
				$page = $_REQUEST['page'];
			}
			else{
				$page = 1;
			}
			$offset = ($page-1)*$limit;

			$stm= $pdo->prepare("SELECT * FROM sell_books WHERE dpt_name=? AND sem_name=? ORDER BY sell_id DESC LIMIT $offset, $limit");
			$technologyData = $stm->execute(array($dpt_name,$sem_name));
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
				echo "<h3 style='font-size:30px;color:#f00;'>"."Books Not Stock!";
			}
			?>
		</div>
		<!--end 1st semester -->


		<!-- ////// php pagination ///////-->

		<?php 
		$stm= $pdo->prepare("SELECT * FROM sell_books WHERE dpt_name=? AND sem_name=? ORDER BY sell_id DESC");
		$stm->execute(array($dpt_name,$sem_name));
		$Ubooks =$stm->rowCount();
		$result = $stm->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$dpt_name = $row['dpt_name'];
			$sem_name = $row['sem_name'];
		}


		if($Ubooks > 0)
			$total_record = $Ubooks;
			$total_page = ceil($total_record/ $limit);

			echo '<ul class="pagination justify-content-center">';	
			if ($page > 1) {
			echo ' <li class="page-item"><a class="page-link" href="dpt-more-data.php?dpt='.$dpt_name.'&sem='.$sem_name.'&page='.($page - 1).'">Prev</a></li>';
			}			
			for ($i=1; $i<=$total_page; $i++) { 
				if($i == $page){
				$active = "active";
				}
				else{
					$active = "";
				}
				echo '<li class="page-item"><a class="page-link'
				." ".$active.'" href="set-search.php?dpt='.$dpt_name.'&sem='.$sem_name.'&page='.$i.'">'.$i.'</a></li>';
			}
			if($total_page > $page){
			echo '<li class="page-item"><a class="page-link" href="dpt-more-data.php?dpt='.$dpt_name.'&sem='.$sem_name.'&page='.($page + 1).'">Next</a></li>';
			}
			echo '</ul>';
		?>

	
	</div>
</section>

	



<?php require_once('footer.php'); ?>