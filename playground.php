<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Compiler</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="code-solid.svg">
</head>
<body>
    <nav class="nav-header">
        <a href="http://"><</a>
        <h1>CODDIE - Code Playground</h1>
    </nav>
    <div class="header-sub">
        <h4>Source Code</h4>
        <div class="sel-lang">
        <h4>Language</h4>
            <select id="lang">
                <option>C#</option>
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