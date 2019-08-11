<?php
include("header.php");
if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("dbconnection.php");
if(isset($_POST["submit"]))
{
$sql="INSERT INTO subject (subject_name,subjectcode,course_id,semester,description,status) VALUES('$_POST[subject]','$_POST[subjectcode]','$_POST[course]','$_POST[semister]','$_POST[description]','Active')";
if(!$qsql=mysqli_query($con,$sql))
{
	echo mysqli_error($con);
}
else
{
	echo "<script>alert('subject inserted sucessfully..');</script>";
}
}
if(isset($_GET["editid"]))
{
	$sql ="SELECT * FROM  subject where subject_id='".$_GET["editid"]."'";
	$qsql = mysqli_query($con,$sql);
		$rs= mysqli_fetch_row($qsql);
		
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
        <h1><a href="viewsubject.php">View Subject</a> | <a href="Subject.php">Add Subject</a></h1>
        <h1>Subject</h1>
        <p>&nbsp;
        <form method="post" action=""  onsubmit="return validateform()">
        <table width="200" border="1">
  <tr>
    <td width="24%" height="34">Course</td>
    <td width="76%">
    <select name="course" id="course">
    <option value="">Select</option>
    <?php
	$sql = "SELECT * FROM course";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<option value='$rs[course_id]'>$rs[coursename]</option>";
	}
	?>
    </select></td>
  </tr>
  <tr>
    <td height="38">Subject</td>
    <td><input type="text"  value="<?php if(isset($_REQUEST["editid"]))  
		echo $rs["subject_name"]; ?>" name="subject" id="subject"></td>
  </tr>
    <tr>
    <td height="38">Subject code</td>
    <td><input type="text"  value="<?php echo $rs["subjectcode"]; ?>" name="subjectcode" id="subjectcode"></td>
  </tr>
  <tr>
    <td height="35">Semester</td>
    <td><select name="semister" id="semister">
    <option value="">Select</option>
    <?php
	$arr = array("1st Semester","2nd Semester","3rd Semester","4th Semester","5th Semester","6th Semester");
	foreach($arr as $val)
	{
	echo "<option value='$val'>$val</option>";
	}
	?>
    </select></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="description" id="description"> <?php echo $rs["description"];?></textarea></td>
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
	if(document.subjectform.subject.value=="")
	{
		alert("Subject  should not be empty..");
		document.subjectform.subject.focus();
		return false;
	}
	if(document.subjectform.semister.value=="")
	{
		alert("Semister should not be empty..");
		document.subjectform.semister.focus();
		return false;
	}
	else if(document.subjectform.description.value=="")
	{
		alert("Description should not be empty..");
		document.subjectform.description.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>