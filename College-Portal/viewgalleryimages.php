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
<?php        
$sqlimage = "SELECT * FROM  album where album_id='$_GET[galleryid]'";
$qsqlimage = mysqli_query($con,$sqlimage);
$rsimage = mysqli_fetch_array($qsqlimage);
?>
          <header class="heading">Photos of <?php echo $rsimage["album_title"]; ?></header>
          
          <ul class="nospace clear">
<?php
	$sql1 = "SELECT * FROM  image where album_id='$_GET[galleryid]' ";
	$qsql1 = mysqli_query($con,$sql1);
	while($rs = mysqli_fetch_array($qsql1))
	{
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
            "><a class="nlb" data-lightbox-gallery="gallery1" href="photogallery/<?php echo $rs["image_path"]; ?>" title="<?php echo $rs["image_title"]; ?>">
            <div id="container"><p id="text"><?php echo $rs["image_title"]; ?></p><img class="borderedbox" src="photogallery/<?php echo $rs["image_path"]; ?>" alt="<?php echo $rs1[image_title]; ?>" style="height:175px; width:270px;"></div></a></li>
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
