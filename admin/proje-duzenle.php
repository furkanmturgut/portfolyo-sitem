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
	  					<div class="panel-title ">Proje Düzenle</div>

                        <?php 
                            $myID = $_GET['proje_id'];
                            $sql = "SELECT * FROM projeler WHERE id= $myID";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $projeler = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
						
		  			</div>
		  			<div class="content-box-large box-with-header">
					  <form class="form-horizontal" method="POST" action="islem.php?dil_id=<?php echo $myID; ?>" role="form">

						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Proje Adı</label>
						<div class="col-sm-9">
						  <input type="text" name="adi" class="form-control" value="<?php echo $projeler['adi'] ?>"  >
						 </div>
						</div>

						<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Proje Fiyat</label>
							<div class="col-sm-9">
							 <input type="text" name="fiyat" class="form-control" value="<?php echo $projeler['fiyat'] ?>" >
							 </div>
							</div>

                            <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Proje Link</label>
							<div class="col-sm-9">
							 <input type="text" name="url" class="form-control" value="<?php echo $projeler['link'] ?>" >
							 </div>
							</div>

                            <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Proje Açıklama</label>
							<div class="col-sm-9">
                                <textarea name="aciklama" class="form-control" cols="30" rows="5"> <?php echo $projeler['aciklama'] ?>"</textarea>
                            </div>
							</div>


						

							<hr>
							<div class="col-md-11">
								<button class="btn btn-success pull-right"  name="proje-duzenle">Düzenle</button> 

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