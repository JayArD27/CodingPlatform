API_KEY = "a2dbe82b80msh417d8d09a4433c5p18c0d2jsn19afa582b020"; 

        var language_to_id = {
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

        //code editor
        const codeEditor = document.getElementById('source');
        const lineNumbers = document.querySelector('.line-numbers');

        function updateLineNumbers() {
        const lines = codeEditor.value.split('\n');
        const lineNumbersHTML = lines.map((_, index) => `<div class="line-number">${index + 1}</div>`).join('');
        lineNumbers.innerHTML = lineNumbersHTML;
        }

        codeEditor.addEventListener('input', updateLineNumbers);

        // pang call ng update ng lines
        updateLineNumbers();

// For darkmode and shits
        const body = document.querySelector('body');
        const darkModeToggle = document.getElementById('dark-mode-toggle');

        darkModeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            darkModeToggle.classList.toggle('light-mode');
        });


        // para #output for inserting sa databse
        function insertDataToDatabase(data) {
            $.ajax({
              url: "insertact.php",
              type: "POST",
              data: {
                outputData: data
              },
              success: function(response) {
                console.log(response);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error:", errorThrown);
              }
            });
          }
        
          var outputData = $("#output").val();
          insertDataToDatabase(outputData);
          