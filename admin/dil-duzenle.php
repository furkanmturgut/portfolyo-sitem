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
	  					<div class="panel-title ">Dil Düzenle</div>

                        <?php 
                            $myID = $_GET['dil_id'];
                            $sql = "SELECT * FROM dillerim WHERE id= $myID";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $diller = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
						
		  			</div>
		  			<div class="content-box-large box-with-header">
					  <form class="form-horizontal" method="POST" action="islem.php?dil_id=<?php echo $myID; ?>" role="form">

						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Dil Adı</label>
						<div class="col-sm-9">
						  <input type="text" name="dil" class="form-control" value="<?php echo $diller['dil'] ?>"  >
						 </div>
						</div>

						<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Dil Yüzde(%)</label>
							<div class="col-sm-9">
							 <input type="text" name="yuzde" class="form-control" value="<?php echo $diller['yuzde'] ?>" >
							 </div>
							</div>

						

							<hr>
							<div class="col-md-11">
								<button class="btn btn-success pull-right"  name="dil-duzenle">Düzenle</button> 

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