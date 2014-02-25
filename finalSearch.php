<?php   
         $mysqli = new mysqli("localhost", "root", "", "timeclock");

         if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
         }

         $data = file_get_contents("php://input");

         $objData = json_decode($data);

         $id = $objData->id;
         $type = $objData->searchBy;


         if($type == "JOB")
         {
            if($id == 0) 
            {
               $queryString = "SELECT Hours, Minutes FROM TimeWorked";
            }else
            {
               $queryString = "SELECT Hours, Minutes FROM TimeWorked "
                . "INNER JOIN Task ON Task.TaskId=TimeWorked.TaskId WHERE JobID = $id";
            }
               
         }else
         {
            if($id == 0) 
            {
               $queryString = "SELECT Hours, Minutes FROM TimeWorked";
            }else
            {
               $queryString = "SELECT Hours, Minutes FROM TimeWorked "
                . "WHERE StudentID = $id";
            }
               
         }
         
         $Time = $mysqli->query($queryString);

         $hoursWorked = 0;
         $minutesWorked = 0;
         while ($row = $Time->fetch_assoc())
         {
            $hoursWorked += $row["Hours"];
            $minutesWorked += $row["Minutes"];
         }
         $hoursWorked += $minutesWorked/60;

         echo $hoursWorked . " Hours";
      ?>