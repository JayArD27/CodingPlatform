<?php
    include 'dbconnect.php';
    if (isset($_GET['id'])) {
        $rowId = $_GET['id'];
        $query = "SELECT * FROM tbl_codeact WHERE ACT_ID = $rowId";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coddie - Code Activity</title>
    <link rel="stylesheet" href="styledarkmode.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="code-solid.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>
    <nav class="nav-header">
        <div class="logo">
            <img src="arrow-left-solid.svg" alt="" style="width: 20px; margin-left: 1%;" style="arrow">
            <h1>CODDIE - CODE ACTIVITY</h1>
            <button id="dark-mode-toggle">
            <i class="fas fa-sun"></i> 
            <i class="fas fa-moon"></i>
            </button>
        </div>
        <p><b>LAST NAME, FIRSTNAME</b></p>
        Time Elapse: <textarea name="act-timer" id="timer">00:00:00</textarea>
        <!-- <p>Status: Incomplete</p> -->
        <!-- <p id="match-message">INCOMPLETE</p>
                <p id="score-message">0</p>
    --> 
    <form method="post">
        <div class="div-scorestat">
            <p class="p-score">Status: <textarea name="act-stat" id="match-message" readonly>INCOMPLETE</textarea> </p>
            <p class="p-score" style="margin-right:10%;">Score: <textarea name="act-score" id="score-message" readonly>0</textarea>/ <textarea id="score" readonly><?php echo $row['SCORE'];?></textarea></p>
        </div>
    </nav>
    <div class="header-sub">
        <h4>Activity</h4>
        <h4  style="margin-left: -6%;">Source Code</h4>
        <div class="sel-lang">
        <h4>Language</h4>
            <select id="lang">
                <option selected>C++</option>
                <!-- <option>C</option>
                <option>Java</option>
                <option>Python</option>
                <option>PHP</option>
                <option>Ruby</option> -->
            </select>
        </div>
        <h4>Output<sub></sub></h4>
    </div>
    <!-- CODE EDITOR -->

    <div class=editor-out>
        <div class="code-act">
            <p class="act-p act-title"><?php echo $row["TITLE"];?></p>
            <sub class="act-p act-teacher">BY:<?php echo $row["TEACHER"];?></sub>
            <p class="act-p">Instructions:</p>
            <p class="act-p act-inst"><?php echo $row["ACT_DESC"];?></p>
            <p class="act-p">Requirements:</p>
            <p class="act-p act-inst"><?php echo $row["ACT_REQ"];?></p>
            <P class="act-p">Expected Output:</P>
            <textarea id="activity" readonly><?php echo $row["OUTPUT"];?></textarea>
        </div>
        <div class="code-editor">
            <div class="line-numbers" id="line-numbers"></div>
            <textarea id="source" placeholder="Write your code here..." rows="15" name="act-code"></textarea>
        </div>
    <!-- OUTPUT PANEL -->
    <textarea readonly id="output" name="output-code"></textarea>
    </div>
    <h4 style="margin-left:30%;">Input</h4>
    <div class="input-panel">
        <textarea id="input" name="input-stud" placeholder="Input here..."></textarea>
        <button id="submit-button" name="sub-act" class="btn-subcode">📂 SUBMIT CODE</button>
    </div>
    </form>
    <div class="run-sub">
    <button id="compare-button" class="btn-sub" name="sub-act">✔ CHECK CODE</button>
    <button id="run" onclick="run()" class="btn-run">▶ RUN CODE</button>
    </div>
    <?php } ?>
    <?php        
        }
        include "submitact.php";
    }
        ?>
    <script type="text/javascript" src=function.js></script>
    <script>
          //TIMER

          let seconds = 0;
          let minutes = 0;
          let hours = 0;

          // Function to update the timer
          function updateTimer() {
            seconds++;
            if (seconds === 60) {
              seconds = 0;
              minutes++;
              if (minutes === 60) {
                minutes = 0;
                hours++;
              }
            }
            
            // Format the timer value as HH:MM:SS
            let formattedTime = `${padZero(hours)}:${padZero(minutes)}:${padZero(seconds)}`;
            
            // Update the timer element
            document.getElementById("timer").innerText = formattedTime;
          }

          // Helper function to add leading zeros to numbers less than 10
          function padZero(number) {
            return number < 10 ? `0${number}` : number;
          }

          // Start the timer
          setInterval(updateTimer, 1000); // Update every second
</script>

</body>
</html>