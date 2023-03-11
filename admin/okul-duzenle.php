<!--HEADER -->
<?php require_once 'header.php' ?>


    <div class="page-content">
    	<div class="row">
		  
		<!-- SIDEBAR -->
		<?php require_once 'sidebar.php' ?>

		  <div class="col-md-10">
		  	

		  	<div class="row">
            <?php  
                $myID = $_GET['okul_id'];
                $sql = "SELECT * FROM egitim WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id",$myID);
                $stmt->execute();

                $okullar = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>


		  		<div class="col-md-12 panel-primary">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Okul Düzenle</div>
						
		  			</div>
		  			<div class="content-box-large box-with-header">
					  <form class="form-horizontal" method="POST" action="islem.php?is_id=<?php echo $myID ?>" role="form">

						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Okul Adı</label>
						<div class="col-sm-9">
						  <input type="text" name="adi" class="form-control" value="<?php echo $okullar['adi'] ?>" >
						 </div>
						</div>


                            <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Okul Durum</label>
							<div class="col-sm-9">
							 <select name="durum" class="form-control">
                                <option value="1" <?php echo $okullar['aktiflik'] == 1 ? "selected" : null; ?> >Hala Devam Ediyor</option>
                                <option value="0" <?php echo $okullar['aktiflik'] == 0 ? "selected" : null; ?> >Devam Etmiyor</option>
                             </select>
							 </div>
							</div>
							
                            <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Okul Açıklama</label>
							<div class="col-sm-9">
                                <textarea name="aciklama" class="form-control" cols="30" rows="5"> <?php echo $okullar['aciklama'] ?>"</textarea>
                            </div>
							</div>

						

							<hr>
							<div class="col-md-11">
								<button class="btn btn-success pull-right"  name="okul-duzenle">Güncelle</button> 

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