<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Compiler</title>
</head>

<body style="background-color: #eee; font-family: monospace; margin: 8px;" >
    <h2>Coddie Playground</h2>

    <h4>Source Code</h4>
    <textarea id="source" style="width: calc(50% - 8px); height: 40%; resize: vertical;">

</textarea>

    <h4>Language</h4>
    <select id="lang">
        <option>Bash</option>
        <option>C#</option>
        <option selected>C++</option>
        <option>C</option>
        <option>Java</option>
        <option>Python</option>
        <option>PHP</option>
        <option>Ruby</option>
    </select>

    <h4>Input</h4>
    <textarea id="input" style="width: calc(50% - 8px); height: 10%; resize: vertical;"></textarea>

    <h4>Expected Output<sub></sub></h4>
    <textarea id="expected-output" style="width: calc(50% - 8px); height: 10%; resize: vertical;"></textarea>

    </br></br>
    <button id="run" onclick="run()">RUN PROGRAM</button>

    <textarea readonly id="output" style="width: 50%; height: 100%; position: fixed; top: 0; right: 0; resize: none;"></textarea>

    <script type="text/javascript">
        API_KEY = "a2dbe82b80msh417d8d09a4433c5p18c0d2jsn19afa582b020"; 

        var language_to_id = {
            "Bash": 46,
            "C": 50,
            "C#": 51,
            "C++": 54,
            "Java": 62,
            "Python": 71,
            "PHP": 68,
            "Ruby": 72
        };

        function encode(str) {
            return btoa(unescape(encodeURIComponent(str || "")));
        }

        function decode(bytes) {
            var escaped = escape(atob(bytes || ""));
            try {
                return decodeURIComponent(escaped);
            } catch {
                return unescape(escaped);
            }
        }

        function errorHandler(jqXHR, textStatus, errorThrown) {
            $("#output").val(`${JSON.stringify(jqXHR, null, 4)}`);
            $("#run").prop("disabled", false);
        }

        function check(token) {
            $("#output").val($("#output").val() + "\nChecking submission status...");
            $.ajax({
                url: `https://judge0-ce.p.rapidapi.com/submissions/${token}?base64_encoded=true`,
                type: "GET",
                headers: {
                    "x-rapidapi-host": "judge0-ce.p.rapidapi.com",
	                "x-rapidapi-key": API_KEY
                },
                success: function (data, textStatus, jqXHR) {
                    if ([1, 2].includes(data["status"]["id"])) {
                        $("#output").val($("#output").val() + "\nℹ️ Status: " + data["status"]["description"]);
                        setTimeout(function() { check(token) }, 1000);
                    }
                    else {
                        var output = [decode(data["compile_output"]), decode(data["stdout"])].join("\n").trim();
                        // $("#output").val(`${data["status"]["id"] != "3" ? "🔴" : "🟢"} ${data["status"]["description"]}\n${output}`);
                        $("#output").val(`${output}`);
                        $("#run").prop("disabled", false);
                    }
                },
                error: errorHandler
            });
        }

        function run() {
            $("#run").prop("disabled", true);
            $("#output").val("COMPLING...");

            let encodedExpectedOutput = encode($("#expected-output").val());
            if (encodedExpectedOutput === "") {
                encodedExpectedOutput = null; 
            }

            $.ajax({
                url: "https://judge0-ce.p.rapidapi.com/submissions?base64_encoded=true&wait=false",
                type: "POST",
                contentType: "application/json",
                headers: {
                    "x-rapidapi-host": "judge0-ce.p.rapidapi.com",
	                "x-rapidapi-key": API_KEY
                },
                data: JSON.stringify({
                    "language_id": language_to_id[$("#lang").val()],
                    "source_code": encode($("#source").val()),
                    "stdin": encode($("#input").val()),
                    "expected_output": encodedExpectedOutput,
                    "redirect_stderr_to_stdout": true
                }),
                success: function(data, textStatus, jqXHR) {
                    $("#output").val($("#output").val() + "\nCOMPILED!.");
                    setTimeout(function() { check(data["token"]) }, 2000);
                },
                error: errorHandler
            });
        }

        $("body").keydown(function (e) {
            if (e.ctrlKey && e.keyCode == 13) {
                run();
            }
        });

        $("textarea").keydown(function (e) {
            if (e.keyCode == 9) {
                e.preventDefault();
                var start = this.selectionStart;
                var end = this.selectionEnd;

                var append = "    ";
                $(this).val($(this).val().substring(0, start) + append + $(this).val().substring(end));

                this.selectionStart = this.selectionEnd = start + append.length;
            }
        });

        $("#source").focus();
    </script>
</body>
</html>