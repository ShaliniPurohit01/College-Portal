<?php
include("header.php");

if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("dbconnection.php");
if(isset($_GET["delid"]))
{
	$sql="DELETE FROM result WHERE result_id='".$_GET["delid"]."'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Result form record deleted successfully...');</script>";
	}
}
if(isset($_POST["PublishResult"]))
{
	$sql="INSERT INTO result(applicationnumber, result, status) VALUES ('$_POST[studentid]','$_POST[result]','Active')";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Result form record inserted successfully...');</script>";
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
         <h1>Add Result</h1>
<form method="post" action="" onsubmit="validateform()" name="form1">
<table width="200" border="1">
  <tr>
    <th scope="row">&nbsp;Student Name</th>
    <td>&nbsp;
    <select name="studentid">
    <option value="">Select Student</option>
    <?php
	$sql ="SELECT * FROM applicationform";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<option value='$rs[applicationnumber]'>$rs[firstname] $rs[lastname]</option>";
	}
	?>
    </select>
    </td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Result</th>
    <td>&nbsp;<textarea name="result"></textarea></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;<input type="submit" name="PublishResult" /></td>
  </tr>
</table>
</form>
<hr />
<h1>View Result</h1>

<table width="613" border="1">
  <tr>
    <th scope="col">Admission no</th>
    <th scope="col">Result</th>
    <th scope="col">Status</th>
    <th scope="col">Action</th>
  </tr>
 <?php
  $sql="SELECT * FROM result";
  $qsql= mysqli_query($con,$sql);
while($rs=mysqli_fetch_array($qsql))
 {
   ?>
    
    <tr>
    <td>&nbsp;<?php echo $rs["applicationnumber"]; ?></td>
    <td>&nbsp;<?php echo $rs["result"]; ?></td>
    <td>&nbsp;<?php echo $rs["status"]; ?></td>
    <td>&nbsp;<a href="viewresult.php?delid=<?php echo $rs["result_id"]; ?>">Delete</a></td>
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
<script type="application/javascript">
function validateform()
{
	if(document.form1.studentid.value=="")
	{
		alert("Kindly select the student");
		return false;
	}
	else if(document.form1.result.value=="")
	{
		alert("Result should not be empty..");
		return true;
	}
	else
	{
		return true;
	}
}
</script>