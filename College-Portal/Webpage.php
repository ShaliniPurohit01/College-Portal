<?php
include("header.php");

if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}

include("dbconnection.php");

if(isset($_POST["submit"]))
{
	$filename= rand(). $_FILES["image"]["name"];
	move_uploaded_file($_FILES["image"]["tmp_name"],"webpage/".$filename);
	$sql="UPDATE webpage SET pagetitle='$_POST[pagetitle]',pagediscriptipon='$_POST[editor1]'";
	if($_FILES["image"]["name"] != "")
	{
	$sql = $sql . " ,imagepath='$filename' ";
	}
	$sql = $sql . " WHERE webpage_id='".$_GET["webpage"]."'";
	if(!$qsql=mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}
	else
	{
		echo "<script>alert('webpage updated sucessfully..');</script>";
	}
}

	$sql ="SELECT * FROM  webpage where webpage_id='".$_GET["editid"]."'";
	$qsql = mysqli_query($con,$sql);
	$rs= mysqli_fetch_array($qsql);
//	echo "Record". mysqli_num_rows($qsql);
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
        <h1>Web Page</h1>

        <form method="post" action="" onsubmit="validateform()" name="form1" enctype="multipart/form-data" >
<table width="582" border="1"  >
  <tr>
    <td width="13%">Page</td>
    <td width="87%">
    <select name="page" id="page" onchange="changewebpage(this.value)">
    <option value="">Select Web page</option>
    <?php
	$sql = "SELECT * FROM webpage";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		if($rs["webpage_id"] == $_GET["webpage"])
		{
		echo "<option value='$rs[webpage_id]'>$rs[pagename]</option>";
		}
		else
		{
		echo "<option value='$rs[webpage_id]'>$rs[pagename]</option>";
		}
	}
	?>
    </select>
    </td>
  </tr>
</table>
<hr>
<?php
$sqlwebpage = "SELECT * FROM webpage WHERE webpage_id='".$_GET["webpage"]."'";
$qsqlwebpage = mysqli_query($con,$sqlwebpage);
$rswebpage = mysqli_fetch_array($qsqlwebpage);
?>
<table width="200" border="1">
<tr>
	<td>Page Title</td>
	<td><input type="text"  value="<?php if(isset($_REQUEST["webpage"])) echo $rswebpage["pagetitle"]; ?>" name="pagetitle" id="pagetitle" style="width:100%;height:20px;"></td>
</tr>
<tr>
    <td>Description</td>
    <td>
    <?php
    include("ckeditor.php");
    ?>
    </td>
</tr>
<tr>
    <td>Image</td>
    <td><input type="file" name="image" id="image"><br>
    <img src="webpage/<?php echo $rswebpage["imagepath"]; ?>" width="100" height="100">
    </td>
</tr>
</select>        
</table> 
</td>
        
  </tr>

<tr>
  <td>&nbsp;</td>
  <td><input type="submit" name="submit" id="submit" value="Submit"></td>
</tr>
</table>
<p>&nbsp;</p>
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
?>
<script type="application/javascript">
function changewebpage(webpage)
{
    window.location.assign("Webpage.php?webpage="+webpage)
}

function validateform()
{
	if(document.form1.pagetitle.value=="")
	{
		alert("Page title should not be empty..");
		return false;
	}
	else
	{
		return true;
	}
}
</script>