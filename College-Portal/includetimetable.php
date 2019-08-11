<?php
$sqltime_table = "SELECT * FROM time_table WHERE status='Active' AND course_id='$_GET[course]' AND semister='$_GET[semester]' AND week_day='$day' AND time='$time'";
$qsqltime_table = mysqli_query($con,$sqltime_table);
$rstime_table = mysqli_fetch_array($qsqltime_table);

$sqltime_tablesubject = "SELECT * FROM subject WHERE subject_id='$rstime_table[subject_id]'";
$qsqltime_tablesubject = mysqli_query($con,$sqltime_tablesubject);
$rstime_tablesubject = mysqli_fetch_array($qsqltime_tablesubject);
echo $subname = $rstime_tablesubject["subjectcode"] . "-". $rstime_tablesubject["subject_name"];
$subname= "";
if(isset($_SESSION["staffid"]) && $rstime_table["subject_id"] != "")
{
echo "<br /><a href='timetable.php?delid=$rstime_table[0]&course=$_GET[course]&btnsearch=Search+Time+Table&semester=$_GET[semester]'>Delete</a>";
}
?>