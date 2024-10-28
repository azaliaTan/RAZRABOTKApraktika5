<form method="POST" name="search" id="ww">
    <input type="text" name="name" placeholder="Введите название новости">
    <input type="submit" name="search" value="найти" class="ree">
</form>

<div class="katt">
    <p>Выберите категорию:</p>
    
        <?php 
        $sql="SELECT * FROM kat";
        $result_cat=$link->query($sql);
        foreach($result_cat as $kat){?>
               <a href="?&katt=<?= $kat['id'] ?>"> <?= $kat['name'] ?></a>
        <?php } ?>
        <a href="?"> все новости</a>
        
    
</div>

<div class="list">
<?php 

$sql = "SELECT * FROM `news` WHERE 1=1"; 


if (isset($_GET['katt']) && $_GET['katt'] !== '') {
    $id_katt = $_GET['katt'];
    $sql .= " AND `category_id`='$id_katt'";
}

if (isset($_POST['search'])) {
   
    $searchName = $_POST['name'];
    $searchName = $link->quote("%$searchName%"); 
    $sql .= " AND `title` LIKE $searchName";
}


$result = $link->query($sql);
if ($result && $result->rowCount() > 0) {
    foreach ($result as $new) { ?>
        <div class="one_list">
            <p class="title"><?= $new['title'] ?></p>
            <p class="text"><?= $new['text'] ?></p>
            <?php 
            $id_cat = $new['category_id'];
            $kat = $link->query("SELECT * FROM kat WHERE `id`='$id_cat'")->fetch(2);
            ?>
            <p class="kat">Категория: <?= $kat['name'] ?></p>
        </div>
    <?php }
} else {
    ?>
    <h4>Не найдено результатов</h4>
    <?php
}
?>
</div>