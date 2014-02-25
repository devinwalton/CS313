         <?php  
         $mysqli = new mysqli("localhost", "root", "", "timeclock");

         if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
         }

         ?>
<script src="index.html"></script>

<html lang = "en" ng-app="timeclock">
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
         Log work done: <br />
         <form name="register" method="post" action="signUp.php">
         Student: 
         <input type="text" name ="studentName"> <br />
         Job: 
         <input type="text" name ="jobName"> <br />
         What was accomplished: 
         <input type="textarea" name ="task"> <br />
         Enter Time Worked
         <select name="hours">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
         </select> Hours
         <select name="minutes">
            <option value="0">0</option>
            <option value="15">15</option>
            <option value="30">30</option>
            <option value="45">45</option>
         </select> Minutes
         </form>
      </div>
      <?php
          $JobExsists = $mysqli->query("SELECT JobID, JobName FROM Job");
          $JobId = 0;
          $JobName = $_GET["jobName"];
          while($row = mysqli_fetch_array($JobExsists)){
            if($row['JobName'] == $JobName)
               $JobId = $row['JobId'];
          }
          if($JobId == 0) {
            $string = "INSERT INTO Job
               VALUES (NULL, $JobName)";
          $mysqli->query($string);

          $JobId = $mysqli->insert_id;
          }
          $string = "INSERT INTO Task
               VALUES (NULL, $JobId,$_GET["task"])";
          $mysqli->query($string);

          $TaskId = $mysqli->insert_id;

          $StudentExsists = $mysqli->query("SELECT StudentID, StudentName FROM Student");
          $StudentId = 0;
          $StudentName = $_GET["studentName"];
          while($row = mysqli_fetch_array($StudentExsists)){
            if($row['StudentName'] == $StudentName)
               $StudentId = $row['StudentId'];
          }
          if($StudentId == 0) {
            $string = "INSERT INTO Student
               VALUES (NULL, $StudentName)";
          $mysqli->query($string);

          $StudentId = $mysqli->insert_id;
          }

          $string = "INSERT INTO TimeWorked
               VALUES (NULL, $TaskId,$StudentId,$_GET["hours"],$_GET["minutes"])";
          $mysqli->query($string);


          $string = "INSERT INTO StudentOnTask
               VALUES (NULL,$StudentId,$TaskId,)";
          $mysqli->query($string);
          
      ?>
      
    <img src="BossArenaG.png" width="200" align="right"/>
   </div>
</body>
</html>