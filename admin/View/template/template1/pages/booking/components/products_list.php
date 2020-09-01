<?php
    foreach($booking -> getProductsCategory() as $prodCategory){
        ?>
        <optgroup label="<?= $prodCategory['name'] ?>">
            <?php
            foreach($booking -> getProducts() as $book){
                if(($prodCategory['name'] == $book['name']) && $book['material_state'] == 1){
                    ?> <option value="<?= $book['reference'] ?>"><?= $book['name'] ?></option> <?php
                }
            }
            ?>
        </optgroup>
        <?php
    }
?>