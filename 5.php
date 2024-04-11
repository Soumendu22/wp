<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GPA Calculator</title>
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
  function validateGrades() {
    var gradeFields = document.querySelectorAll('input[name^="course"]');
    var valid = true;

    gradeFields.forEach(function(field) {
      var grade = field.value.toUpperCase();
      if (!['A', 'B', 'C', 'D', 'F'].includes(grade)) {
        field.nextElementSibling.innerHTML = "Enter a valid grade (A, B, C, D, F)";
        valid = false;
      } else {
        field.nextElementSibling.innerHTML = "";
      }
    });

    return valid;
  }

  function validateForm() {
    var gradeFields = document.querySelectorAll('input[name^="course"]');
    var filled = true;

    gradeFields.forEach(function(field) {
      if (field.value.trim() === "") {
        field.nextElementSibling.innerHTML = "This field is required";
        filled = false;
      } else {
        field.nextElementSibling.innerHTML = "";
      }
    });

    return filled;
  }
</script>
</head>
<body>
<h2>GPA Calculator</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">
  <label for="studentName">Student Name:</label>
  <input type="text" id="studentName" name="studentName" required>

  <label for="course1Grade">Course 1 Grade:</label>
  <input type="text" id="course1Grade" name="course1Grade" required>
  <span class="error"></span>

  <label for="course2Grade">Course 2 Grade:</label>
  <input type="text" id="course2Grade" name="course2Grade" required>
  <span class="error"></span>

  <label for="course3Grade">Course 3 Grade:</label>
  <input type="text" id="course3Grade" name="course3Grade" required>
  <span class="error"></span>

  <label for="course4Grade">Course 4 Grade:</label>
  <input type="text" id="course4Grade" name="course4Grade" required>
  <span class="error"></span>

  <label for="course5Grade">Course 5 Grade:</label>
  <input type="text" id="course5Grade" name="course5Grade" required>
  <span class="error"></span>

  <input type="submit" value="Calculate GPA">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["studentName"]) && !empty($_POST["studentName"])) {
        $studentName = $_POST["studentName"];
        $grades = array(
            strtoupper($_POST["course1Grade"]),
            strtoupper($_POST["course2Grade"]),
            strtoupper($_POST["course3Grade"]),
            strtoupper($_POST["course4Grade"]),
            strtoupper($_POST["course5Grade"])
        );

        $validGrades = array('A', 'B', 'C', 'D', 'F');
        $totalGradePoints = 0;
        $valid = true;

        foreach ($grades as $grade) {
            if (!in_array($grade, $validGrades)) {
                $valid = false;
                echo "<p class='error'>Invalid grade entered.</p>";
                break;
            }

            switch ($grade) {
                case 'A':
                    $totalGradePoints += 4;
                    break;
                case 'B':
                    $totalGradePoints += 3;
                    break;
                case 'C':
                    $totalGradePoints += 2;
                    break;
                case 'D':
                    $totalGradePoints += 1;
                    break;
                case 'F':
                    $totalGradePoints += 0;
                    break;
            }
        }

        if ($valid) {
            $gpa = $totalGradePoints / count($grades);
            echo "<h2>GPA Result</h2>";
            echo "<p>Student Name: $studentName</p>";
            echo "<p>GPA: $gpa</p>";
        }
    } else {
        echo "<p class='error'>Student name is required.</p>";
    }
}
?>
</body>
</html>
