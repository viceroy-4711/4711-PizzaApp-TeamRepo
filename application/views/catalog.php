<div class="catalogBody">

<!--  the area for all accessories to be overlayed on a pizza crust -->
    <div class="layer">
        <!-- The pizza crust for adding ingrediants on  -->
        <img id="pizzacrust" src="assets/images/crust.png" alt="PizzaCrust">

        <!-- all the accessories -->
        <?php $temp = -1; ?>
        <?php foreach ($accessories as $accessory): ?>
            <?php if($temp < $accessory->accessoryId): ?>
                <?php $temp = $accessory->accessoryId; ?>
                <img id = "<?php echo ($accessory->name)."Layer" ?>" src="<?php echo $accessory->image?>" >
            <?php endif; ?>
        <?php endforeach; ?>
    </div>


    <!--All the ingrediants to be added on the pizza-->
    <div id="allIngrediants" class="ingrediants">

        <?php $temp = -1; ?>
        <?php foreach ($accessories as $accessory): ?>
            <?php if($temp < $accessory->categoryId): ?>
                <?php $temp = $accessory->categoryId; ?>
                <h3><?php echo $categories[$temp]->name ?></h3>
            <?php endif; ?>
            <div class="tooltip">
                <img id = "<?php echo ($accessory->name) ?>" src="<?php echo $accessory->image ?>" onclick="setVisibility(this)" >
                <span class="tooltiptext">
                    <h4><?php echo $accessory->name ?></h4>
                    <p>calories: <?php echo $accessory->calories ?></p>
                    <p>protein: <?php echo $accessory->protein ?></p>
                    <p>carbohydrates <?php echo $accessory->carbohydrates?></p>
                </span>
            </div>
        <?php endforeach; ?>
    </div>

        <!-- hard coded for this assignment-->
    <div class="attributes">
        <h3>Calories: 50</h3>
        <h3>Protein: 20</h3>
        <h3>Carbohydrates:100</h3>
        <form class="" action="" method="POST">
            <input type="text" name="sauce" value="" hidden>
            <input type="text" name="cheese" value="" hidden>
            <input type="text" name="topping1" value="" hidden>
            <input type="text" name="topping2" value="" hidden>
            <input id="customizesave" class="myButton" type="submit" name="submit" value="Save">
        </form>
    </div>



</div>


<script>
    function setVisibility(img) {

        var layerId = img.id + "Layer";
        var imgLayer = document.getElementById(layerId);
        imgLayer.style.display = 'inline';
    }
</script>