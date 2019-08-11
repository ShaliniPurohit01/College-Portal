<?php
//session_start();
include("header.php");
include("dbconnection.php");
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
<div id="content" class="two_third first"> 
          <!-- ################################################################################################ -->
          <h1>Search Result</h1>
<strong>Enter Roll Number to Search result</strong><br />

<?php
if(isset($_POST["submit"]))
{
	$sqlresult ="SELECT * FROM result WHERE applicationnumber='$_POST[rollno]'";
	$qsqlresult = mysqli_query($con,$sqlresult);
	$rsresult = mysqli_fetch_array($qsqlresult);
	
	$sqlapplicationform ="SELECT * FROM applicationform WHERE applicationnumber='$_POST[rollno]'";
	$qsqlapplicationform = mysqli_query($con,$sqlapplicationform);
	$rsapplicationform = mysqli_fetch_array($qsqlapplicationform);
?>
<table width="200" border="1">
  <tr>
    <th scope="row">&nbsp;Roll Number :</th>
    <td>&nbsp;<?php echo $_POST["rollno"]; ?></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Student Name:</th>
    <td>&nbsp;<?php echo $rsapplicationform["firstname"] . " ". $rsapplicationform["lastname"]; ?></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Result</th>
    <td>&nbsp;<?php echo $rsresult["result"]; ?></td>
  </tr>
</table>
<?php
}
else
{
?>
<form method="post" action="" name="form1" onsubmit="return validateform()">
<table width="200" border="1">
  <tr>
    <th scope="row">&nbsp;Roll Number :</th>
    <td>&nbsp;<input name="rollno" type="text" width="50" /></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;<input name="submit" type="submit" /></td>
  </tr>
</table>
</form>
<?php
}
?>
          <!-- ################################################################################################ --> 
        </div>
        <!-- / Middle Column --> 
        <!-- Right Column -->
      <div class="sidebar one_third"> 
          <!-- ################################################################################################ -->
          <div class="sdb_holder">
            <h6>Quick Information</h6>
            <ul class="nospace quickinfo">
              <li class="clear"><a href="applicationform.php"><img src="images/onlineadmission.jpg" style="width:80px;height:80px;" > Online Admission Form</a></li>
              <li class="clear"><a href="gallery.php"><img src="images/gallery.jpg" alt="" style="width:80px;height:80px;"> View Photo Gallery</a></li>
              <li class="clear"><a href="news.php"><img src="images/newsevents.jpg" alt="" style="width:80px;height:80px;"> View News and events</a></li>
              <li class="clear"><a href="courselist.php"><img src="images/course.jpg" alt="" style="width:80px;height:80px;"> View course details</a></li>
              <li class="clear"><a href="viewallresult.php"><img src="images/result.jpg" alt="" style="width:80px;height:80px;"> Result</a></li>
              <li class="clear"><a href="contact.php"><img src="images/contact.jpg" alt="" style="width:80px;height:80px;"> Contact us</a></li>
            </ul>
          </div>                             
          <!-- ################################################################################################ --> 
        </div>
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
<script type="application/javascript">
function validateform()
{
	if(document.form1.rollno.value== "")
	{
		alert("Roll Number should not be empty..");
		return false;
	}
	else
	{
		return true();
	}
}
</script>