 <!-- End Grid -->
 </div>
  
  <!-- End Page Container -->
</div>

<?php 
$sql = "SELECT * FROM sosyalmedya";
$stmt = $conn->prepare($sql);
$stmt->execute();
$sosyalmeyda = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Sosyal Medya Hesaplarım</p>
  <a href="<?php echo $sosyalmeyda['sm_facebook'] ?>"  target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
  <a href="<?php echo $sosyalmeyda['sm_instagram'] ?>"  target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
  <a href="<?php echo $sosyalmeyda['sm_snapchat'] ?>"  target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
  <a href="<?php echo $sosyalmeyda['sm_pinterest'] ?>"  target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
  <a href="<?php echo $sosyalmeyda['sm_twitter'] ?>"  target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>
  <a href="<?php echo $sosyalmeyda['sm_linkedin'] ?>"  target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
  <a href="<?php echo $sosyalmeyda['sm_youtube'] ?>"  target="_blank"><i class="fa fa-youtube w3-hover-opacity"></i></a>


  <p><?php echo $ayar['site_footer'] ?> <a href="<?php echo $ayar['site_url'] ?>" target="_blank">Furkan Turgut</a></p>
</footer>

</body>
</html>