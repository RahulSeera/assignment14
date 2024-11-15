<?php include 'header.php'; ?>

<div class="exercises-container">
    <h1>Exercise Plans</h1>
    
    <div class="search-bar">
        <form method="GET" action="exercises.php">
            <input type="number" name="calories" placeholder="Search by calories..." value="<?php echo isset($_GET['calories']) ? $_GET['calories'] : ''; ?>">
            <button type="submit">Search</button>
        </form>
    </div>
    
    <div class="exercises-grid">
        <?php
        $exercises = [
            [
                'name' => 'Running',
                'calories' => 600,
                'image' => 'images/running.jpg',
                'description' => '60 minutes of jogging at moderate pace'
            ],
            [
                'name' => 'Swimming',
                'calories' => 500,
                'image' => 'images/swimming.jpg',
                'description' => '45 minutes of freestyle swimming'
            ],
            [
                'name' => 'Cycling',
                'calories' => 400,
                'image' => 'images/cycling.jpg',
                'description' => '60 minutes of moderate cycling'
            ]
        ];
        
        $filtered_exercises = $exercises;
        if (isset($_GET['calories'])) {
            $target_calories = $_GET['calories'];
            $filtered_exercises = array_filter($exercises, function($exercise) use ($target_calories) {
                return $exercise['calories'] <= $target_calories;
            });
        }
        
        foreach ($filtered_exercises as $exercise) {
            echo "<div class='exercise-card'>
                    <img src='{$exercise['image']}' alt='{$exercise['name']}'>
                    <h3>{$exercise['name']}</h3>
                    <p>Calories: {$exercise['calories']}</p>
                    <p>{$exercise['description']}</p>
                  </div>";
        }
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>