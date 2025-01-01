<?php

if (isset($_GET["id"])) {
    $emp_id = $_GET["id"];
    $temp = [];
    $file = fopen("../data/employee.csv", 'r');

    while ($res = fgets($file)) {
        $row = explode(",", $res);
        if ($row[0] !== $emp_id) {
            $temp[] = $res;
        }
    }
    fclose($file);

    $file = fopen("../data/employee.csv", 'w');

      foreach ($temp as $line) {
        
        
        fwrite($file, $line);
    }
    fclose($file);
    header("location: ../index.php");
}

?>
