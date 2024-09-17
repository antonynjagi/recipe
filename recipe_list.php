<?php include_once("header.php"); ?>
<?php include_once("functions.php"); ?>

<?php
if (isset($_GET['cat'])) {
    $link = "https://www.themealdb.com/api/json/v1/1/filter.php?c=" . $_GET['cat'];
    $responseArray = convertIntoArray($link);
} else {
    header("Location: index.php");
    exit();
}
?>

<div class="container-lg mt-4">
    <h1 class="text-center mb-4">Recipes for <?php echo htmlspecialchars($_GET['cat']); ?></h1>
    <div class="row">
        <?php if (isset($responseArray['meals']) && !empty($responseArray['meals'])): ?>
            <?php foreach ($responseArray['meals'] as $object): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($object['strMealThumb']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($object['strMeal']); ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo htmlspecialchars($object['strMeal']); ?></h5>
                            <form action="singleMeal.php" method="get">
                                <input type="hidden" name="url" value="https://www.themealdb.com/api/json/v1/1/lookup.php?i=<?php echo htmlspecialchars($object['idMeal']); ?>">
                                <button type="submit" class="btn btn-primary">Check Recipe</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p>No recipes found for this category.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include_once("footer.php"); ?>
