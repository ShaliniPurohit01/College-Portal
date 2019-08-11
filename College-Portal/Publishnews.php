<?php
include("header.php");

if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("dbconnection.php");
if(isset($_POST["submit"]))
{
	$imgname = rand().$_FILES["image"]["name"];
	move_uploaded_file($_FILES["image"]["tmp_name"],"newsimg/".$imgname);
	if(isset($_GET["newsdelid"]))
	{
		$sql="UPDATE news SET publish_date='$_POST[publishdate]',news_type='$_POST[newstype]',news_title='$_POST[newstitle]',news_content='$_POST[newscontent]',image='$imgname',status='$_POST[status]' WHERE news_id='$_GET[newsdelid]'";
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			echo "<script>alert('News updated sucessfully..');</script>";
		}
	}
	else
	{
		$sql="INSERT INTO news(publish_date,news_type,news_title,news_content,image,status) VALUES('$_POST[publishdate]','$_POST[newstype]','$_POST[newstitle]','$_POST[newscontent]','$imgname','$_POST[status]')";
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			echo "<script>alert('News published sucessfully..');</script>";
		}
	}
}
if(isset($_GET["newsdelid"]))
{
	$sqlnews ="SELECT * FROM  news where news_id='".$_GET["newsdelid"]."'";
	$qsqlnews = mysqli_query($con,$sqlnews);
	$rsnews= mysqli_fetch_array($qsqlnews);
}
//	echo "Record". mysqli_num_rows($qsql);

?><!-- ################################################################################################ --> 
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
        <h1>Publish news</h1>
        <form method="post" action="" enctype="multipart/form-data" onsubmit="return validateform()">
        <table width="200" border="1">
  <tr>
    <td width="24%">News Title</td>
    <td width="76%"><input type="text" 
	name="newstitle" id="newstitle" style="width:400px;height:25px;"></td>
  </tr>
  <tr>
    <td>News Type</td>
    <td><select name="newstype" id="newstype" style="width:200px;height:25px;">
    <?php
	$arr = array("Select","Events","News");
	foreach($arr as $val)
	{
		if($val == $rsnews["news_type"])
		{
		echo "<option value='$val' selected>$val</option>";
		}
		else
		{
		echo "<option value='$val'>$val</option>";		
		}
	}
	?>   
    </select></td>
  </tr>
  <tr>
    <td>Publish date</td>
    <td><input type="date"  value="<?php echo $rsnews["publish_date"]; ?>" name="publishdate" id="publishdate" style="width:200px;height:25px;"></td>
  </tr>
  <tr>
    <td>News content</td>
    <td><textarea name="newscontent" id="newscontent" style="width:400px;height:80px;">
	</textarea></td>
  </tr>
  <tr>
    <td>Image</td>
    <td><p>
      <input type="file" name="image" id="image" style="width:200px;height:25px;">
      </p>
      <tr>
    <td>Status</td>
    <td><select name="status" id="status" style="width:200px;height:25px;">
    <?php
	$arr = array("Select","Active","Inactive");
	foreach($arr as $val)
	{
		if($val == $rsnews[status])
		{
		echo "<option value='$val' selected>$val</option>";
		}
		else
		{
		echo "<option value='$val'>$val</option>";		
		}
	}
	?>   
    </select></td>
  </tr>
     
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Submit"></td>
  </tr>
</table>
</form>
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
	if(document.publishnewsform.newstitle.value=="")
	{
		alert("News title should not be empty..");
		document.publishnewsform.newstitle.focus();
		return false;
	}
	else if(document.publishnewsform.newstype.value=="")
	{
		alert("Newstype should not be empty..");
		document.publishnewsform.newstype.focus();
		return false;
	}
	else if(document.publishnewsform.publishdate.value=="")
	{
		alert("Publish date should not be empty..");
		document.publishnewsform.publishdate.focus();
		return false;
	}
	else if(document.publishnewsform.newscontent.value=="")
	{
		alert("News content should not be empty..");
		document.publishnewsform.newscontent.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>