<?php
include("header.php");
if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("dbconnection.php");
if(isset($_GET["delid"]))
{
	$sql="DELETE FROM subject WHERE subject_id='".$_GET["delid"]."'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Subject form record deleted successfully...');</script>";
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
        <h1><a href="viewsubject.php">View Subject</a> | <a href="Subject.php">Add Subject</a></h1>
        <h1>View Subject</h1>

<table width="613" border="1">
  <tr>
    <th scope="col">Subject name</th>
    <th scope="col">Course id</th>
    <th scope="col">Semister</th>
    <th scope="col">Description</th>
    <th scope="col">Stauts</th>
    <th scope="col">Action</th>
  </tr>
   <?php
  $sql="SELECT * FROM subject";
  $qsql= mysqli_query($con,$sql);
while($rs=mysqli_fetch_array($qsql))
 {
    $sqlcourse_id ="SELECT * FROM course where course_id='$rs[course_id]'";
    $qsqlcourse_id = mysqli_query($con,$sqlcourse_id);
    $rscourse_id = mysqli_fetch_array($qsqlcourse_id);
     ?>
  <tr>
    <td>&nbsp;<?php echo $rs["subject_name"]; ?></td>
    <td>&nbsp;<?php echo $rscourse_id["coursename"] . " ". $rscourse_id["coursetype"]; ?></td>
    <td>&nbsp;<?php echo $rs["semester"]; ?></td>
    <td>&nbsp;<?php echo $rs["description"]; ?></td>
    <td>&nbsp;<?php echo $rs["status"]; ?></td>
    <td>&nbsp;<a href="Subject.php?editid=<?php echo $rs["subject_id"]; ?>">Edit</a> | 
	<a href="viewsubject.php?delid=<?php echo $rs["subject_id"]; ?>">Delete</a></td>
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