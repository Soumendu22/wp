<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Meal Planner</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

h2 {
    text-align: center;
}

form {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form div {
    margin-bottom: 10px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
</style>
</head>
<body>
<h2>Meal Planner</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div>
        <label for="mealName">Meal Name:</label>
        <input type="text" id="mealName" name="meals[0][name]" required>
    </div>
    <div>
        <label for="calories">Calories:</label>
        <input type="number" id="calories" name="meals[0][calories]" min="0" required>
    </div>
    <div>
        <label for="protein">Protein (grams):</label>
        <input type="number" id="protein" name="meals[0][protein]" min="0" required>
    </div>
    <div>
        <label for="carbohydrates">Carbohydrates (grams):</label>
        <input type="number" id="carbohydrates" name="meals[0][carbohydrates]" min="0" required>
    </div>
    <div>
        <label for="fat">Fat (grams):</label>
        <input type="number" id="fat" name="meals[0][fat]" min="0" required>
    </div>
    <button type="button" id="addMeal">Add Meal</button>
    <button type="submit" name="calculateNutrition">Calculate Nutritional Content</button>
</form>
<div id="nutritionalContent"></div>

<script>
// JavaScript code
document.getElementById("addMeal").addEventListener("click", function() {
    const mealCount = document.querySelectorAll("form div").length - 1; // Get the current meal count
    const newMealDiv = document.createElement("div"); // Create a new div for the new meal
    newMealDiv.innerHTML = `
        <div>
            <label for="mealName${mealCount}">Meal Name:</label>
            <input type="text" id="mealName${mealCount}" name="meals[${mealCount}][name]" required>
        </div>
        <div>
            <label for="calories${mealCount}">Calories:</label>
            <input type="number" id="calories${mealCount}" name="meals[${mealCount}][calories]" min="0" required>
        </div>
        <div>
            <label for="protein${mealCount}">Protein (grams):</label>
            <input type="number" id="protein${mealCount}" name="meals[${mealCount}][protein]" min="0" required>
        </div>
        <div>
            <label for="carbohydrates${mealCount}">Carbohydrates (grams):</label>
            <input type="number" id="carbohydrates${mealCount}" name="meals[${mealCount}][carbohydrates]" min="0" required>
        </div>
        <div>
            <label for="fat${mealCount}">Fat (grams):</label>
            <input type="number" id="fat${mealCount}" name="meals[${mealCount}][fat]" min="0" required>
        </div>
    `; // Set the HTML content of the new meal div
    document.querySelector("form").insertBefore(newMealDiv, document.getElementById("addMeal")); // Insert the new meal div before the "Add Meal" button
});
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculateNutrition"])) {
    // PHP code for processing the form submission
    $totalCalories = 0;
    $totalProtein = 0;
    $totalCarbohydrates = 0;
    $totalFat = 0;

    foreach ($_POST["meals"] as $meal) {
        $totalCalories += $meal["calories"];
        $totalProtein += $meal["protein"];
        $totalCarbohydrates += $meal["carbohydrates"];
        $totalFat += $meal["fat"];
    }

    echo "<script>document.getElementById('nutritionalContent').innerHTML = 'Total Calories: $totalCalories<br>Total Protein: $totalProtein grams<br>Total Carbohydrates: $totalCarbohydrates grams<br>Total Fat: $totalFat grams';</script>";
}
?>
</body>
</html>
