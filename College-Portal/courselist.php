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
          <h1>Course list</h1>
<strong>We offer following courses:</strong><br />
<table width="200" border="1">
  <tr>
    <th scope="col">&nbsp;Course name	</th>
    <th scope="col">&nbsp;About course</th>   
  </tr>
<?php
$sql ="SELECT * FROM course";
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
	echo "<tr>
    <td>&nbsp;$rs[coursename] - &nbsp;$rs[coursetype]</td>
    <td>&nbsp;$rs[description]</td>   
  </tr>";
}
?>
</table>

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
              <li class="clear"><a href="searchresult.php"><img src="images/result.jpg" alt="" style="width:80px;height:80px;"> Result</a></li>
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