<?php
session_start();
include("dbconnection.php");
if(isset($_SESSION[staffid]))
{
$sqlstaff = "select * from staff where staff_id='$_SESSION[staffid]'";
$qsqlstaff = mysqli_query($con,$sqlstaff);
$rsstaff = mysqli_fetch_array($qsqlstaff);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>MLSU College Portal</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="clear"> 
    <!-- ################################################################################################ -->
    <nav>
      <ul>
        <p>
          <?php
	  if(isset($_SESSION[staffid]))
	  {
		?>
        </p>
        <li>Welcome <?php 
		echo $rsstaff[name]; 
		?></li>	
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="logout.php">Logout</a></li>        		  
      <?php
	  }
	  else
	  {
	  ?>
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Staff Login</a></li>
      <?php
	  }
	  ?>
      </ul>
    </nav>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="clear"> 
  
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
    
      <h1><a href="" title="" rel="home" target="_blank" style="background-color:rgba(255,255,255,1.00); color:rgba(0,0,0,1.00)"><img src="http://33gwbl174r0v4d263p25aps5zht.wpengine.netdna-cdn.com/wp-content/uploads/2014/05/logo.gif" alt="Free Student Projects"> College Portal</a></h1>
     
    </div>
    <div class="fl_right">
      <form method="get" action="news.php">
        <fieldset>
          <legend>Search:</legend>
          <input type="text" name="search" placeholder="Search Here" style="width:2px;height:20px;">
        </fieldset>
      </form>
    </div>
    <!-- ################################################################################################ --> 
  </header>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="applicationform.php">Application Form</a></li>
        <li><a href="gallery.php">Gallery</a></li> 
         <li><a href="news.php">News</a></li>
        <li><a class="drop" href="#">Student Portal</a>
          <ul>
            <li><a href="courselist.php">Courses</a></li>
            <li><a href="syllabuslist.php">Syllabus</a></li>
            <li><a href="timetable.php">Time Table</a></li>
            <li><a href="searchresult.php">Result</a></li>
          </ul>
        </li>
         <li><a href="contact.php">Contact Us</a></li>       
      </ul>
      <!-- ################################################################################################ --> 
    </nav>
  </div>
</div>