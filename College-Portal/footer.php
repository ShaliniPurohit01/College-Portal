<?php
include("dbconnection.php");
?>
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <div class="rounded">
    <footer id="footer" class="clear"> 
      <!-- ################################################################################################ -->
      <div class="one_third first">
        <figure class="center">
       <!-- <a href="http://www.freestudentprojects.com/" title="Free Student Projects" rel="home"><img src="http://33gwbl174r0v4d263p25aps5zht.wpengine.netdna-cdn.com/wp-content/uploads/2014/05/logo.gif" alt="Free Student Projects"></a> --> </figure>
      </div>
      <div class="one_third">
      <strong>&nbsp;Available course details:</strong><br />
      
      <?php
      $sql = "SELECT * FROM course where status='Active' LIMIT 0 , 10";
	  $qsql = mysqli_query($con,$sql);
	  while($rs = mysqli_fetch_array($qsql))
	  {
		 echo $rs["coursename"]." - ". $rs["coursetype"] ."<br />"; 
	  }
	  ?>
      </div>
      <div class="one_third">
         <address>
       
		Postal address
		<br>
Mohanlal Sukhadia University
Udaipur 313001 
Rajasthan, India
	<br>
Telephone, E-mail & Fax
EPABX: 0294-2470918/ 2471035/ 2471969
Fax:+91-294-2471150
E-mail: registrar@mlsu.ac.in
		
		
		<br>
        <i class="fa fa-phone pright-10">0292-2470370</i>
        </address>
      </div>
      <!-- ################################################################################################ --> 
    </footer>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2017-18 - All Rights Reserved  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    </p>
    
	<p class="fl_right">Designed & Developed By 
				<b>Dhawal Mehta,</b>
				<b>Shalini Purohit,</b>
				<b>Vaishali Mandowara</b>
	</p>
    <!-- ################################################################################################ --> 

  </div>
</div>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
</body>
</html>