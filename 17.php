<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Expense Tracking System</title>
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
  input[type="date"] {
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
  .error-message {
    color: red;
    font-size: 14px;
    margin-top: 5px;
  }
</style>
</head>
<body>
<h2>Expense Tracking System</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="expenseDescription">Expense Description:</label>
  <input type="text" id="expenseDescription" name="expenseDescription" required><br>

  <label for="expenseAmount">Expense Amount:</label>
  <input type="number" id="expenseAmount" name="expenseAmount" min="0" step="0.01" required><br>

  <label for="expenseDate">Expense Date:</label>
  <input type="date" id="expenseDate" name="expenseDate" required><br>

  <input type="submit" name="addExpense" value="Add Expense">
</form>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="budgetAmount">Budget Amount:</label>
  <input type="number" id="budgetAmount" name="budgetAmount" min="0" step="0.01" required><br>

  <input type="submit" name="calculateBudget" value="Calculate Remaining Budget">
</form>

<div id="remainingBudget">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculateBudget"])) {
    $budgetAmount = floatval($_POST["budgetAmount"]);
    $expenses = isset($_POST["expenses"]) ? $_POST["expenses"] : [];
    $totalExpenses = array_sum($expenses);
    $remainingBudget = $budgetAmount - $totalExpenses;
    echo "Remaining Budget: $" . number_format($remainingBudget, 2);
}
?>
</div>
</body>
</html>
