<?php include 'header.php'; ?>

<div class="diet-container">
    <h1>Diet Plans</h1>
    
    <div class="search-bar">
        <form method="GET" action="diet.php">
            <input type="number" name="calories" placeholder="Search by calories..." value="<?php echo isset($_GET['calories']) ? $_GET['calories'] : ''; ?>">
            <button type="submit">Search</button>
        </form>
    </div>
    
    <div class="diet-grid">
        <?php
        $diets = [
            [
                'name' => 'Low Carb Diet',
                'calories' => 1500,
                'image' => 'images/low-carb.jpg',
                'description' => 'High protein, low carbohydrate meal plan'
            ],
            [
                'name' => 'Mediterranean Diet',
                'calories' => 2000,
                'image' => 'images/mediterranean.jpg',
                'description' => 'Rich in vegetables, fruits, and healthy fats'
            ],
            [
                'name' => 'High Protein Diet',
                'calories' => 2500,
                'image' => 'images/high-protein.jpg',
                'description' => 'Perfect for muscle gain and recovery'
            ]
        ];
        
        $filtered_diets = $diets;
        if (isset($_GET['calories'])) {
            $target_calories = $_GET['calories'];
            $filtered_diets = array_filter($diets, function($diet) use ($target_calories) {
                return $diet['calories'] <= $target_calories;
            });
        }
        
        foreach ($filtered_diets as $diet) {
            echo "<div class='diet-card'>
                    <img src='{$diet['image']}' alt='{$diet['name']}'>
                    <h3>{$diet['name']}</h3>
                    <p>Daily Calories: {$diet['calories']}</p>
                    <p>{$diet['description']}</p>
                  </div>";
        }
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>