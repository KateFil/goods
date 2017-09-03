<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?//
//echo '<pre>';
//print_r($query);
//echo '</pre>';
//?>
    <div class="table-responsive ">
        <table class="table table-striped table-bordered " >
            <tr class="info">
                <th>&#8470;</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price, y.e.</th>
                <th>Delete</th>
            </tr>
    <?php
    $i = 0;
    foreach ($query as $val){
        $i += 1;
    ?>
            <tr data-id="<?=$val->id?>">
                <td><?=$i?></td>
                <td class="goods" data-col="name"><?=$val->name?></td>
                <td class="goods" data-col="description"><?=$val->description?></td>
                <td class="goods" data-col="price"><?=$val->price?></td>
                <td class='delete'><button class='delete'>&#10008</button></td>
            </tr>

    <?php
    }
    ?>
        </table>
    </div>


<form action="" id="formAdd" class="form-horizontal">
    <fieldset>
        <legend>Форма для добавления товара</legend>
        <div  class="form-group">
            <label for="name" class="col-sm-2 control-label">Название товара: </label>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Описание товара: </label>
            <div class="col-sm-10">
                <input  type="text" name="description" id="description" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-sm-2 control-label">Цена товара: </label>
            <div class="col-sm-10">
                <input type="text"  name="price" id="price" class="form-control"/>
            </div>
        </div>

       <div class="form-group">
           <div class="col-sm-12">
               <input type="button" value="Добавить" id="add" class="btn btn-info"/>
           </div>
       </div>
    </fieldset>
</form>
