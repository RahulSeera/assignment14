<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = $_POST['height'] / 100; // Convert to meters
    $weight = $_POST['weight'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $activity = $_POST['activity'];
    
    // Calculate BMI
    $bmi = $weight / ($height * $height);
    
    // Determine BMI category
    $bmi_category = "";
    if ($bmi < 18.5) {
        $bmi_category = "Underweight";
    } elseif ($bmi < 25) {
        $bmi_category = "Normal weight";
    } elseif ($bmi < 30) {
        $bmi_category = "Overweight";
    } else {
        $bmi_category = "Obese";
    }
    
    // Calculate TDEE
    if ($gender == "male") {
        $bmr = 88.362 + (13.397 * $weight) + (4.799 * ($height * 100)) - (5.677 * $age);
    } else {
        $bmr = 447.593 + (9.247 * $weight) + (3.098 * ($height * 100)) - (4.330 * $age);
    }
    
    $tdee = $bmr * $activity;
    
    include 'header.php';
?>

<div class="results-wrapper">
    <div class="results-grid">
        <div class="result-card">
            <h2>BMI Results</h2>
            <div class="result-value">Your BMI is: <?php echo number_format($bmi, 2); ?></div>
            <div class="result-category">Category: <?php echo $bmi_category; ?></div>
            <div class="bmi-scale">
                <div class="scale-marker" style="left: <?php echo min(($bmi / 40 * 100), 100); ?>%"></div>
            </div>
        </div>

        <div class="result-card">
            <h2>TDEE Results</h2>
            <div class="result-value">Your TDEE is: <?php echo round($tdee); ?> calories/day</div>
            
            <div class="calorie-cards">
                <div class="calorie-card">
                    <h3>Weight Loss</h3>
                    <p><?php echo round($tdee - 500); ?> cal/day</p>
                </div>
                
                <div class="calorie-card">
                    <h3>Maintenance</h3>
                    <p><?php echo round($tdee); ?> cal/day</p>
                </div>
                
                <div class="calorie-card">
                    <h3>Weight Gain</h3>
                    <p><?php echo round($tdee + 500); ?> cal/day</p>
                </div>
            </div>
        </div>
    </div>

    <div class="recommendations">
        <h2>Your Personalized Recommendations</h2>
        
        <div class="recommendations-grid">
            <div class="recommendation-card">
                <h3>Recommended Exercises</h3>
                <ul>
                    <li>Mixed cardio</li>
                    <li>Strength training</li>
                    <li>Flexibility work</li>
                </ul>
                <button onclick="window.location.href='exercises.php'" class="view-button">View Exercise Details</button>
            </div>

            <div class="recommendation-card">
                <h3>Recommended Diet Plan</h3>
                <p>Based on your results, we recommend following our <?php echo $bmi_category; ?> diet plan.</p>
                <button onclick="window.location.href='diet.php'" class="view-button">View Diet Plan</button>
            </div>
        </div>
    </div>
</div>

<?php
    include 'footer.php';
} else {
    header("Location: calculator.php");
    exit();
}
?>