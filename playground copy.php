<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coddie -Code Playground</title>
    <link rel="stylesheet" href="styledarkmode.css">
    <link rel="icon" href="code-solid.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>
    <nav class="nav-header">
        <div class="logo">
            <img src="arrow-left-solid.svg" alt="" style="width: 20px; margin-left: 1%;" style="arrow">
            <h1>CODDIE - CODE PLAYGROUND</h1>
        </div>
        <button id="dark-mode-toggle">
            <i class="fas fa-sun"></i> 
            <i class="fas fa-moon"></i>
        </button>
    </nav>
    <div class="header-sub">
        <h4>Source Code</h4>
        <div class="sel-lang">
        <h4>Language</h4>
            <select id="lang">
                <option selected>C++</option>
                <option>C</option>
                <option>Java</option>
                <option>Python</option>
                <option>PHP</option>
                <option>Ruby</option>
            </select>
        </div>
        <h4>Output<sub></sub></h4>
    </div>
    <!-- CODE EDITOR -->
    <div class=editor-out>
        <div class="code-editor">
            <div class="line-numbers" id="line-numbers"></div>
            <textarea id="source" placeholder="Write your code here..." rows="15"></textarea>
        </div>

    <!-- TESTING ACE EDITOR -->
    
    <!-- TESTING ACE EDITOR -->
    
    <!-- OUTPUT PANEL -->
    <textarea readonly id="output"></textarea>
    </div>
    <h4 style="margin-left:1.5%;">Terminal</h4>
    <div class="input-panel">
        <textarea id="input" placeholder="Input here..."></textarea>
        <button id="run" onclick="run()" class="btn-run">▶ RUN CODE</button>
    </div>

    <script type="text/javascript" src=function.js></script>
</body>
</html>