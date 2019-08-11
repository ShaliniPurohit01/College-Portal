<?php
//session_start();
include("header.php");
include("dbconnection.php");
if(isset($_GET["delid"]))
{
$sqltime_table = "DELETE FROM time_table WHERE timetable_id='$_GET[delid]'";
$qsqltime_table = mysqli_query($con,$sqltime_table);
echo "<script>alert('Time table record deleted successfully...');</script>";
}
?>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="group btmspace-30"> 
        <!-- Middle Column -->
    <main class="container clear"> 
          <!-- ################################################################################################ -->
        <h1>View Time Table</h1>        
<form id="form1" name="form1" method="get" action="" >
<table width="239" border="1">
  <tr>
    <th width="72" scope="row">&nbsp;Course</th>
    <td width="73">&nbsp;
    <select name="course">
    <option value="">Select</option>
    <?php
	$sql = "SELECT * FROM course where status='Active'";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		if($rs[course_id] == $_GET[course])
		{
		echo "<option selected value='$rs[course_id]'>$rs[coursename] - $rs[coursetype]</option>";
		}
		else
		{
		echo "<option value='$rs[course_id]'>$rs[coursename] - $rs[coursetype]</option>";
		}
	}
	?>
    </select>
    </td>
    <td width="72" rowspan="2"><br />

      <input type="submit" name="btnsearch" id="btnsearch" value="Search Time Table" />
    </td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Semester</th>
    <td>&nbsp;
      <select name="semester">
        <?php
	$arr = array("Select","1st Semester","2nd Semester","3rd Semester","4th Semester","5th Semester","6th Semester");
	foreach($arr as $val)
	{
		if($val == $_GET["semester"])
		{
		echo "<option selected value='$val'>$val</option>";
		}
		else
		{
		echo "<option value='$val'>$val</option>";
		}
	}
	?>
        </select>
    </td>
    </tr>
</table>
</form>

<?php
if(isset($_GET["btnsearch"]))
{
?>
<table width="2421" border="1" style="border:#000;">
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;9.00 AM - 10.00 AM</th>
    <th scope="col">&nbsp;10.05 AM - 11.00 AM</th>
    <th scope="col">11.05 AM - 12.00 PM</th>
    <th scope="col">12.05 PM - 01.00 PM</th>
    <th rowspan="7" scope="col">&nbsp;</th>
    <th scope="col">02.00 PM - 3.00 PM</th>
    <th scope="col">03.05 PM - 04.00 PM</th>
    <th scope="col">04.05 PM - 05.00 PM</th>
  </tr>
  <tr>
    <th scope="row">Mon <?php $day ="Monday"; ?></th>
    <td>&nbsp;<?php
	$time="9.00 AM - 10.00 AM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="10.05 AM - 11.00 AM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="11.05 AM - 12.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="12.05 PM - 01.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="02.05 PM - 03.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="03.05 PM - 04.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="04.05 PM - 05.00 PM";
	include("includetimetable.php");
	?></td>
  </tr>
  <tr>
    <th scope="row">Tue <?php $day ="Tuesday"; ?></th>
    <td>&nbsp;<?php
	$time="9.00 AM - 10.00 AM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="10.05 AM - 11.00 AM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="11.05 AM - 12.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="12.05 PM - 01.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="02.05 PM - 03.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="03.05 PM - 04.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="04.05 PM - 05.00 PM";
	include("includetimetable.php");
	?></td>
  </tr>
  <tr>
    <th scope="row">Wed <?php $day ="Wednesday"; ?></th>
    <td>&nbsp;<?php
	$time="9.00 AM - 10.00 AM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="10.05 AM - 11.00 AM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="11.05 AM - 12.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="12.05 PM - 01.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="02.05 PM - 03.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="03.05 PM - 04.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="04.05 PM - 05.00 PM";
	include("includetimetable.php");
	?></td>
  </tr>
  <tr>
    <th scope="row">Thu <?php $day ="Thursday"; ?></th>
    <td>&nbsp;<?php
	$time="9.00 AM - 10.00 AM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="10.05 AM - 11.00 AM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="11.05 AM - 12.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="12.05 PM - 01.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="02.05 PM - 03.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="03.05 PM - 04.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="04.05 PM - 05.00 PM";
	include("includetimetable.php");
	?></td>
  </tr>
  <tr>
    <th scope="row">Fri <?php $day ="Friday"; ?></th>
    <td>&nbsp;<?php
	$time="9.00 AM - 10.00 AM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="10.05 AM - 11.00 AM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="11.05 AM - 12.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="12.05 PM - 01.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="02.05 PM - 03.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="03.05 PM - 04.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="04.05 PM - 05.00 PM";
	include("includetimetable.php");
	?></td>
  </tr>
  <tr>
    <th height="26" scope="row">Sat <?php $day ="Saturday"; ?></th>
    <td>&nbsp;<?php
	$time="9.00 AM - 10.00 AM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="10.05 AM - 11.00 AM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="11.05 AM - 12.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="12.05 PM - 01.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="02.05 PM - 03.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="03.05 PM - 04.00 PM";
	include("includetimetable.php");
	?></td>
    <td>&nbsp;<?php
	$time="04.05 PM - 05.00 PM";
	include("includetimetable.php");
	?></td>
  </tr>
</table>
<?php
}
?>
        <!-- / Right Column --> 
</div>
      <!-- ################################################################################################ --> 
           <!-- ################################################################################################ --> 
    </main>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<?php
include("footer.php");
?>