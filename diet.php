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
                'image' => 'https://media.post.rvohealth.io/wp-content/uploads/2020/04/low-carb-diet-meal-plan-and-menu-1200x628-facebook-1200x628.jpg',
                'description' => 'High protein, low carbohydrate meal plan',
                'meal_plan' => [
                    'Breakfast' => 'Scrambled eggs with spinach and avocado',
                    'Lunch' => 'Grilled chicken salad with olive oil dressing',
                    'Dinner' => 'Baked salmon with steamed broccoli and cauliflower rice'
                ],
                'ingredients' => [
                    'Eggs', 'Spinach', 'Avocado', 'Chicken breast', 'Olive oil', 'Broccoli', 'Salmon', 'Cauliflower rice'
                ]
            ],
            [
                'name' => 'Mediterranean Diet',
                'calories' => 2000,
                'image' => 'https://www.eatingwell.com/thmb/pRu9XiKz0rx6SGDPIa8lPRQHoRg=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/EW-Meal-Plans-Mediterranean-Day-05-3x2-9aa76ee89adc4c56a802a8bc3a7141c8.jpg',
                'description' => 'Rich in vegetables, fruits, and healthy fats',
                'meal_plan' => [
                    'Breakfast' => 'Greek yogurt with honey and almonds',
                    'Lunch' => 'Grilled chicken with hummus and tabbouleh',
                    'Dinner' => 'Grilled fish with roasted vegetables'
                ],
                'ingredients' => [
                    'Greek yogurt', 'Honey', 'Almonds', 'Chicken breast', 'Hummus', 'Parsley', 'Tomatoes', 'Cucumbers', 'Fish fillet'
                ]
            ],
            [
                'name' => 'High Protein Diet',
                'calories' => 2500,
                'image' => 'https://i0.wp.com/www.ultalabtests.com/blog/wp-content/uploads/2023/11/DALL%C2%B7E-2023-11-13-07.49.07-A-high-protein-food-collage-featuring-a-variety-of-meats-fish-vegetarian-and-dairy-sources.-Include-chicken-breast-beef-and-pork-tenderloin-to-re.png?resize=1024%2C585&quality=100&ssl=1',
                'description' => 'Perfect for muscle gain and recovery',
                'meal_plan' => [
                    'Breakfast' => 'Omelette with turkey breast and avocado',
                    'Lunch' => 'Grilled steak with quinoa and asparagus',
                    'Dinner' => 'Chicken breast with sweet potato and green beans'
                ],
                'ingredients' => [
                    'Eggs', 'Turkey breast', 'Avocado', 'Steak', 'Quinoa', 'Asparagus', 'Chicken breast', 'Sweet potato', 'Green beans'
                ]
            ],
            // New Diets
            [
                'name' => 'Vegan Diet',
                'calories' => 1800,
                'image' => 'https://images.everydayhealth.com/images/diet-nutrition/what-is-a-vegan-diet-benefits-food-list-beginners-guide-alt-1440x810.jpg',
                'description' => 'Plant-based, rich in vitamins, and low in fats',
                'meal_plan' => [
                    'Breakfast' => 'Oatmeal with almond milk, chia seeds, and blueberries',
                    'Lunch' => 'Lentil salad with quinoa, spinach, and avocado',
                    'Dinner' => 'Tofu stir-fry with broccoli, carrots, and bell peppers'
                ],
                'ingredients' => [
                    'Oats', 'Almond milk', 'Chia seeds', 'Blueberries', 'Lentils', 'Quinoa', 'Spinach', 'Avocado', 'Tofu', 'Broccoli', 'Carrots', 'Bell peppers'
                ]
            ],
            [
                'name' => 'Keto Diet',
                'calories' => 1600,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnSgSRjl5N7wjAbfC2PX0a1I9fJJBzlu0Kkw&s',
                'description' => 'Low carb, high fat diet for rapid weight loss',
                'meal_plan' => [
                    'Breakfast' => 'Avocado with eggs and bacon',
                    'Lunch' => 'Grilled chicken with leafy greens and olive oil',
                    'Dinner' => 'Beef steak with sautéed mushrooms and zucchini'
                ],
                'ingredients' => [
                    'Avocado', 'Eggs', 'Bacon', 'Chicken breast', 'Olive oil', 'Leafy greens', 'Beef steak', 'Mushrooms', 'Zucchini'
                ]
            ],
            [
                'name' => 'Intermittent Fasting',
                'calories' => 1500,
                'image' => 'https://cdn.shopify.com/s/files/1/2769/0704/files/Intermittent_Fasting_Header_Image_1024x1024.png?v=1674394809',
                'description' => 'Time-restricted eating to aid fat loss',
                'meal_plan' => [
                    'Breakfast' => 'Black coffee or green tea',
                    'Lunch' => 'Grilled chicken with a mixed greens salad',
                    'Dinner' => 'Salmon with a side of sautéed spinach'
                ],
                'ingredients' => [
                    'Coffee', 'Green tea', 'Chicken breast', 'Mixed greens', 'Salmon', 'Spinach'
                ]
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
                    <h4>Meal Plan</h4>
                    <ul>";
            foreach ($diet['meal_plan'] as $meal => $plan) {
                echo "<li><strong>{$meal}:</strong> {$plan}</li>";
            }
            echo "</ul>
                  <h4>Ingredients</h4>
                  <ul>";
            foreach ($diet['ingredients'] as $ingredient) {
                echo "<li>{$ingredient}</li>";
            }
            echo "</ul>
                  </div>";
        }
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>

