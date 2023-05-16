<?php
    include "dbconnect.php";

    if (isset($_POST['add-act'])){
        $acttitle = $_POST['act-title'];
        $actdesc = $_POST['act-desc'];
        $outputcode = $_POST['output-code']; 
        $actcode = $_POST['act-code'];
        // $teacher = $_POST[''];
        $actscore = $_POST['act-score'];

        $sql = "INSERT INTO tbl_codeact (TITLE, ACT_DESC, OUTPUT, S_CODE, TEACHER, SCORE, DATE_CREATED)VALUES ('$acttitle', '$actdesc', '$outputcode', '$actcode', 'DELARAMA', $actscore, NOW())" ;
        $result = $conn -> query($sql);

        if ($result) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

?>
