<!DOCTYPE html>
<html>
<head>
    <title>CODDIE - SCORE TABLE</title>
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" href="styledarkmode.css">
</head>
<body>
    <nav class="nav-header">
        <div class="logo">
            <!-- <a href="panel.html"><img src="arrow-left-solid.svg" alt="" style="width: 20px; margin-left: 1%;" style="arrow"></a> -->
            <h1>CODDIE - CODING PLATFORM</h1>
        </div>

        <button id="dark-mode-toggle">
            <i class="fas fa-sun"></i> 
            <i class="fas fa-moon"></i>
        </button>
        <script>        
            const body = document.querySelector('body');
            const darkModeToggle = document.getElementById('dark-mode-toggle');

            darkModeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            darkModeToggle.classList.toggle('light-mode');
        });
        </script>
    </nav>
    <?php


    $conn = new mysqli('localhost', 'root', '', 'codingplatform');

    if (isset($_GET['id'])) {
        $id = $_GET['id']; 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM tbl_codeactresult WHERE RES_ACT_ID = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>FIRST NAME</th><th>LAST NAME</th><th>CODE</th><th>TIME TAKEN</th><th>DATE TAKEN</th><th>SCORE</th><th>STATUS</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['STUD_FNAME'] . '</td>';
            echo '<td>' . $row['STUD_LNAME'] . '</td>';
            // echo '<td>' . $row['RES_CODE'] . '</td>';
            echo '<td>
                    <dialog class="code-view">
                        <button autofocus>Close</button>
                        <textarea class="code-view">' . $row['RES_CODE'] . '</textarea>
                    </dialog>
                    <button>Show the code</button>
                </td>';
            echo '<td>' . $row['TIME_ELAPSE'] . '</td>';
            echo '<td>' . $row['DATE_TAKEN'] . '</td>';
            echo '<td>' . $row['SCORE'] . '</td>';
            echo '<td>' . $row['STATUS'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        } else {
        echo 'No data available.';
         }
        } else {
        echo 'No data available.';
    }
    $conn->close();
    ?>
<script>
    const dialog = document.querySelector("dialog");
    const showButton = document.querySelector("dialog + button");
    const closeButton = document.querySelector("dialog button");

    // "Show the dialog" button opens the dialog modally
    showButton.addEventListener("click", () => {
    dialog.showModal();
    });

    // "Close" button closes the dialog
    closeButton.addEventListener("click", () => {
    dialog.close();
    });
</script>
</body>
</html>

