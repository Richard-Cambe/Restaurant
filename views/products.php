<div class="allProducts">
    <?php
    foreach ($query as $data) { ?>
        <div class='product'>
            <img src="./assets/img/<?= $data['pro_pic'] ?>">
            <h3><?= $data['pro_name'] ?></h3>
            <p><?= $data['pro_desc'] ?></p>
            <p><?= $data['pro_price'] ?></p>
            <form action="?path=panier" method="POST"><button>Ajouter au panier</button></form>
            <form action='?path=platdelete' method='POST'><input type='hidden' id='id' name='id' value='<?= $data['id'] ?>'>
                <?php if (isset($_SESSION['user']['is_admin']) &&  $_SESSION['user']['is_admin'] === 1) { ?>
                    <button>Supprimer<?php } ?>
            </form>
        </div>
    <?php } ?>
</div>
<?php
if (isset($_SESSION['user']['is_admin']) &&  $_SESSION['user']['is_admin'] === 1) { ?>
    <form class="creation" action="?path=products" method="POST">
        <ul>
            <li>
                <input type="file" id="pro_pic" name="pro_pic">
            </li>
            <li>
                <select id="cat_id" name="cat_id">
                    <?php $reqCat = "SELECT * FROM categories ORDER BY id";
                    $reqCatAns = $bdd->query($reqCat);
                    $catData = $reqCatAns->fetchAll();
                    
                    foreach ($catData as $data) { ?>
                        <option value="<?= $data['id']?>"><?=$data['cat_name']?></option>
                    <?php } ?>
                </select>
            </li>
            <li>
                <label for="pro_name">Nom</label>
                <input type="text" id="pro_name" name="pro_name" />
            </li>
            <li>
                <label for="pro_desc">Description</label>
                <input type="text" id="pro_desc" name="pro_desc" />
            </li>
            <li>
                <label for="pro_price">Prix</label>
                <input type="float" id="pro_price" name="pro_price" />
            </li>
            <input type="submit" value="Ajouter Produit">
        </ul>
    </form>

<?php } ?>