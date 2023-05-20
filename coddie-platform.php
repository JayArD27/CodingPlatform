<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coddie - Coding Platform | STUDENT</title>
    <link rel="stylesheet" href="styledarkmode.css">
    <link rel="icon" href="code-solid.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>
    <nav class="nav-header">
        <div class="logo">
            <img src="arrow-left-solid.svg" alt="" style="width: 20px; margin-left: 1%;" style="arrow">
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
    <section class="act-section">
    <div class="act-play">
        <h1 style="margin-left:25%;">ACTIVITY</h1>
        <a href="playground.php" class="playground"><i class="fa-solid fa-code"></i> CODE PLAYGROUND</a>
    </div>
    <hr style="margin:0 25%">
    <?php
        include 'dbconnect.php';
        $query = "SELECT * FROM tbl_codeact";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="act">
            <div class="act-desc">
            <h3 style="margin-bottom: 2%;"><?php echo $row["TITLE"];?></h3>
                <h6 style="margin-top: -2%;">DUE DATE: <?php $dueDate = new DateTime($row["DUE_DATE"]);$formattedDate = $dueDate->format('F j, Y  g:i A');echo $formattedDate;?></h6>
                <sub>BY: <?php echo $row["TEACHER"];?></sub>
            </div>
            <div class="btn-scoreact">
                <h3>SCORE: <?php echo $row["SCORE"];?></h3>
                <a href='cp-stud-panel.php?id=<?php echo $row["ACT_ID"]; ?>' class="take-act">TAKE ACTIVITY</a>
            </div>
        </div>

        
        <?php 
            }
        } else {
            ?><div class="no-act"><img src="coding2.svg" alt="" class="no-act-pic"><p> There are no ongoing activities.😴☕</p></div><?php 
        }
    ?>
    </section>


    <!-- <script type="text/javascript" src=function.js></script> -->
</body>
</html>