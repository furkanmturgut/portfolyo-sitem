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
	  					<div class="panel-title ">İş Ekle</div>
						
		  			</div>
		  			<div class="content-box-large box-with-header">
					  <form class="form-horizontal" method="POST" action="islem.php" role="form">

						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">İş Adı</label>
						<div class="col-sm-9">
						  <input type="text" name="adi" class="form-control" placeholder="İş adı giriniz" >
						 </div>
						</div>

						<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">İş URL</label>
							<div class="col-sm-9">
							 <input type="text" name="url" class="form-control" placeholder="İş URL giriniz" >
							 </div>
							</div>

                        <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">İş Durum</label>
							<div class="col-sm-9">
							 <select name="durum" class="form-control">
								<option value="">İş Durumu Seçiniz</option>
                                <option value="1" >Hala Devam Ediyor</option>
                                <option value="0" >Devam Etmiyor</option>
                             </select>
							 </div>
							</div>
							
                            <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">İş Açıklama</label>
							<div class="col-sm-9">
                                <textarea name="aciklama" class="form-control" cols="30" rows="5"></textarea>
                            </div>
							</div>

						

							<hr>
							<div class="col-md-11">
								<button class="btn btn-success pull-right"  name="is-ekle">Ekle</button> 

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