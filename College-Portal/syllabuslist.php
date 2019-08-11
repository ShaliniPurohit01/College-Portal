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
    <main class="container clear"> 
          <!-- ################################################################################################ -->
        <h1>Syllabus list</h1>        
<form id="form1" name="form1" method="get" action="">
<table width="239" border="1">
  <tr>
    <th width="72" scope="row">&nbsp;Course</th>
    <td width="73">&nbsp;
    <select name="course">
    <option value="">Select</option>
    <?php
	$sql = "SELECT * FROM course where status='Active'";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<option value='$rs[course_id]'>$rs[coursename] - $rs[coursetype]</option>";
	}
	?>
    </select>
    </td>
    <td width="72" rowspan="2"><br />

      <input type="submit" name="btnsearch" id="btnsearch" value="Search syllabus" />
    </td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Semester</th>
    <td>&nbsp;
      <select name="semester">
        <?php
	$arr = array("Select","1st Semester","2nd Semester","3rd Semester","4th Semester","5th Semester","6th Semester");
	foreach($arr as $val)
	{
		echo "<option value='$val'>$val</option>";
	}
	?>
        </select>
    </td>
    </tr>
</table>
</form>

<?php
if(isset($_GET["btnsearch"]))
{
?>
    <h1>Search result</h1>    
    <?php
    $sql1 = "SELECT * FROM course where course_id='$_GET[course]'";
    $qsql1 = mysqli_query($con,$sql1);
    $rs1 = mysqli_fetch_array($qsql1);
    ?>
    <table width="200" border="1">
      <tr>
        <th scope="col">&nbsp;Course name	- <?php echo $rs1["coursename"] ."-".$rs1["coursetype"]; ?></th>
        <th scope="col">&nbsp;Semester- <?php echo $_GET["semester"]; ?></th>
      </tr>
    </table>
    
    <?php
    $sqlsubject ="SELECT * FROM subject where course_id='$_GET[course]'";
    $qsqlsubject = mysqli_query($con,$sqlsubject);
    while($rssubject = mysqli_fetch_array($qsqlsubject))
    {
    ?>
        <table width="200" border="1">
          <tr>
            <th scope="col">&nbsp;Subject name - <?php echo $rssubject["subject_name"]; ?>&nbsp;<hr />
	&nbsp;Subject code - <?php echo $rssubject["subjectcode"]; ?></th>
          
            </tr>
            <?php
			    $sqlsyllabus ="SELECT * FROM syllabus where subject_id='$rssubject[subject_id]'";
   	 			$qsyllabus = mysqli_query($con,$sqlsyllabus);
    			while($rssyllabus = mysqli_fetch_array($qsyllabus))
				{
			?>
          <tr>
            <td colspan="2" scope="col">&nbsp;<strong><?php echo $rssyllabus["syllabustitle"]; ?></strong>&nbsp;<br />
<?php echo $rssyllabus["syllabuscontents"]; ?></td>
          </tr>
          <?php
				}
			?>
        </table>
    <?php
    }
    ?>
<?php
}
?>
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

</script>