<?php
include("header.php");

if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("dbconnection.php");
if(isset($_GET["delid"]))
{
	$sql="DELETE FROM staff WHERE staff_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Staff form record deleted successfully...');</script>";
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
        <h1><a href="staff.php"><strong>Add Staff</strong></a> | <strong><a href="viewstaff.php">View staff</a></strong></h1>
        <h1>View staff</h1>
<div style='overflow:auto; width:700px;height:400px;'>
<table width="1190" border="1">
  <tr>
    <th width="84" scope="col">Name</th>
    <th width="111" scope="col">Login ID</th>
    <th width="129" scope="col">Password</th>
    <th width="139" scope="col">Staff Type</th>
    <th width="163" scope="col">Designation</th>
    <th width="111" scope="col">Address</th>
    <th width="147" scope="col">Contact no</th>
    <th width="95" scope="col">Status</th>
    <th width="143" scope="col">Action</th>
  </tr>
 <?php
  $sql="SELECT * FROM staff";
  $qsql= mysqli_query($con,$sql);
while($rs=mysqli_fetch_array($qsql))
 {
    ?>
  <tr>
    <td>&nbsp;<?php echo $rs["name"]; ?></td>
    <td>&nbsp;<?php echo $rs["login_id"]; ?></td>
    <td>&nbsp;<?php echo $rs["password"]; ?></td>
    <td>&nbsp;<?php echo $rs["staff_type"]; ?></td>
    <td>&nbsp;<?php echo $rs["designtion"]; ?></td>
    <td>&nbsp;<?php echo $rs["address"]; ?></td>
    <td>&nbsp;<?php echo $rs["contact_no"]; ?></td>
    <td>&nbsp;<?php echo $rs["status"]; ?></td>
   <td>&nbsp;<a href="staff.php?editid=<?php echo $rs["staff_id"]; ?>">Edit</a> |
   <a href="viewstaff.php?delid=<?php echo $rs["staff_id"]; ?>">Delete</a></td>
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