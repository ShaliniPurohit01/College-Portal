<?php

include("header.php");
if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("dbconnection.php");
if(isset($_POST["submit"]))
{
	$sql="INSERT INTO course(`coursename`, `coursetype`, `description`, `status`) 
	VALUES ('$_POST[coursename]','$_POST[coursetype2]','$_POST[description]','Active')";
	if(!$qsql=mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}
	else
	{
		echo "<script>alert('new course  inserted successfully..');</script>";
	}
}

if(isset($_GET["editid"]))
{
	$sql ="SELECT * FROM  COURSE where course_id='".$_GET["editid"]."'";
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
        <h1>New course</h1>
        <p>&nbsp;
<form method="post" action="" onsubmit="return validateform()">
        <table width="200" border="1">
  <tr>
    <td width="24%">Course Name
   </td>
    <td width="76%"><input type="text"   value="<?php  if(isset($_REQUEST["editid"])) echo $rs["coursename"]; ?>" 
	name="coursename" id="coursename"></td>
  </tr>
   
  <tr>
    <td>Course Abbrevation</td>
    <td>
<input type="text"   value="<?php  if(isset($_REQUEST["editid"])) echo $rs["coursetype"]; ?>" name="coursetype2" 
	id="coursetype2">
    </td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="description" id="description"><?php  if(isset($_REQUEST["editid"])) echo $rs["description"];?> </textarea></td>
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
	if(document.newcourseform.coursename.value=="")
	{
		alert("Cours ename  should not be empty..");
		document.newcourseform.coursename.focus();
		return false;
	}
	else if(document.newcourseform.description.value=="")
	{
		alert("Description should not be empty..");
		document.newcourseform.description.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>