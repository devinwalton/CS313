<?php   
         $mysqli = new mysqli("localhost", "root", "", "timeclock");

         if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
         }

         $data = file_get_contents("php://input");

         $objData = json_decode($data);
         $type = $objData->searchBy;

          $Student = $mysqli->query("SELECT StudentId, StudentName FROM Student");
          $Job = $mysqli->query("SELECT JobId, JobName FROM Job");
          $result;
          $i = 0;
         if($type == "JOB")
         {
            while ($row = $Job->fetch_assoc())
            {
                $result[i++][$row["JobId"]];
                $result[i++][$row["JobName"]];
            }
            echo $result;

         }else
         {
            while ($row = $Student->fetch_assoc())
            {
               echo $row["StudentId"] ."," . $row["StudentName"]. ",";
            }
         }
    ?>