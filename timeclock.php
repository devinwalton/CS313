<?php   
         $mysqli = new mysqli("localhost", "root", "", "timeclock");

         if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
         }else
         echo "Sucsess."

         ?>
<html lang = "en">
<head>
   <meta charset = "utf-8" />
   <link rel="stylesheet" type="text/css" href="main.css"></link>  
   <title>Boss Arena Manager</title>
</head>
<body>     
   <!-- <header>
      <ul class="nav-list">
         <a id="nav-link" class="nav-active" 
            href="index.html">
            <li class="nav-link">home</li>
         </a>
      </ul>
   </header>  -->
   <div>         
      <p class="head roundedBorder" align="center">Boss Arena Manager<p>
   </div>
   <div>
    <img src="BossArenaB.png" width="200" />
       
      <div>
         Search by :
         <select name="type">
            <option value = "JOB" selected="selected">Job</option>
            <option value = "STUDENT">Student</option>
         </select>
         <br />
         Which one would you like to know about?
         <select name="name">
      </div>
         
      </select>
      Total Hours Worked: 
     
    <img src="BossArenaG.png" width="200" align="right"/>
   </div>
</body>
</html>