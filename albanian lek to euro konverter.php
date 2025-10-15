<?php
// Simple Albanian Lek to Euro converter
// Exchange rate as of October 2025 (approximate, for demonstration)
const EXCHANGE_RATE = 0.0093; // 1 ALL = 0.0093 EUR (approximate rate)

function lek_to_euro($lek_amount) {
    // Check if the input is numeric
    if (!is_numeric($lek_amount)) {
        return "Please enter a valid number.";
    }

    $lek = floatval($lek_amount);
    if ($lek < 0) {
        return "Amount cannot be negative.";
    }

    $euro = $lek * EXCHANGE_RATE;
    return round($euro, 2);
}

// Handle form submission
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lek_amount'])) {
    $amount = $_POST['lek_amount'];
    $result = lek_to_euro($amount);
    if (is_string($result)) {
        $result = htmlspecialchars($result);
    } else {
        $result = "$amount ALL = $result EUR";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Albanian Lek to Euro Converter</title>
</head>
<body>
    <h2>Albanian Lek to Euro Converter</h2>
    <form method="post" action="">
        <label for="lek_amount">Enter amount in Albanian Lek (ALL):</label>
        <input type="text" id="lek_amount" name="lek_amount" required>
        <input type="submit" value="Convert">
    </form>
    <?php if ($result): ?>
        <p><?php echo htmlspecialchars($result); ?></p>
    <?php endif; ?>
</body>
</html>