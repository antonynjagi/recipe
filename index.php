<?php include_once("header.php"); ?>

<style>
    .main {
        padding: 20px;
    }
    .card {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    height: 100%;
    position: relative; /* Position relative to contain absolute children */
}

.card-img-top {
    object-fit: cover;
    height: 150px; /* Adjust height as needed */
}

.card-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.card-text {
    font-size: 1rem;
    line-height: 1.6;
    opacity: 0;
    max-height: 0;
    overflow: hidden;
    transition: opacity 0.3s ease-in-out, max-height 0.3s ease-in-out;
    margin-bottom: 1rem; /* Adds space between text and button */
}

.card:hover .card-text {
    opacity: 1;
    max-height: 200px; /* Adjust based on content height */
}

.btn-check-recipes {
    background-color: #007bff;
    border: none;
    color: white;
    padding: 10px 20px;
    font-size: 1rem;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.btn-check-recipes:hover {
    background-color: #0056b3;
}


</style>

<div class="container-lg main">
    <div class="row mt-4">
        <?php foreach($responseArray['categories'] as $object) { ?>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-3">
                <div class="card single-card">
                    <img src="<?php echo $object['strCategoryThumb']; ?>" class="card-img-top" alt="<?php echo $object['strCategory']; ?>">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $object['strCategory']; ?></h3>
                        <div class="card-text">
                            <?php echo $object['strCategoryDescription']; ?>
                        </div>
                        <a href="recipe_list.php?cat=<?php echo $object['strCategory']; ?>" class="btn-check-recipes">
                            Check Recipes
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php include_once("footer.php"); ?>
