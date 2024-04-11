<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Grade Calculator</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  form {
    max-width: 400px;
    margin: 0 auto;
  }
  input[type="text"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  input[type="button"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
  }
  input[type="button"]:hover {
    background-color: #45a049;
  }
  .error {
    color: red;
  }
</style>
<script>
  function validateScores() {
    var scoreFields = document.querySelectorAll('input[type="text"]');
    var valid = true;

    scoreFields.forEach(function(field) {
      var score = parseFloat(field.value);
      if (isNaN(score) || score < 0 || score > 100) {
        field.nextElementSibling.innerHTML = "Enter a valid score between 0 and 100";
        valid = false;
      } else {
        field.nextElementSibling.innerHTML = "";
      }
    });

    return valid;
  }

  function calculateGrade() {
    if (validateScores()) {
      var scores = document.querySelectorAll('input[type="text"]');
      var totalScore = 0;
      scores.forEach(function(field) {
        totalScore += parseFloat(field.value);
      });
      var averageScore = totalScore / scores.length;

      var grade;
      if (averageScore >= 90) {
        grade = 'A';
      } else if (averageScore >= 80) {
        grade = 'B';
      } else if (averageScore >= 70) {
        grade = 'C';
      } else if (averageScore >= 60) {
        grade = 'D';
      } else {
        grade = 'F';
      }

      alert("Your final grade is: " + grade);
    }
  }
</script>
</head>
<body>
<h2>Grade Calculator</h2>
<form>
  <label for="studentName">Student Name:</label>
  <input type="text" id="studentName" name="studentName" required>

  <label for="subject1">Subject 1 Score:</label>
  <input type="text" id="subject1" name="subject1" required>
  <span class="error"></span>

  <label for="subject2">Subject 2 Score:</label>
  <input type="text" id="subject2" name="subject2" required>
  <span class="error"></span>

  <label for="subject3">Subject 3 Score:</label>
  <input type="text" id="subject3" name="subject3" required>
  <span class="error"></span>

  <label for="subject4">Subject 4 Score:</label>
  <input type="text" id="subject4" name="subject4" required>
  <span class="error"></span>

  <label for="subject5">Subject 5 Score:</label>
  <input type="text" id="subject5" name="subject5" required>
  <span class="error"></span>

  <input type="button" value="Calculate" onclick="calculateGrade()">
</form>
</body>
</html>
