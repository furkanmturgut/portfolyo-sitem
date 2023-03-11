<!--HEADER -->
<?php require_once 'header.php' ?>


    <div class="page-content">
    	<div class="row">
		  
		<!-- SIDEBAR -->
		<?php require_once 'sidebar.php' ?>

		  <div class="col-md-10">
		  	

		  	<div class="row">
		


		  		<div class="col-md-12 panel-primary">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Yetenek Düzenle</div>

                        <?php 
                            $myID = $_GET['beceri_id'];
                            $sql = "SELECT * FROM yetenekler WHERE id= $myID";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $yetenek = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
						
		  			</div>
		  			<div class="content-box-large box-with-header">
					  <form class="form-horizontal" method="POST" action="islem.php?beceri_id=<?php echo $myID; ?>" role="form">

						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Yetenek Adı</label>
						<div class="col-sm-9">
						  <input type="text" name="beceri" class="form-control" value="<?php echo $yetenek['beceri'] ?>"  >
						 </div>
						</div>

						<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Yetenek Yüzde(%)</label>
							<div class="col-sm-9">
							 <input type="text" name="yuzde" class="form-control" value="<?php echo $yetenek['yuzde'] ?>" >
							 </div>
							</div>

						

							<hr>
							<div class="col-md-11">
								<button class="btn btn-success pull-right"  name="beceri-duzenle">Düzenle</button> 

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