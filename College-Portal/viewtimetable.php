<?php
include("header.php");
if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("dbconnection.php");

if(isset($_GET["delid"]))
{
	$sql="DELETE FROM time_table WHERE timetable_id='".$_GET["delid"]."'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Timetable form record deleted successfully...');</script>";
	}
}

if(isset($_GET["btnadd"]))
{
	$sql ="INSERT INTO time_table(course_id, subject_id, semister, week_day, time, status) VALUES ('$_GET[courseid]','$_GET[subject]','$_GET[semester]','$_GET[day]','$_GET[time]','Active')";
	if(!$qsql = mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}
	echo "<script>alert('New Time table record inserted succcessfully..');</script>";
}
?>
<!-- ############################################################################################### --> 
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
        <h1>View Time Table</h1>
        <form method="get" action="">
<table width="200" border="1">
  <tr>
    <th scope="row">&nbsp;Course :</th>
    <td>&nbsp;
<select name="courseid">
<option value="">Select</option>
<?php
$sqlsubject = "SELECT * FROM  course ";
$qsqlsubject = mysqli_query($con,$sqlsubject);
while($rssubject = mysqli_fetch_array($qsqlsubject))
{
	if($_GET[course] == $rssubject[course_id] )
	{
  echo "<option value='$rssubject[course_id]' selected>$rssubject[coursename]</option>";
	}
	else if($_GET[courseid] == $rssubject[course_id] )
	{
  echo "<option value='$rssubject[course_id]' selected>$rssubject[coursename]</option>";
	}
	else
	{
  echo "<option value='$rssubject[course_id]'>$rssubject[coursename]</option>";  
	}
}
?>
</select></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Semester :</th>
    <td>&nbsp;
    <select name="semester" onchange="loadform(courseid.value,semester.value)">
    <?php
	$arr = array("Select","1st Semester","2nd Semester","3rd Semester","4th Semester","5th Semester","6th Semester");
	foreach($arr as $val)
	{
		if($val == $_GET[semester])
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
</table>
<table width="200" border="1">
  <tr>
    <th scope="row">&nbsp;Day</th>
    <td>&nbsp;
    <select name="day">
    <option value="">Select</option>
    <?php
	$arrdays = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	foreach($arrdays as $val)
	{
		echo "<option value='$val'>$val</option>";
	}
	?>
    </select>
    </td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Subject</th>
    <td>&nbsp;
        <select name="subject">
    <option value="">Select</option>
    <?php
	$sqlcourse = "SELECT * FROM subject WHERE status='Active'";
	$qsqlcourse = mysqli_query($con,$sqlcourse);
	while($rs = mysqli_fetch_array($qsqlcourse))
	{
		echo "<option value='$rs[subject_id]'>$rs[subjectcode] - $rs[subject_name]</option>";
	}
	?>
    </select>
    </td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Time</th>
    <td>&nbsp;
        <select name="time">
    <option value="">Select</option>
    <?php
	$arrtime = array("9.00 AM - 10.00 AM","10.05 AM - 11.00 AM","11.05 AM - 12.00 PM","12.05 PM - 01.00 PM","02.05 PM - 03.00 PM","03.05 PM - 04.00 PM","04.05 PM - 05.00 PM");
	foreach($arrtime as $val)
	{
		echo "<option value='$val'>$val</option>";
	}
	?>
    </select>
    </td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;
		<input type="submit" value="Add Time Table" name="btnadd" />
    </td>
  </tr>
</table>
</form>
<!-- ################################################################################################ --> 
      </div>
      <!-- ################################################################################################ --> 
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ --> 
<?php
include("footer.php");
?>
<script type="application/javascript">
function loadform(course,semester)
{
	var lnk = "viewtimetable.php?course="+course+"&semester="+semester;
	window.location.assign(lnk);
}
</script>