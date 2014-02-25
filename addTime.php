         <?php  
         $mysqli = new mysqli("localhost", "root", "", "timeclock");

         if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
         }else
         {
            echo "Sucsess";
         }

         $data = file_get_contents("php://input");
         echo $data;
         $objData = json_decode($data);
         echo "\n".$objData;
          