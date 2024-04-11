<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fitness Tracker</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  form {
    max-width: 400px;
    margin: 0 auto;
  }
  input[type="text"],
  input[type="number"],
  select {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  input[type="radio"] {
    margin: 5px;
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
  .result {
    margin-top: 20px;
  }
</style>
</head>
<body>
<h2>Fitness Tracker</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="activityType">Activity Type:</label>
  <select id="activityType" name="activityType" required>
    <option value="">Select Activity</option>
    <option value="running">Running</option>
    <option value="walking">Walking</option>
    <option value="cycling">Cycling</option>
  </select><br>

  <label for="duration">Duration (in minutes):</label>
  <input type="number" id="duration" name="duration" min="1" required><br>

  <label>Intensity Level:</label><br>
  <input type="radio" id="low" name="intensity" value="low" required>
  <label for="low">Low</label><br>

  <input type="radio" id="moderate" name="intensity" value="moderate">
  <label for="moderate">Moderate</label><br>

  <input type="radio" id="high" name="intensity" value="high">
  <label for="high">High</label><br>

  <input type="submit" name="addActivity" value="Add Activity">
</form>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="calorieGoal">Calorie Intake Goal:</label>
  <input type="number" id="calorieGoal" name="calorieGoal" min="1" required><br>

  <input type="submit" name="calculateCalories" value="Calculate">
</form>

<div class="result">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculateCalories"])) {
    $calorieGoal = intval($_POST["calorieGoal"]);
    $activities = isset($_POST["activities"]) ? $_POST["activities"] : [];
    $totalCalories = 0;
    foreach ($activities as $activity) {
        $totalCalories += calculateCalories($activity["duration"], $activity["intensity"]);
    }
    $remainingCalories = $calorieGoal - $totalCalories;
    echo "Total Calorie Intake: $totalCalories<br>";
    echo "Remaining Calorie Goal: $remainingCalories";
}

function calculateCalories($duration, $intensity) {
    switch ($intensity) {
        case "low":
            return $duration * 5;
        case "moderate":
            return $duration * 7;
        case "high":
            return $duration * 10;
        default:
            return 0;
    }
}
?>
</div>
</body>
</html>
