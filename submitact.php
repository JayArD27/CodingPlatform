<?php
    include "dbconnect.php";

    if (isset($_POST['sub-act'])){
        $rowId;
        // $studfname =  $_POST[];
        // $studfname =  $_POST[];
        // $timeelapse =  $_POST['act-stat'];
        $outputcode = $_POST['output-code']; 
        $actcode = $_POST['act-code'];
        $matchMessage = $_POST['act-stat'];
        $scoreMessage = $_POST['act-score'];
        $actTime = $_POST['act-timer'];

        $response = array('status' => 'success');
        // echo json_encode($response);

        $sql = "INSERT INTO tbl_codeactresult (RES_ACT_ID, STUD_FNAME, STUD_LNAME, TIME_ELAPSE, DATE_TAKEN, SCORE, STATUS, OUTPUT, RES_CODE, ACTTIME) VALUES 
        ($rowId, 'JAY-AR', 'DELA RAMA', NOW(), CURRENT_TIME(),  '$scoreMessage', '$matchMessage', '$outputcode', '$actcode', '$actTime')";

        $result = $conn -> query($sql);

        if ($result) {
        //    echo "Data inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        var_dump($_POST);
        mysqli_close($conn);

        header("Location: coddie-platform.php");
        exit;
    }

?>
