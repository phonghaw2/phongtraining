 
<?php
include "db.php";

$start_row = 1;
$insertquery =
    "INSERT INTO `test` (`sequence1`, `word1`, `number1`) VALUES ";
$subquery = "";


if (($csv_file = fopen("phonghaw1m.csv", "r")) !== false) {
    $temp_count = 0;
    while (($read_data = fgetcsv($csv_file, 1000, ",")) !== false) {
        $column_count = count($read_data);
        $subquery = $subquery . " (";
        $temp_count++;
        $start_row++;
        for ($c = 0; $c < $column_count; $c++) {
            $subquery = $subquery . '\'' . $read_data[$c] . '\',';
        }
        $subquery = substr($subquery, 0, strlen($subquery) - 2);
        $subquery = $subquery . '\')' . " , ";

        if ($temp_count % 1000 == 0) {
            $insertquery = $insertquery . $subquery;
            $insertquery = substr($insertquery, 0, strlen($insertquery) - 2);
            if (mysqli_query($conn, $insertquery)) {
                $insertquery =
                    "INSERT INTO `test` (`sequence1`, `word1`, `number1`) VALUES ";
                $subquery = "";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    fclose($csv_file);
    mysqli_close($conn);
}
?>

