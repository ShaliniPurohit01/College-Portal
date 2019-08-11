<?php
//session_start();
include("header.php");
if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
//include("header.php");
include("dbconnection.php");
if(isset($_POST["submit"]))
{ 
$syllabustitle = mysqli_real_escape_string($con,$_POST["syllabustitle"]);
$syllabuscontents = mysqli_real_escape_string($con,$_POST["syllabuscontent"]);
	$sql="INSERT INTO syllabus (subject_id,syllabustitle,syllabuscontents,status) VALUES('$_POST[subject]','$syllabustitle','$syllabuscontents','Active')";
	if(!$qsql=mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}
	else
	{
		echo "<script>alert('New syllabus record inserted sucessfully..');</script>";
	}
}
if(isset($_GET["editid"]))
{
	$sql ="SELECT * FROM  syllabus where syllabus_id='$_GET[editid]'";
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
                <h1><a href="viewSyllabus.php">View Syllabus</a> | <a href="Syllabus.php">Add Syllabus</a></h1>
        <h1>Syllabus</h1>
        <form method="post" action="">
        <table width="200" border="1">
  <tr>
    <td width="24%">Subject</td>
    <td width="76%">
    <select name="subject" id="subject" onsubmit="return validateform()">
    <option value="">Select</option>
       <?php
	$sql = "SELECT * FROM subject";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<option value='$rs[subject_id]'>$rs[subjectcode] - $rs[subject_name]</option>";
	}
	?>
    </select></td>
  </tr>
  <tr>
    <td>Syllabus Title</td>
    <td><input type="text" value="<?php echo $rs["syllabustitle"]; ?>" name="syllabustitle" id="syllabustitle"  style="width:100%;height:20px;"></td>
  </tr>
  <tr>
    <td>Syllabus Content</td>
    <td><textarea name="syllabuscontent" id="syllabuscontent" style="width:100%;height:60px;"><?php echo $rs["syllabuscontents"];?></textarea></td>
  </tr>
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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
?>
<script type="application/javascript">
function validateform()
{
	if(document.syllabusform.syllabustitle.value=="")
	{
		alert("Syllabus title  should not be empty..");
		document.syllabusform.syllabustitle.focus();
		return false;
	}
	else if(document.syllabusform.syllabuscontent.value=="")
	{
		alert("Syllabus content should not be empty..");
		document.syllabusform.syllabuscontent.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>