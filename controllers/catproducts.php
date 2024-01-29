<div class="allProducts">
<?php
foreach ($reqplat as $data) { ?>
    <div class='product'>
        <img src="./assets/img/<?= $data['pro_pic'] ?>">
        <h3><?= $data['pro_name'] ?></h3>
        <p><?= $data['pro_desc'] ?></p>
        <p><?= $data['pro_price'] ?></p>
        <form action='?path=platdelete' method='POST'><input type='hidden' id='id' name='id' value='<?= $data['id'] ?>'>
            <?php if (isset($_SESSION['user']['is_admin']) &&  $_SESSION['user']['is_admin'] === 1) { ?>
                <button>DELETE<?php } ?>
        </form>
    </div>
<?php } ?>
</div> 