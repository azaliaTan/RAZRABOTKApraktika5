<h3>Добавить новость</h3>


<?php 

if(isset($_POST['add'])){
    $title=$_POST['title'];
    $text=$_POST['text'];
    $kat=$_POST['kat'];


    
    $error_t='';
    $error_x='';
    $error_k='';

 if($title === ''){
        $error_t = "Введите заголовок новости!";
}

if($text === ''){
    $error_x= "Введите текст новости!";
}

if($kat === '0'){
    $error_k= "Выберите категорию новости!";
}

if(empty($error_t) && empty($error_x) && empty($error_k)){
    $sql="INSERT INTO news (`title`,`text`,`category_id`)
    VALUE ('$title','$text','$kat')";
     $link ->query($sql);
     echo '<script>document.location.href="?"</script>';
     
}

}

?>

<form method="POST" name="add" id="w">

<div class="form_a">
    <label for="title">Заголовок новости</label>
    <input type="text" name="title"  value="<?=$title?>">
    <a><?php if(isset($error_t)){echo $error_t;}?></a>
</div>
<div class="form_a">
    <label for="text">Текст новости</label>
    <input type="text" name="text" value="<?=$text?>">
    <a><?php if(isset($error_x)){echo $error_x;}?></a>
</div>

<div class="form_a">
    <label for="kat">Категория новости</label>
    <select name="kat" id="">
    <option value="0">Выберите из списка</option>
        <?php 

        $sql="SELECT * FROM kat";
        $result=$link->query($sql);
        foreach($result as $kat){?>
            <option value="<?=$kat['id']?>"><?=$kat['name']?></option>
      <?  }
        
        ?>
    </select>
    <a><?php if(isset($error_k)){echo $error_k;}?></a>
</div>

<input type="submit" value="добавить" class="lll" name="add">

</form>

