<?php include 'header.php'; ?>

<div class="calculator-container">
    <h1>BMI & TDEE Calculator</h1>
    
    <form method="POST" action="calculate.php">
        <div class="form-group">
            <label for="height">Height (cm):</label>
            <input type="number" id="height" name="height" required>
        </div>
        
        <div class="form-group">
            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" name="weight" required>
        </div>
        
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
        </div>
        
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="activity">Activity Level:</label>
            <select id="activity" name="activity" required>
                <option value="1.2">Sedentary</option>
                <option value="1.375">Light Exercise</option>
                <option value="1.55">Moderate Exercise</option>
                <option value="1.725">Heavy Exercise</option>
                <option value="1.9">Athlete</option>
            </select>
        </div>
        
        <button type="submit">Calculate</button>
    </form>
</div>

<?php include 'footer.php'; ?>