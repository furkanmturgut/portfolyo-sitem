<!--HEADER -->
<?php require_once 'header.php' ?>


    <div class="page-content">
    	<div class="row">
		  
		<!-- SIDEBAR -->
		<?php require_once 'sidebar.php' ?>

		  <div class="col-md-10">
		  	

		  	<div class="row">
			<!--- ALERT START  -->
			<?php  
				if($_GET['durum'] == "bos"){ ?>

				<div class="col-md-12">
					<div class="alert alert-warning"> <span class="glyphicon glyphicon-remove"></span> Boş alan bırakmayın</div>
				</div>

			<?php
				}elseif($_GET['durum'] == "no"){ ?>
				<div class="col-md-12">
					<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> İşlem gerçekleştirilemedi</div>
				</div>
			<?php }elseif($_GET['durum'] == "ok"){ ?>
				<div class="col-md-12">
					<div class="alert alert-success"> <span class="glyphicon glyphicon-check"></span> İşlem başarılı!</div>
				</div>
			<?php }
			?>

			<!--- ALERT FINISH  -->

			<?php 
				$sql = "SELECT * FROM bilgilerim";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				$bilgiler = $stmt->fetch(PDO::FETCH_ASSOC);


			?>


		  		<div class="col-md-12 panel-primary">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Bilgilerim</div>
						
		  			</div>
		  			<div class="content-box-large box-with-header">
					  <form class="form-horizontal" method="POST" action="islem.php" role="form">

						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Yüklü Fotoğraf</label>
						<div class="col-sm-9">
						  <img width="200px" src="<?php echo $bilgiler['bilgi_foto'] ?>">
						 </div>
						</div>

						<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Fotoğraf URL</label>
							<div class="col-sm-9">
							 <input type="text" name="fotograf" class="form-control"  value="<?php echo $bilgiler['bilgi_foto'] ?>">
							 </div>
							</div>

						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">İsim</label>
						<div class="col-sm-9">
						  <input type="text" name="isim" class="form-control" value="<?php echo $bilgiler['bilgi_isim'] ?>">
						 </div>
						</div>

						<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Meslek</label>
							<div class="col-sm-9">
							 <input type="text" name="meslek" class="form-control"  value="<?php echo $bilgiler['bilgi_meslek'] ?>">
							 </div>
							</div>
							

						<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">İkamet</label>
							<div class="col-sm-9">
							 <input type="text" name="ikamet" class="form-control" value="<?php echo $bilgiler['bilgi_ikamet'] ?>">
							 </div>
							</div>

							<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Mail</label>
							<div class="col-sm-9">
							 <input type="text" name="mail" class="form-control" value="<?php echo $bilgiler['bilgi_mail'] ?>">
							 </div>
							</div>

							<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Telefon</label>
							<div class="col-sm-9">
							 <input type="text" name="telefon" class="form-control" value="<?php echo $bilgiler['bilgi_telefon'] ?>">
							 </div>
							</div>

							<hr>
							<div class="col-md-11">
								<button class="btn btn-success pull-right"  name="bilgilerim">Güncelle</button> 

							</div>
					
					
										  
					</form>
						<br /><br />
					</div>
		  		</div>
		  	</div>

		  	
		  </div>
		</div>
    </div>

<!-- FOOTER -->
<?php require_once 'footer.php' ?>