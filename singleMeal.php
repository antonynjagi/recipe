<?php include_once("header.php"); ?>




<style>
    .main {
        padding: 20px;
    }
    .card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-img-top {
        object-fit: cover;
        height: 200px;
    }
    .card-body {
        padding: 20px;
    }
    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }
    .card-text {
        font-size: 1rem;
        line-height: 1.6;
    }
    .ingredients-table {
        margin-bottom: 1rem;
        width: 100%;
    }
    .ingredients-table td {
        padding: 8px;
        border-top: 1px solid #ddd;
    }
    .ingredients-table th {
        background-color: #f8f9fa;
    }
   
</style>

<div class="container-lg main">
    <h2 class="my-title mt-3 text-center">Recipe Details</h2>
    <div class="row mt-4">
        <?php foreach($responseArray1['meals'] as $object) { ?>
            <div class="col-lg-6 col-md-8 mx-auto mb-4">
                <div class="card single-card">
                    <img src="<?php echo $object['strMealThumb']; ?>" class="card-img-top" alt="<?php echo $object['strMeal']; ?>">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $object['strMeal']; ?></h3>
                        <h3 class="card-title">Origin: <?php echo $object['strArea']; ?></h3>
                        <h4>Ingredients</h4>
                        <table class="ingredients-table">
                            <?php 
                            for($i = 1; $i <= 20; $i++) {
                                $ingredientno = $object['strIngredient'.$i];
                                $measureno = $object['strMeasure'.$i];
                                if (!empty($ingredientno) && $ingredientno != "null") {
                            ?>
                                <tr><td><?php echo $ingredientno; ?></td><td><?php echo $measureno; ?></td></tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                        <h4>Instructions</h4>
                        <div class="card-text single-card-text">
                            <?php 
                            $instructions = htmlspecialchars($object['strInstructions']);
                            $instructionsWithParagraphs = '<p>' . implode('</p><p>', explode("\n", $instructions)) . '</p>';
                            echo $instructionsWithParagraphs;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include_once("footer.php"); ?>
