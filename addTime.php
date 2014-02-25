         <?php  
         $mysqli = new mysqli("localhost", "root", "", "timeclock");

         if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
         }

         $data = file_get_contents("php://input");

         $objData = json_decode($data);

         $Hour =  $objData->hour;
         $Min = $objData->min;
         $StudentName = $objData->name;
         $JobName = $objData->job;
         $Task = $objData->task;


         $JobExsists = $mysqli->query("SELECT JobID, JobName FROM Job");
          $JobId = 0;
          while($row = mysqli_fetch_array($JobExsists)){
            if($row['JobName'] == $JobName)
               $JobId = $row['JobId'];
          }
          if($JobId == 0) {
            $string = "INSERT INTO Job
               VALUES (NULL, $JobName)";
          $mysqli->query($string);
          echo "Inserting: " . $string;

          $JobId = $mysqli->insert_id;
          }
          $string = "INSERT INTO Task
               VALUES (NULL, $JobId,$Task)";
          $mysqli->query($string);
          echo "Inserting: " . $string;

          $TaskId = $mysqli->insert_id;

          $StudentExsists = $mysqli->query("SELECT StudentID, StudentName FROM Student");
          $StudentId = 0;
          while($row = mysqli_fetch_array($StudentExsists)){
            if($row['StudentName'] == $StudentName)
               $StudentId = $row['StudentId'];
          }
          if($StudentId == 0) {
            $string = "INSERT INTO Student
               VALUES (NULL, $StudentName)";
          $mysqli->query($string);
          echo "Inserting: " . $string;

          $StudentId = $mysqli->insert_id;
          }

          $string = "INSERT INTO TimeWorked
               VALUES (NULL, $TaskId,$StudentId,$Hour,$Min)";
          $mysqli->query($string);
          echo "Inserting: " . $string;


          $string = "INSERT INTO StudentOnTask
               VALUES (NULL,$StudentId,$TaskId,)";
          $mysqli->query($string);
          echo "Inserting: " . $string;
           