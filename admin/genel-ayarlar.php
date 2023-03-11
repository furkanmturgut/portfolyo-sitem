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
				if($_GET['kayit-durum'] == "bos"){ ?>

				<div class="col-md-12">
					<div class="alert alert-warning"> <span class="glyphicon glyphicon-remove"></span> Boş alan bırakmayın</div>
				</div>

			<?php
				}elseif($_GET['kayit-durum'] == "no"){ ?>
				<div class="col-md-12">
					<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> İşlem gerçekleştirilemedi</div>
				</div>
			<?php }elseif($_GET['kayit-durum'] == "ok"){ ?>
				<div class="col-md-12">
					<div class="alert alert-success"> <span class="glyphicon glyphicon-check"></span> İşlem başarılı!</div>
				</div>
			<?php }
			?>

			<!--- ALERT FINISH  -->


		  		<div class="col-md-12 panel-primary">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Genel Ayarlar</div>
						
		  			</div>
		  			<div class="content-box-large box-with-header">
					  <form class="form-horizontal" method="POST" action="islem.php" role="form">

						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Site Title</label>
						<div class="col-sm-9">
						  <input type="text" name="title" class="form-control" value="<?php echo $ayarlar['site_title'] ?>">
						 </div>
						</div>

						<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Site Url</label>
							<div class="col-sm-9">
							 <input type="text" name="url" class="form-control"  value="<?php echo $ayarlar['site_url'] ?>">
							 </div>
							</div>

						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Site Description</label>
						<div class="col-sm-9">
						  <input type="text" name="desc" class="form-control" value="<?php echo $ayarlar['site_desc'] ?>">
						 </div>
						</div>

						<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Site Keywords</label>
							<div class="col-sm-9">
							 <input type="text" name="keyw" class="form-control"  value="<?php echo $ayarlar['site_key'] ?>">
							 </div>
							</div>
							

						<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Site Footer</label>
							<div class="col-sm-9">
							 <input type="text" name="footer" class="form-control" value="<?php echo $ayarlar['site_footer'] ?>">
							 </div>
							</div>

							<hr>
							<div class="col-md-11">
								<button class="btn btn-success pull-right"  name="genel-ayarlar">Güncelle</button> 

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