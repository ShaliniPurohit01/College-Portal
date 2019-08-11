<?php
include("header.php");
if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}

include("dbconnection.php");
if(isset($_POST["submit"]))
{
	$albumtitle = mysqli_real_escape_string($con,$_POST["albumtitle"]);
	$albumdescription = mysqli_real_escape_string($con,$_POST["albumdescription"]);
	if(isset($_GET["editid"]))
	{
		$sql="UPDATE album SET album_title='$albumtitle',album_description='$albumdescription',publish_date='$_POST[publishdate]',status='$_POST[status]' WHERE album_id='$_GET[editid]'";
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			echo "<script>alert('Album record updated sucessfully..');</script>";
		}		
	}
	else
	{
		$sql="INSERT INTO album (album_title,album_description,publish_date,status) VALUES('$albumtitle','$albumdescription','$_POST[publishdate]','$_POST[status]')";
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			echo "<script>alert('Album record inserted sucessfully..');</script>";
		}
	}
}
if(isset($_GET["editid"]))
{
	$sql ="SELECT * FROM  album where album_id='$_GET[editid]'";
	$qsql = mysqli_query($con,$sql);
	$rs= mysqli_fetch_array($qsql);
//	echo "Record". mysqli_num_rows($qsql);
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
        <h1>New Album</h1>
        <p>&nbsp;
        <form method="post" action="" onsubmit="return validateform()">
        <table width="537" border="1">
  <tr>
    <td width="24%" height="39">Album Title</td>
    <td width="76%"><input type="text" value="<?php if(isset($_REQUEST["editid"])) echo $rs["album_title"]; ?>"
	name="albumtitle" id="albumtitle" style="width:300px;"></td>
   </tr>
  <tr>
    <td height="51">Album Description</td>
    <td><textarea name="albumdescription"  id="albumdescription">
	<?php if(isset($_REQUEST["editid"])) echo $rs["album_description"]; ?> </textarea></td>
  </tr>
  <tr>
    <td height="45">Publish Date</td>
    <td><input type="date" value="<?php  if(isset($_REQUEST["editid"])) echo $rs["publish_date"]; ?>" name="publishdate" id="publishdate"></td>
  </tr>
  <tr>
    <td height="38">Status</td>
    <td><select name="status" id="status">
      <option value="active">active</option>
      <option value="inactive">inactive</option>
      </select></td>
  </tr>
  <tr>
    <td height="41">&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Submit"></td>
  </tr>
</table>
</form>
        </p>
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
?><script type="application/javascript">
function validateform()
{
	if(document.albumform.albumtitle.value=="")
	{
		alert("Albumtitle should not be empty..");
		document.albumform.albumtitle.focus();
		return false;
	}
	else if(document.albumform.albumdescription.value=="")
	{
		alert("Album description should not be empty..");
		document.albumform.albumdescription.focus();
		return false;
	}
	else if(document.albumform.publishdate.value=="")
	{
		alert("Publish date should not be empty..");
		document.albumform.publishdate.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>