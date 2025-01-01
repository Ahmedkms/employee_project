<?php

if (isset($_GET["id"])) {
    $emp_id = $_GET["id"];
    $temp = [];
    $file = fopen("../data/employee.csv", 'r');

    while ($res = fgets($file)) {
        $row = explode(",", $res);
        if ($row[0] !== $emp_id) {
            $temp[] = $row;
        }
    }
    fclose($file);

    $file = fopen("../data/employee.csv", 'w');

      foreach ($temp as $line) {
        
        $lineStr = implode(',', $line );
        fwrite($file, $lineStr);
    }
    fclose($file);
    header("location: ../index.php");
}

?>
