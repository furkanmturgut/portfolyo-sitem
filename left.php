<?php 
 $sql = "SELECT * FROM bilgilerim";
 $stmt = $conn->prepare($sql);
 $stmt->execute();
 $bilgiler = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!-- Left Column -->
<div class="w3-third">
    
    <div class="w3-white w3-text-grey w3-card-4">
      <div class="w3-display-container">
        <img src="<?php echo $bilgiler['bilgi_foto'] ?>" style="width:100%" alt="Avatar">
        <div class="w3-display-bottomleft w3-container w3-text-black">
          <h2 style="color:white;"><?php echo $bilgiler['bilgi_isim'] ?></h2>
        </div>
      </div>
      <div class="w3-container">
        <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $bilgiler['bilgi_meslek'] ?></p>
        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $bilgiler['bilgi_ikamet']?></p>
        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $bilgiler['bilgi_mail']?></p>
        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $bilgiler['bilgi_telefon']?></p>
        <hr>

        <!--- YETENEKLER -->

        <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Yetenekler</b></p>
        <?php  
         $sql = "SELECT * FROM yetenekler";
         $stmt = $conn->prepare($sql);
         $stmt->execute();
         $yetenekler = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach ($yetenekler as $row) {
            ?>
            <p><?php echo $row['beceri'] ?></p>
            <div class="w3-light-grey w3-round-xlarge w3-small">
              <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:<?php echo $row['yuzde'] ?>%"><?php echo $row['yuzde'] ?>%</div>
            </div>
            <br>

            <?php
          }
         ?>

        <!-- DİLLER  -->
        <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Diller</b></p>

        <?php
        $sql = "SELECT * FROM dillerim";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $diller = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($diller as $row ) {
         ?>
        <p><?php echo $row['dil'] ?></p>
        <div class="w3-light-grey w3-round-xlarge">
        <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:<?php echo $row['yuzde'] ?>%"><?php echo $row['yuzde'] ?>%</div>
        </div>
         <?php
        }
        ?>

      
        <br>
      </div>
    </div><br>

  <!-- End Left Column -->
  </div>