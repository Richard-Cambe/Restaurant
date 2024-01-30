<div class="allCategories">
    <?php
    foreach ($query as $data) { ?>


        <div class='category'>
            <img src="./assets/img/<?= $data['cat_pic'] ?>">
            <h3><?= $data['cat_name'] ?></h3>
            <p><?= $data['cat_desc'] ?></p>
            <a href='?path=catprod&categorie_id=<?= $data['id'] ?>'><button> Voir les produits </button></a>
            <form action='?path=catdelete' method='POST'><input type='hidden' id='id' name='id' value='<?= $data['id'] ?>'>
                <?php if (isset($_SESSION['user']['is_admin']) &&  $_SESSION['user']['is_admin'] === 1) { ?>
                    <button> DELETE <?php } ?>
            </form>
        </div>
    <?php } ?>
</div>

<?php if (isset($_SESSION['user']['is_admin']) &&  $_SESSION['user']['is_admin'] === 1) {
?>
    <form class="creation" action="?path=home" method="POST">
        <ul>
            <li>
                <input type="file" id="cat_pic" name="cat_pic">
            </li>
            <li>
                <label for="cat_name">Nom</label>
                <input type="text" id="cat_name" name="cat_name" />
            </li>
            <li>
                <label for="cat_desc">Description</label>
                <input type="text" id="cat_desc" name="cat_desc" />
            </li>
            <input type="submit" value="Ajouter Categorie">
        </ul>
    </form>
<?php } ?>
</body>