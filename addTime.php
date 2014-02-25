         <?php  
         $mysqli = new mysqli("localhost", "root", "", "timeclock");

         if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
         }

         $data = file_get_contents("php://input");
         echo $data;
         $objData = json_decode($data);
         $Hour =  $objData->hour;
         $Min = $objData->min;
         $StudentName = $objData->name;
         $Job = $objData->job;
         $Task = $objData->task;
         if(is_null($Hour)||is_null($Min)||is_null($StudentName)||is_null($Job)||is_null($Task))
         {
            echo "Form Incomplete. Please fill in your data."
         }
         else
         {

            echo "Sucsess. Your time has been logged."
         $JobExsists = $mysqli->query("SELECT JobId, JobName FROM Job");
          $JobId = 0;
          while($row = mysqli_fetch_array($JobExsists)){
            if($row['JobName'] == $Job)
               $JobId = $row['JobId'];
          }
          if($JobId == 0) {
            $string = "INSERT INTO Job
               VALUES (NULL, \"$Job\")";
          $mysqli->query($string);
          // echo "\nInserting: " . $string;

          $JobId = $mysqli->insert_id;
          }
          $string = "INSERT INTO Task
               VALUES (NULL, $JobId,\"$Task\")";
          $mysqli->query($string);
          // echo "\nInserting: " . $string;

          $TaskId = $mysqli->insert_id;

          $StudentExsists = $mysqli->query("SELECT StudentId, StudentName FROM Student");
          $StudentId = 0;
          while($row = mysqli_fetch_array($StudentExsists)){
            if($row['StudentName'] == $StudentName)
               $StudentId = $row['StudentId'];
          }
          if($StudentId == 0) {
            $string = "INSERT INTO Student
               VALUES (NULL, \"$StudentName\")";
          $mysqli->query($string);
          // echo "\nInserting: " . $string;

          $StudentId = $mysqli->insert_id;
          }

          $string = "INSERT INTO TimeWorked
               VALUES (NULL, $TaskId,$StudentId,$Hour,$Min)";
          $mysqli->query($string);


          $string = "INSERT INTO StudentOnTask
               VALUES (NULL,$StudentId,$TaskId,)";
          $mysqli->query($string);
       }
           