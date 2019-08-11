<?php
include("header.php");
include("dbconnection.php");
?>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div id="gallery">
        <figure>
          <header class="heading">Photo Gallery</header>
          
          <ul class="nospace clear">
<?php
$sql = "SELECT * FROM  album where status='active'";
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
	$sql1 = "SELECT * FROM  image where album_id='$rs[album_id]' ORDER BY RAND( ) LIMIT 0 , 1";
	$qsql1 = mysqli_query($con,$sql1);
	$rs1 = mysqli_fetch_array($qsql1);
?>
            <li class="one_quarter 
            <?php
			if($i==0)
			{
            echo " first";
				$i++;
				
			}
			else
			{
				
				if($i>=3)
				{
					$i =0;
				}
				else
				{
					$i++;
				}
				
			}
            ?>
            "><a class="nlb" data-lightbox-gallery="gallery1" href="viewgalleryimages.php?galleryid=<?php echo $rs["album_id"]; ?>">
            <div id="container"><p id="text"><?php echo $rs["album_title"]; ?></p><img class="borderedbox" src="photogallery/<?php echo $rs1["image_path"]; ?>" alt="<?php echo $rs1[image_title]; ?>" style="height:175px; width:270px;"></div></a></li>
<?php
}
?>
            </ul>        
        </figure>
      </div>
      <!-- ################################################################################################ --> 
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<?php
include("footer.php");
?>

<!-- JAVASCRIPTS --> 
<script src="backup/academic-education/layout/scripts/jquery.min.js"></script> 
<script src="backup/academic-education/layout/scripts/jquery.fitvids.min.js"></script> 
<script src="backup/academic-education/layout/scripts/jquery.mobilemenu.js"></script> 
<script src="backup/academic-education/layout/scripts/nivo-lightbox/nivo-lightbox.min.js"></script>
