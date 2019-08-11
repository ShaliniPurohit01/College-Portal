<?php
include("header.php");

if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("dbconnection.php");
if(isset($_GET["delid"]))
{
	$sql="DELETE FROM admission WHERE admission_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Admission form record deleted successfully...');</script>";
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
        <h1>View Admission records</h1>

<table width="613" border="1">
  <tr>
    <th scope="col">Roll No</th>
    <th scope="col">Student name</th>
    <th scope="col">Course</th>
    <th scope="col">Start date</th>
     <th scope="col">End date</th>   
    <th scope="col">Admission fee</th>
       <th scope="col">Note</th>
    <th scope="col">Stauts</th>
    <th scope="col">Action</th>
  </tr>
  <?php
  $sql="SELECT * FROM admission";
  $qsql= mysqli_query($con,$sql);
  while($rs = mysqli_fetch_array($qsql))
  {

	      $sqlcourse="SELECT * FROM course where course_id='$rs[course_id]'";
		  $qsqlcourse= mysqli_query($con,$sqlcourse);
		  $rscourse = mysqli_fetch_array($qsqlcourse);
		  
	      $sqladmission="SELECT * FROM applicationform where
		  applicationnumber='$rs[admission_id]'";
		  $qsqladmission= mysqli_query($con,$sqladmission);
		  $rsadmission = mysqli_fetch_array($qsqladmission);
  ?>
  <tr>
  <td>&nbsp;<?php echo $rs["admission_id"] ; ?></td>
  <td>&nbsp;<?php echo $rsadmission["firstname"] . " " . $rsadmission["lastname"]; ?></td>
    <td>&nbsp;<?php echo $rscourse["coursename"]; ?></td>
    <td>&nbsp;<?php echo $rs["start_date"]; ?></td>
    <td>&nbsp;<?php echo $rs["end_date"]; ?></td>
    <td>&nbsp;<?php echo $rs["admission_fee"]; ?></td>
    <td>&nbsp;<?php echo $rs["note"]; ?></td>
    <td>&nbsp;<?php echo $rs["status"]; ?></td>
    <td>&nbsp;<a href="newadmission.php?editid=<?php echo $rs["admission_id"]; ?>">Edit</a> | 
	<a href="viewadmission.php?delid=<?php echo $rs["admission_id"]; ?>">Delete</a></td>
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