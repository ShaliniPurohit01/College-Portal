<?php
include("header.php");
if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("dbconnection.php");
if(isset($_GET["delid"]))
{
	$sql="DELETE FROM album WHERE album_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Album record deleted successfully...');</script>";
	}
}
?>

<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
            <?php
	  include("leftsidebar.php");
	  ?>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="two_third"> 
        <!-- ################################################################################################ -->
<h1><a href="Newalbum.php">Add New Album</a> | <a href="viewalbum.php">View Album</a></h1> 
       <h1>View Album</h1>
<table width="613" style="border:medium;background-size:cover" >
  <tr>
    <th scope="col">Album title</th>
    <th scope="col">Album description</th>
    <th scope="col">Publish date</th>
    <th scope="col">Status</th>
    <th scope="col">Action</th>
  </tr>
  <?php
  $sql="SELECT * FROM album";
  $qsql=mysqli_query($con,$sql);
  while($rs=mysqli_fetch_array($qsql))
  {
	    ?>
  <tr>
    <td>&nbsp;<?php echo $rs["album_title"]; ?></td>
    <td>&nbsp<?php echo $rs["album_description"]; ?>;</td>
    <td>&nbsp;<?php echo $rs["publish_date"]; ?></td>
    <td>&nbsp;<?php echo $rs["status"]; ?></td>
    <td>&nbsp;
    <a href="Newalbum.php?editid=<?php echo $rs["album_id"]; ?>">Edit</a> <hr /> 
    <a href="viewalbum.php?delid=<?php echo $rs["album_id"]; ?>">Delete</a> <hr />
    <a href="viewimage.php?albumid=<?php echo $rs["album_id"]; ?>">Upload images</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
        <div id="comments"></div>
        <!-- ################################################################################################ --> 
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