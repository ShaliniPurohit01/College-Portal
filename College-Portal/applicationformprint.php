<?php
include("header.php");
include("dbconnection.php");
$sql = "SELECT * FROM  applicationform WHERE applicationnumber='$_GET[applicationid]'";
if(!$qsql=mysqli_query($con,$sql))
{
	echo mysqli_error($con);
}
$rsprint = mysqli_fetch_array($qsql);
?>
<form method="post" action="" name="appform" onsubmit="return validateform()">
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
     <center><font size="+3">ONLINE ADMISSION FORM</font></center>
      <p>Date: <?php echo date("d-m-Y"); ?></p>
      <p>Kindly fill the following application form with valid records...</p>
      <!-- ################################################################################################ --> 
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- section 3 --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <div class="container clear"> 
      <!-- section content --> 
      <!-- ################################################################################################ -->
      <table width="200" border="1">
  <tr style="background-color:#FFC">
    <td colspan="4"><strong>Basic details:</strong></td>
    </tr>
<?php
if(isset($_GET[appid]))
{
?>  
  <tr style="background-color:#CFF">
    <td width="19%">Registration Date:</td>
    <td width="31%"><input type="date" name="regdate" id="regdate"></td>
    <td width="19%">Admission Number:</td>
    <td width="31%"><input type="text" name="admissionno" id="admissionno"></td>
  </tr>
  <tr style="background-color:#CFF">
    <td height="30">Appication No.</td>
    <td id="Application no"><input type="text" name="applicationno" id="applicationno"></td>
    <td>Admission Date:</td>
    <td><input type="text" name="admissiondate" id="admissiondate"></td>
  </tr>
<?php
}
?>  
  <tr style="background-color:#CFF">
    <td height="30">Course:</td>
    <td>
    <?php
		$sqlcourse = "SELECT * FROM course where course_id='$rsprint[course_id]'";
		$qsqlcourse = mysqli_query($con,$sqlcourse);
		$rscourse = mysqli_fetch_array($qsqlcourse);
		echo $rscourse[coursename];
	?>
    </td>
    <td>Semester</td>
    <td>
    <?php echo  $rsprint[semester]; ?>
    </td>
  </tr>
      </table>

      <!-- ################################################################################################ --> 
      <!-- / section content -->
      <div class="clear">
        <table width="200" height="326">
          <tr style="background-color:#FFC">
            <td height="36" colspan="4"><strong>Student details:</strong></td>
          </tr>
          <tr style="background-color:#CFF">
            <td width="27%" height="40">First name:</td>
            <td width="24%" id="firstname">    <?php echo  $rsprint[firstname]; ?></td>
            <td width="26%">DOB (dd/mm/yyy)</td>
            <td width="23%">    <?php echo  $rsprint[dob]; ?></td>
          </tr>
          <tr style="background-color:#CFF">
            <td height="43">Last name:</td>
            <td>    <?php echo  $rsprint[lastname]; ?></td>
            <td>Blood group:</td>
            <td>    <?php echo  $rsprint[bloodgroup]; ?></td>
          </tr>
          <tr style="background-color:#CFF">
            <td height="30">Student Gender:</td>
            <td><?php echo  $rsprint[gender]; ?></td>
            <td>Place of Birth:</td>
            <td><?php echo  $rsprint[placeofbirth]; ?></td>
          </tr>
          <tr style="background-color:#CFF">
            <td height="30">Parent's information:</td>
            <td><?php echo  $rsprint[parentsinfo]; ?></td>
            <td>Father's Occupation:</td>
            <td><?php echo  $rsprint[fathersoccupation]; ?></td>
          </tr> 
          <tr style="background-color:#CFF">
            <td height="39">Father name:</td>
            <td><?php echo  $rsprint[father]; ?></td>
            <td>Mother Name:</td>
            <td><?php echo  $rsprint[mother]; ?></td>
          </tr>
          <tr style="background-color:#CFF">
            <td height="43">Mother's Occupation:</td>
            <td>
               <?php echo  $rsprint[mothersoccupation]; ?>
             </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      <table width="200" border="1">
        <tr style="background-color:#FFC">
          <td colspan="4"><strong>Contact Details:</strong></td>
        </tr>
        <tr style="background-color:#CFF">
          <td>Contact Address:</td>
          <td id="contact Address"> <?php echo  $rsprint[cont_address]; ?></td>
          <td>State:</td>
          <td><?php echo  $rsprint[state]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30">Mobile Number:</td>
          <td><p id="mobile  number">
            <?php echo  $rsprint[mobileno]; ?>
          </p></td>
          <td>District:</td>
          <td><?php echo  $rsprint[district]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30">Email:</td>
          <td><?php echo  $rsprint[emailid]; ?></td>
          <td valign="baseline">Taluk:</td>
          <td><?php echo  $rsprint[taluk]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="50">Alternate Contact Number:</td>
          <td><?php echo  $rsprint[alternatecontact]; ?></td>
          <td valign="baseline">City / Town / Suburb:</td>
          <td><?php echo  $rsprint[citytown]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30"><p>Country:</p></td>
          <td><p id="email">
           <?php echo  $rsprint[country]; ?>
          </p></td>
          <td valign="baseline"><p>Postal / Zip Code:</p></td>
          <td><p>
             <?php echo  $rsprint[pincode]; ?>
          </p></td>
        </tr>
      </table>
     <table width="200" border="1">
          <tr style="background-color:#FFC">
            <td colspan="4"><strong>Nationality  details:</strong></td>
          </tr>
          <tr style="background-color:#CFF">
            <td><p>Student Religion:</p></td>
            <td><p>
              <?php echo  $rsprint[religion]; ?>
            </p>
            </td>
            <td><p>Mother Tongue:</p></td>
            <td><p>
               <?php echo  $rsprint[mothertongue]; ?>
            </p></td>
          </tr>
          <tr style="background-color:#CFF">
            <td height="30">Student Category:</td>
            <td> <?php echo  $rsprint[studcategory]; ?></td>
            <td>Nationality:</td>
            <td><?php echo  $rsprint[nationality]; ?></td>
          </tr>
          <tr style="background-color:#CFF">
            <td height="30">Student Caste:</td>
            <td><?php echo  $rsprint[studentcaste]; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
     <table width="200" border="1">
       <tr style="background-color:#FFC">
          <td>Subject</td>
          <td>Maximum Marks</td>
          <td>Marks obtained</td>
          <td>No. of attempts</td>
        </tr>
<?php
$totmark=0;
$sql = "SELECT * FROM student_qualification WHERE application_no='$_GET[applicationid]'";
$qsql = mysqli_query($con,$sql);
while($rsmarklist = mysqli_fetch_array($qsql))
{
?>
        <tr style="background-color:#CFF">
          <td><?php echo $rsmarklist[subject]; ?></td>
          <td><?php echo $rsmarklist[max_mark]; ?></td>
          <td><?php echo $rsmarklist[marks_obt]; ?></td>
          <td><?php echo $rsmarklist[no_of_attempts]; ?></td>
        </tr>
<?php
	$totmark = $totmark +$rsmarklist[marks_obt];
}
?>        
        <tr style="background-color:#CFF">
          <td height="30">&nbsp;</td>
          <td><strong>Total marks </strong></td>
          <td>&nbsp;<?php echo $totmark; ?></td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="95%" border="1" style="border-color:#666;border:1px;">
        <tr style="background-color:#FFC">
          <td colspan="2"><strong>Other  details:</strong></td>
        </tr>
        <tr style="background-color:#CFF">
          <td width="77%" height="50">Language studied in X Std. other than English</td>
          <td width="23%"><?php echo $rsprint[othlangx]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="44">Language studied in XII Std. other than English</td>
          <td><?php echo $rsprint[othlangxii]; ?></tr>
        <tr style="background-color:#CFF">
          <td height="49">Are You a Vocational course student?</td>
          <td><?php echo $rsprint[othvaccourse]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="46">Are you Physically Challenged?</td>
          <td><?php echo $rsprint[othphysicchallenge]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="58">Are you a Son/Daughter of Ex-Serviceman of Karnataka origin?</td>
          <td><?php echo $rsprint[othexservice]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="57">Whether your father/mother/guardian is Farmer/Agricultural Labourer/Registered   Tenant?</td>
          <td><?php echo $rsprint[othtenant]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="44">Did you represent the District or State level in any sports?</td>
          <td><?php echo $rsprint[othsports]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="47">Are you a member of NSS/NCC</td>
          <td><?php echo $rsprint[othnccnss]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="30">Name and Location of School Last studied</td>
          <td><?php echo $rsprint[othschoolastst]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="34">Do you need hostel accommodation?</td>
          <td><?php echo $rsprint[othhostelacc]; ?></td>
        </tr>
        <tr style="background-color:#CFF">
          <td height="49">Medium of Instruction</td>
          <td><?php echo $rsprint[othinsmendium]; ?></td>
        </tr>
        </table>
    <hr>
      <table width="200" border="1">
        <tr style="background-color:#FFC">
          <td colspan="2"><strong>Declaration:</strong></td>
        </tr>
        <tr style="background-color:#CFF">
          <td colspan="2">I declare that all the particulars furnished above   are true and correct. I submit that I will abide by the rules and regulations of   the College.</td>
          </tr>
        <tr style="background-color:#CFF">
          <td width="48%"><p>Place :
              
             <?php echo $rsprint[place]; ?>
          </p></td>
          <td width="52%"></td>
          </tr>
        </table>
        <button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
    window.print();
}
</script>
    </div>
  </div>
</div>
</form>


<!-- / section 3 --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<?php
include("footer.php");
?>
<style type="text/css">
.container .group{text-align:center;}
.container .group div{padding:8px 0; font-size:16px; font-family:Verdana, Geneva, sans-serif;}
.container .group div:nth-child(odd){color:#FFFFFF; background:#CCCCCC;}
.container .group div:nth-child(even){color:#FFFFFF; background:#979797;}
@media screen and (min-width:180px) and (max-width:900px) {
	.container .group div{margin-bottom:0;}
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">