<?php
include("header.php");
//1. Database connection
include("dbconnection.php");
//2. Check submit button pressed or not
if(isset($_POST["submit"]))
{
//3. Insert statement	
$sql="INSERT   INTO  admission (course_id,start_date,end_date,admission_fee,note,status) VALUES('$_POST[courseid]','$_POST[startdate]','$_POST[enddate]','$_POST[admissionfee]','$_POST[note]','Active')";
//4. Query
	if(!$qsql=mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}
	else
	{
		echo "<script>alert('Admission record inserted successfully..');</script>";
	}
}
if(isset($_GET["editid"]))
{
	$sql ="SELECT * FROM  admission where admission_id='$_GET[editid]'";
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
        <h1>New admission</h1>
        <p>&nbsp;
        <form method="post" action="">
        <table width="200" border="1">
  <tr>
    <td width="24%">Course</td>
    <td width="76%">
      <select name="courseid" id="courseid">
       <option value="">Select</option>
    <?php
	$sql = "SELECT * FROM course";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<option value='$rs[course_id]'>$rs[coursename]</option>";
	}
	?>
    </select>
      </select></td>
  </tr>
  
  <tr>
    <td>Start date</td>
    <td><input type="date" value="<?php echo $rs["start_date"]; ?>" name="startdate" id="startdate"></td>
  </tr>
  <tr>
    <td>End date</td>
    <td><input type="date" value="<?php echo $rs["end_date"]; ?>" name="enddate" id="enddate"></td>
  </tr>
  <tr>
    <td>Admission Fees</td>
    <td><input type="text" value="<?php echo $rs["admission_fee"]; ?>" name="admissionfee" id="admissionfee"></td>
  </tr>
  <tr>
    <td>Note</td>
    <td><textarea name="note" id="note"> <?php echo $rs["note"];?> </textarea></td>
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