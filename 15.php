<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Conference Room Reservation</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  form {
    max-width: 400px;
    margin: 0 auto;
  }
  input[type="text"],
  input[type="date"],
  input[type="time"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
  .error {
    color: red;
  }
</style>
<script>
  function validateForm() {
    var reservationDate = document.getElementById('reservationDate').value.trim();
    var startTime = document.getElementById('startTime').value.trim();
    var endTime = document.getElementById('endTime').value.trim();
    var employeeName = document.getElementById('employeeName').value.trim();
    var reasonForReservation = document.getElementById('reasonForReservation').value.trim();
    var isValid = true;

    if (reservationDate === '' || startTime === '' || endTime === '' || employeeName === '' || reasonForReservation === '') {
      alert('Please fill in all fields.');
      isValid = false;
    }

    if (startTime >= endTime) {
      alert('End time must be after start time.');
      isValid = false;
    }

    return isValid;
  }
</script>
</head>
<body>
<h2>Conference Room Reservation</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
  <label for="roomName">Room Name:</label>
  <input type="text" id="roomName" name="roomName" required><br>

  <label for="reservationDate">Reservation Date:</label>
  <input type="date" id="reservationDate" name="reservationDate" required><br>

  <label for="startTime">Start Time:</label>
  <input type="time" id="startTime" name="startTime" required><br>

  <label for="endTime">End Time:</label>
  <input type="time" id="endTime" name="endTime" required><br>

  <label for="employeeName">Employee Name:</label>
  <input type="text" id="employeeName" name="employeeName" required><br>

  <label for="reasonForReservation">Reason for Reservation:</label>
  <input type="text" id="reasonForReservation" name="reasonForReservation" required><br>

  <input type="submit" value="Reserve">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomName = $_POST["roomName"];
    $reservationDate = $_POST["reservationDate"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];
    $employeeName = $_POST["employeeName"];
    $reasonForReservation = $_POST["reasonForReservation"];
    $startTimeStamp = strtotime("$reservationDate $startTime");
    $endTimeStamp = strtotime("$reservationDate $endTime");
    $durationSeconds = $endTimeStamp - $startTimeStamp;
    $durationHours = floor($durationSeconds / 3600);
    $durationMinutes = floor(($durationSeconds % 3600) / 60);
    $duration = sprintf("%02d:%02d", $durationHours, $durationMinutes);
    echo "<h3>Reservation Confirmation</h3>";
    echo "<p><strong>Room Name:</strong> $roomName</p>";
    echo "<p><strong>Reservation Date:</strong> $reservationDate</p>";
    echo "<p><strong>Start Time:</strong> $startTime</p>";
    echo "<p><strong>End Time:</strong> $endTime</p>";
    echo "<p><strong>Duration:</strong> $duration</p>";
    echo "<p><strong>Employee Name:</strong> $employeeName</p>";
    echo "<p><strong>Reason for Reservation:</strong> $reasonForReservation</p>";
    echo "<p>Room reserved successfully!</p>";
}
?>

</body>
</html>
