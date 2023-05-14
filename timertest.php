<!DOCTYPE html>
<html lang="en">
<head>
    <title>Timer</title>
    <script>
        // Initialize variables
        var startTime = 0;
        var timerInterval;

        function startTimer() {
            // Set the start time
            startTime = Date.now();

            // Update the timer every second
            timerInterval = setInterval(updateTimer, 1000);
        }

        function stopTimer() {
            // Clear the interval to stop updating the timer
            clearInterval(timerInterval);
        }

        function updateTimer() {
            // Calculate elapsed time in seconds
            var elapsedTime = Math.floor((Date.now() - startTime) / 1000);

            // Format elapsed time
            var hours = Math.floor(elapsedTime / 3600);
            var minutes = Math.floor((elapsedTime % 3600) / 60);
            var seconds = elapsedTime % 60;

            // Format time display
            var timeDisplay = hours.toString().padStart(2, '0') + ':' +
                minutes.toString().padStart(2, '0') + ':' +
                seconds.toString().padStart(2, '0');

            // Update the timer display
            document.getElementById('timer').textContent = timeDisplay;
        }
    </script>
</head>
<body>
    <h1>Timer</h1>
    <button onclick="startTimer()">Start Timer</button>
    <button onclick="stopTimer()">Stop Timer</button>

    <h2>Elapsed Time: <span id="timer">00:00:00</
