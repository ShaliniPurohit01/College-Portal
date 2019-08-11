<?php
include("header.php");

if(!isset($_SESSION["staffid"]))
{
	header("Location: login.php");
}
include("dbconnection.php");
if(isset($_GET["delid"]))
{
	$sql="DELETE FROM applicationform WHERE applicationnumber='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);	
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Appplicaton form record deleted successfully...');</script>";
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
        <h1>View Application</h1>
<div style='overflow:auto; width:700px;height:400px;'>
<table width="613" border="1">
  <tr>
    <th scope="col">Registration date</th>
    <th scope="col">Admission number</th>
    <th scope="col">admissiondate</th>
    <th scope="col">course_id</th>
    <th scope="col">semester</th>
    <th scope="col"> Name </th>
    <th scope="col">dob</th>
    <th scope="col">bloodgroup</th>
    <th scope="col">gender</th>
    <th scope="col">placeofbirth</th>
    <th scope="col">parentsinfo</th>
    <th scope="col">father</th>
    <th scope="col">mother</th>
    <th scope="col">fathersoccupation</th>
    <th scope="col">mothersoccupation</th>
    <th scope="col">cont_address</th>
    <th scope="col">state</th>
    <th scope="col">district</th>
    <th scope="col">taluk</th>
    <th scope="col">citytown</th>
    <th scope="col">country</th>
    <th scope="col">pincode</th>
    <th scope="col">mobileno</th>
    <th scope="col">emailid</th>
    <th scope="col">alternatecontact</th>
    <th scope="col">religion</th>
    <th scope="col">studcategory</th>
    <th scope="col">mothertongue</th>
    <th scope="col">nationality</th>
    <th scope="col">paidfee</th>
    <th scope="col">status</th>
    <th scope="col">Action</th>    
  </tr>
   <?php
  $sql="SELECT * FROM applicationform";
  $qsql= mysqli_query($con,$sql);
 while($rs=mysqli_fetch_array($qsql))
 {
   ?>
  <tr>
    <td>&nbsp;<?php echo $rs["regndate"]; ?></td>
    <td>&nbsp;<?php echo $rs["admissionnumber"]; ?></td>
    <td>&nbsp;<?php echo $rs["admissiondate"]; ?></td>
    <td>&nbsp;<?php echo $rs["course_id"]; ?></td>
    <td>&nbsp;<?php echo $rs["semester"]; ?></td>
    <td>&nbsp;<?php echo $rs["firstname"]; ?>&nbsp;<?php echo $rs["lastname"]; ?></td>
    <td>&nbsp;<?php echo $rs["dob"]; ?></td>
     <td>&nbsp;<?php echo $rs["bloodgroup"]; ?></td>
    <td>&nbsp;<?php echo $rs["gender"]; ?></td>
    <td>&nbsp;<?php echo $rs["placeofbirth"]; ?></td>
    <td>&nbsp;<?php echo $rs["parentsinfo"]; ?></td>
    <td>&nbsp;<?php echo $rs["father"]; ?></td>
    <td>&nbsp;<?php echo $rs["mother"] ?></td>
    <td>&nbsp;<?php echo $rs["fathersoccupation"]; ?></td>
    <td>&nbsp;<?php echo $rs["mothersoccupation"]; ?></td>
    <td>&nbsp;<?php echo $rs["cont_address"]; ?></td>
    <td>&nbsp;<?php echo $rs["state"]; ?></td>
    <td>&nbsp;<?php echo $rs["district"]; ?></td>
    <td>&nbsp;<?php echo $rs["taluk"]; ?></td>
    <td>&nbsp;<?php echo $rs["citytown"]; ?></td>
    <td>&nbsp;<?php echo $rs["country"]; ?></td>
    <td>&nbsp;<?php echo $rs["pincode"]; ?></td>
    <td>&nbsp;<?php echo $rs["mobileno"]; ?></td>
    <td>&nbsp;<?php echo $rs["emailid"]; ?></td>
    <td>&nbsp;<?php echo $rs["alternatecontact"]; ?></td>
    <td>&nbsp;<?php echo $rs["religion"]; ?></td>
    <td>&nbsp;<?php echo $rs["studcategory"]; ?></td>
    <td>&nbsp;<?php echo $rs["mothertongue"]; ?></td>
    <td>&nbsp;<?php echo $rs["nationality"]; ?></td>
    <td>&nbsp;<?php echo $rs["paidfee"]; ?></td>
    <td>&nbsp;<?php echo $rs["status"]; ?></td>
   <td>&nbsp;<a href="newadmission.php?editid=<?php echo $rs["applicationnumber"]; ?>">Edit</a> | <a href="viewapplication.php?delid=<?php echo $rs[applicationnumber]; ?>">Delete</a></td>
  </tr>
<?php
 }
 ?>
</table>
</div>
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