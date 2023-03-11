
<!-- İŞ DENEYİM -->
<div class="w3-twothird">
    
    <div class="w3-container w3-card w3-white w3-margin-bottom">
      <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>İş Deneyimlerim</h2>
      <?php  
        $sql = "SELECT * FROM isler ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $isler = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($isler as $row) {
          
          if($row['is_devam'] == 1){ ?>
            <div class="w3-container">
                <h5 class="w3-opacity"><b><?php echo $row['is_adi'] ?> / <?php echo $row['is_link'] ?></b></h5>
                <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $row['is_tarih'] ?> <span class="w3-tag w3-teal w3-round">Devam Ediyor</span></h6>
                <p><?php echo $row['is_aciklama'] ?></p>
               <hr>
            </div>

         <?php }else { ?>
          <div class="w3-container">
                <h5 class="w3-opacity"><b><?php echo $row['is_adi'] ?> / <?php echo $row['is_link'] ?></b></h5>
                <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $row['is_tarih'] ?></h6>
                <p><?php echo $row['is_aciklama'] ?></p>
               <hr>
            </div>

       <?php  }

        }
      ?>
      </div>


    <!-- PROJELER -->
    <hr>
    <div class="w3-container w3-card w3-white">
      <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-code fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Projeler</h2>

      <?php 
        $sql = "SELECT * FROM projeler ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $egitim = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($egitim as $row) { ?>
          
      
        <hr>
        <div class="w3-container">
        <h5 class="w3-opacity"><b><?php echo $row['adi'] ?> / <a href="<?php echo $row['link'] ?>" target="_blank"> </b><?php echo $row['link'] ?></a></h5>
        <h6 class="w3-text-teal"><i class="fa fa-try fa-fw w3-margin-right"></i><?php echo $row['fiyat'] ?></h6>
        <p><?php echo $row['aciklama'] ?></p>
      </div>
      
     <?php } ?> 
      </div>

    
    

    <!-- EĞİTİM -->
    <hr>
    <div class="w3-container w3-card w3-white">
      <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Eğitim</h2>

      <?php 
        $sql = "SELECT * FROM egitim ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $egitim = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($egitim as $row) {
          
          if($row['aktiflik'] == 1){ ?>
          <hr>
           <div class="w3-container">
        <h5 class="w3-opacity"><b><?php echo $row['adi'] ?></b></h5>
        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $row['tarih'] ?> <span class="w3-tag w3-teal w3-round">Devam Ediyor</span></h6>
        <p><?php echo $row['aciklama'] ?></p>
        
      </div>

      <?php    }else{ ?>
        <hr>
        <div class="w3-container">
        <h5 class="w3-opacity"><b><?php echo $row['adi'] ?></b></h5>
        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $row['tarih'] ?></h6>
        <p><?php echo $row['aciklama'] ?></p>
      </div>
      
      <?php     } 
        }
      ?>
      </div>
      </div>
      </div>



     


  <!-- End Right Column -->
 