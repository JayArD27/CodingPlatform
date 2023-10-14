<?php
    include "dbconnect.php";
    if (isset($_GET['id'])) {
        $actid = $_GET['id']; 
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

            $sql = "UPDATE tbl_codeact SET 
            ACT_DESC = '$actdesc',
            ACT_REQ = '$actreq',
            OUTPUT = '$outputcode',
            S_CODE = '$actcode',
            TEACHER = 'DELARAMA',
            SCORE = $actscore,
            DATE_CREATED = NOW(),
            DUE_DATE = '$formattedDueDate',
            TITLE = '$acttitle' 
            WHERE ACT_ID = $actid";

            $result = $conn->query($sql);

            if ($result) {
                // echo "Data updated successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);

            header("Location: coddie-instructor-platform.php");
            exit;
        }
    }
?>
