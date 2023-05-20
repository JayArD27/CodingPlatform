<?php
    include "dbconnect.php";

    if (isset($_POST['sub-act'])){
        $rowId;
        // $studfname =  $_POST[];
        // $studfname =  $_POST[];
        // $actstat =  $_POST['act-stat'];
        // $actscore =  $_POST['act-score'];
        $outputcode = $_POST['output-code']; 
        $actcode = $_POST['act-code'];

        $sql = "INSERT INTO tbl_codeactresult (RES_ACT_ID, STUD_FNAME, STUD_LNAME, TIME_ELAPSE, DATE_TAKEN, SCORE, STATUS, OUTPUT, RES_CODE) VALUES 
        ($rowId, 'JAY-AR', 'DELA RAMA', NOW(), CURRENT_TIME(),  100, 'COMPLETE', '$outputcode', '$actcode')";

        $result = $conn -> query($sql);

        if ($result) {
           // echo "Data inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

?>
