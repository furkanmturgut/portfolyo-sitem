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

            <?php 
                $sql = "SELECT * FROM adminler";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $admin = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>


		  		<div class="col-md-12 panel-primary">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Profil</div>

                        <!---ALERT -->
                        <?php  
						if($_GET['guncelle'] == "ok"){ ?>

							<div class="col-md-12">
								<div class="alert alert-success"> <span class="glyphicon glyphicon-remove"></span> Parola işlemi başarılı</div>
							</div>

					<?php } ?>
						
		  			</div>
		  			<div class="content-box-large box-with-header">
					  <form class="form-horizontal" method="POST" action="islem.php" role="form">

						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Kullanıcı Adı</label>
						<div class="col-sm-9">
						  <input type="text" name="kullanici" class="form-control" value="<?php echo $admin['admin_kadi'] ?>" >
						 </div>
						</div>

                        <div class="col-sm-11">
                        <button class="btn btn-success pull-right"  name="kullanici-guncelle">Kullanıcı Adı Güncelle</button> 
                        </div>
                        <hr>

                        <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Eski Parola</label>
						<div class="col-sm-9">
						  <input type="password" name="eskiparola" class="form-control" >
						 </div>
						</div>

                        <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Yeni Parola</label>
						<div class="col-sm-9">
						  <input type="password" name="yeniparola" class="form-control" >
						 </div>
						</div>

                        <div class="col-sm-11">
                        <button class="btn btn-success pull-right"  name="parola-guncelle">Parola Güncelle</button> 
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