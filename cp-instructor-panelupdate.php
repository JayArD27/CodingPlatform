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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coddie - Create Code Activity</title>
    <link rel="stylesheet" href="styledarkmode.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="code-solid.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>
    <nav class="nav-header">
        <div class="logo">
            <img src="arrow-left-solid.svg" alt="" style="width: 20px; margin-left: 1%;" style="arrow">
            <h1>CODDIE - CREATE CODE ACTIVITY</h1>
        </div>
        <p><b>LAST NAME, FIRSTNAME</b></p>
        <!-- <p>Elapsed Time: 10:00:12</p>
        <p>Status: Incomplete</p> -->
        <button id="dark-mode-toggle" class="dm-panel">
            <i class="fas fa-sun"></i> 
            <i class="fas fa-moon"></i>
        </button>
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
    <form method="post">
        <div class=editor-out>
                <div class="code-act-inst">
                    <p class="act-p" for="act-title">Title:</p>
                    <input type="text" class="act-p" style="width: 95%; height:5%;" name="act-title" name="inputField" value="<?php echo $row["TITLE"];?>" required>
                    <p class="act-p" for="act-desc">Instruction:</p>
                    <textarea class="act-p act-p-text" placeholder="Create code instructions here..." name="act-desc" value="" required><?php echo $row["ACT_DESC"];?></textarea>
                    <textarea class="act-p act-p-req" placeholder="REQUIREMENT" name="act-req" value="" required><?php echo $row["ACT_REQ"];?></textarea>
                    <div class="div-scoredate">
                        <div>
                            <p class="act-p" for="act-score">Score:</p>
                            <input type="number" class="act-p" style="width: 60%; height:20%;" min=1 name="act-score" value="<?php echo $row["SCORE"];?>" required>
                        </div>
                        <div>
                            <p>Due Date:</p>
                            <input type="datetime-local" id="myDateInput" name="act-due" value="<?php echo $row["DUE_DATE"];?>" required>
                        </div>
                    </div>
                </div>
            <div class="code-editor">
                <div class="line-numbers" id="line-numbers"></div>
                <textarea id="source" placeholder="Write your code here..." rows="15" name="act-code" required><?php echo $row["S_CODE"];?></textarea>
            </div>
        <!-- OUTPUT PANEL -->
        <textarea readonly id="output" name="output-code"></textarea>
        </div>



        <h4 style="margin-left:30%;">Input</h4>

    <div class="input-panel">
        <!-- <div class=notepanel>
            <input type="text" placeholder="Create note...">
            <textarea class="txtnote"></textarea>
        </div> -->
        <textarea id="input" name="input-inst" placeholder="Input here..."></textarea>
        <button  id="add" class="btn-sub btn-addact" name="add-act" type="submit"><b>+</b> UPDATE</button>
    </div>
    </form>
    <button id="run" onclick="run()" class="btn-run btn-run-act btn-run-teacher">▶ RUN CODE</button>
    <?php } ?>
    <?php        
        }
        include "updateact.php";
    }
        ?>

    <script type="text/javascript" src=function.js></script>
</body>
</html>