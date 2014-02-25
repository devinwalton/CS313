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
         <form name="register" method="post" action="signUp.php">
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

<?php
          $Students = $mysqli->query("SELECT StudentID, StudentName FROM Student");
          $Job = $mysqli->query("SELECT JobID, JobName FROM Job");
         if($_GET["type"] == "JOB")
         {
            while ($row = $Job->fetch_assoc())
            {
               echo "<option value = \"" . $row["JobID"] . "\">" . $row["JobName"] . "</option>\n";
            }

         }else
         {
            while ($row = $Student->fetch_assoc())
            {
               echo "<option value = \"" . $row["StudentID"] . "\">" . $row["StudentName"] . "</option>\n";
            }
         }
      ?>    

       <?php
         if($_GET["type"] == "JOB")
         {
            $queryString = "SELECT Hours, Minutes FROM TimeWorked "
                . "WHERE JobID = $_GET["name"]";
            $Time = $mysqli->query($queryString);
         }else
         {
            $queryString = "SELECT Hours, Minutes FROM TimeWorked "
                . "WHERE StudentID = $_GET["name"]";
            $Time = $mysqli->query($queryString);
         }

         $hoursWorked;
         $minutesWorked;
         while ($row = $Time->fetch_assoc())
         {
            $hoursWorked += $row["Hours"];
            $minutesWorked += $row["Minutes"];
         }
         $hoursWorked += $minutesWorked/60;

         echo $hoursWorked . "hours";
      ?>