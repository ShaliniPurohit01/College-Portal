<?php
include("header.php");
include("dbconnection.php");
if(isset($_POST["submit"]))
{
	$filename = rand().$_FILES["image"]["name"];
	move_uploaded_file($_FILES["image"]["tmp_name"],"sliderimg/".$filename);
	$sql = "UPDATE slider SET slidertitle='$_POST[slidertitle]',description='$_POST[description]',";
	if($_FILES["image"]["name"] != "")
	{
	$sql = $sql . " sliderimage='$filename', ";
	}
	if(isset($_REQUEST["status"])){
	$sql = $sql . " status='".$_POST["status"]."' WHERE sliderno='".$_POST["sliderno"]."'";
	if(!$qsql = mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}
	echo "<script>alert('Slider updated successfully..');</script>";
}}
?><!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
         <?php
	  include("leftsidebar.php");
	  ?>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="two_third"> 
        <!-- ################################################################################################ -->
        <h1>Slider Image</h1>
        <p>&nbsp;
        <form method="post" action="" enctype="multipart/form-data">
        <table width="415" border="1">
  <tr>
    <td width="19%">Slider No.</td>
    <td width="81%">
    <select name="sliderno" onchange="changeslider(this.value)">
    <?php
	$arr = array("Select","Slider 1","Slider 2","Slider 3","Slider 4","Slider 5");
	foreach($arr as $val)
	{
		echo "<option value='$val'>$val</option>";
	}
	?>    
    </select></td>
  </tr>
</table>
<div id="txtHint">

</div>        
        <p>&nbsp;</p>
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
<script>
function changeslider(str) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","ajaxslider.php?q="+str,true);
        xmlhttp.send();
}
</script>