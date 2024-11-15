<?php include 'header.php'; ?>

<div class="exercises-container">
    <h1>Exercise Plans for Weight Loss</h1>
    
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
                'name' => 'Running on Treadmill',
                'calories' => 600,
                'image' => 'https://th.bing.com/th/id/OIP.CqylGfLtRH7Mn_sQGvmXBAAAAA?w=223&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => '40 minutes of running at a moderate pace',
                'benefit' => 'Improves cardiovascular health and aids weight loss'
            ],
            [
                'name' => 'Jumping Jacks',
                'calories' => 500,
                'image' => 'https://th.bing.com/th/id/OIP.Lr3spF9OoJlYwRqLvhjkgQHaE7?w=237&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => '30 minutes of continuous jumping jacks',
                'benefit' => 'Full-body exercise that increases heart rate and burns fat'
            ],
            [
                'name' => 'Mountain Climbers',
                'calories' => 700,
                'image' => 'https://th.bing.com/th/id/OIP.JJsKDDogLUiq8c9O9j2lYAHaE8?w=270&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => '20 minutes of alternating knee-to-chest movements',
                'benefit' => 'Targets the core and improves stamina'
            ],
            [
                'name' => 'Burpees',
                'calories' => 750,
                'image' => 'https://th.bing.com/th/id/OIP.c0fPogIVmjnNTcLKrTdDyAAAAA?w=293&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => '30 minutes of high-intensity burpees',
                'benefit' => 'Builds endurance and burns calories rapidly'
            ],
            [
                'name' => 'Elliptical Trainer',
                'calories' => 600,
                'image' => 'https://th.bing.com/th/id/OIP.FTWuJg9Ao901Uhssggw31AHaE8?w=297&h=198&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => '45 minutes of steady-state exercise',
                'benefit' => 'Low-impact cardio ideal for fat burning'
            ],
            [
                'name' => 'Kettlebell Swings',
                'calories' => 700,
                'image' => 'https://th.bing.com/th/id/OIP.6DgvzU9F6l2IkPkiWWWyhQHaEK?w=296&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => '30 minutes of kettlebell exercises',
                'benefit' => 'Combines strength and cardio for fat loss'
            ],
            [
                'name' => 'Rowing Machine',
                'calories' => 650,
                'image' => 'https://th.bing.com/th/id/OIP.HY_8-7hlBM3hYhybIQtxLgHaFi?w=237&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => '40 minutes of steady rowing',
                'benefit' => 'Engages full body and improves endurance'
            ],
            [
                'name' => 'Cycling (Stationary Bike)',
                'calories' => 550,
                'image' => 'https://th.bing.com/th/id/OIP.JZL9_gJfObbLbdNA5cxEiwHaE7?w=253&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => '45 minutes of indoor cycling',
                'benefit' => 'Strengthens legs and promotes calorie burning'
            ],
            [
                'name' => 'Planks',
                'calories' => 300,
                'image' => 'https://th.bing.com/th/id/OIP.TwMkAgVJ20ho4ylZSYGkZwHaD7?w=282&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => 'Hold a plank position for 30–60 seconds',
                'benefit' => 'Strengthens the core, improves posture, and burns fat'
            ],
            [
                'name' => 'Squats',
                'calories' => 500,
                'image' => 'https://th.bing.com/th/id/OIP.A05D6zlkV__XyHfz85ZQjgHaJP?w=160&h=202&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => 'Perform 3 sets of 15 squats',
                'benefit' => 'Builds muscle, enhances calorie burn, and tones legs'
            ],
            [
                'name' => 'Lunges',
                'calories' => 450,
                'image' => 'https://th.bing.com/th/id/OIP.KkQlxRFVXWSSz9O5JdtOrAHaFj?w=233&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => 'Perform lunges with alternating legs',
                'benefit' => 'Improves balance, strengthens the lower body, and burns fat'
            ],
            [
                'name' => 'Push-ups',
                'calories' => 400,
                'image' => 'https://th.bing.com/th/id/OIP.MzDPXxCOSx9JQ1TC7cOcOwHaEK?w=333&h=187&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => 'Perform 3 sets of 10–20 push-ups',
                'benefit' => 'Builds upper body strength, engages core, and burns fat'
            ],
            [
                'name' => 'Jump Rope',
                'calories' => 800,
                'image' => 'https://th.bing.com/th/id/OIP.DubRX1grOq7MDiWxKC8t8wHaE8?w=248&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7',
                'description' => 'Jump rope for 20 minutes',
                'benefit' => 'Improves cardiovascular health, burns fat rapidly'
            ],
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
                    <p>Benefit: {$exercise['benefit']}</p>
                    <p>{$exercise['description']}</p>
                  </div>";
        }
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>



