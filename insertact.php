<?php
    include "dbconnect.php";

    if (isset($_POST['add-act'])){
        $acttitle = $_POST['act-title'];
        $actdesc = $_POST['act-desc'];
        $actreq = $_POST['act-req'];
        $outputcode = $_POST['output-code']; 
        $actcode = $_POST['act-code'];
        // $teacher = $_POST[''];
        $actscore = $_POST['act-score'];
        $actdue = $_POST['act-due'];
        $dateTime = new DateTime($actdue);
        $formattedDueDate = $dateTime->format('Y-m-d H:i:s');

        $sql = "INSERT INTO tbl_codeact (TITLE, ACT_DESC, ACT_REQ, OUTPUT, S_CODE, TEACHER, SCORE, DATE_CREATED, DUE_DATE) VALUES ('$acttitle', '$actdesc','$actreq', '$outputcode', '$actcode', 'DELARAMA', $actscore, NOW(), '$formattedDueDate')";
        //('$acttitle', '$actdesc', 'sgfsdfgs', 'adfasdf', 'DELARAMA', $actscore, NOW(), '$formattedDueDate')" ;
        // ('$acttitle', '$actdesc', '$outputcode', '$actcode', 'DELARAMA', $actscore, NOW()), , '$formattedDueDate'" ;
        $result = $conn -> query($sql);

        if ($result) {
           // echo "Data inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

        header("Location: coddie-instructor-platform.php");
        exit;
    }

?>
