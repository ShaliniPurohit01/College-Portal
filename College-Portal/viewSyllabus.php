<?php
include("header.php");
//session_start();
if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
//include("header.php");
include("dbconnection.php");
if(isset($_GET["delid"]))
{
	$sql="DELETE FROM syllabus WHERE syllabus_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Syllabus form record deleted successfully...');</script>";
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
        <h1><a href="viewSyllabus.php">View Syllabus</a> | <a href="Syllabus.php">Add Syllabus</a></h1>
        <h1>View Syllabus</h1>

<table width="703" border="1">
  <tr>
    <th scope="col">syllabustitle</th>
    <th scope="col">syllabuscontents</th>
       <th scope="col">Stauts</th>
    <th scope="col">Action</th>
  </tr>
   <?php
  $sql="SELECT * FROM syllabus";
  $qsql= mysqli_query($con,$sql);
while($rs=mysqli_fetch_array($qsql))
 {
    ?>
  <tr>
    <td>&nbsp;<?php echo $rs["syllabustitle"]; ?></td>
    <td>&nbsp;<?php echo $rs["syllabuscontents"]; ?></td>
    <td>&nbsp;<?php echo $rs["status"]; ?></td>
    <td>&nbsp;<a href="Syllabus.php?editid=<?php echo $rs["syllabus_id"]; ?>">Edit</a> |
	<a href="viewSyllabus.php?delid=<?php echo $rs["syllabus_id"]; ?>">Delete</a></td>
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