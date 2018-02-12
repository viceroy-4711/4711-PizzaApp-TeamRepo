<div class="homepageBody">

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

    <!-- hard coded for this assignment-->
    <div class="preset">
        <?php $temp = -1; ?>
        <?php foreach ($sets as $set): ?>
            <?php if($temp < $set->id): ?>
                <?php $temp = $set->id; ?>
                <button id = "<?php echo $set->id ?>" class="myButton" onclick="displayPreset(this)"><?php echo $set->name ?></button>
            <?php endif; ?>
        <?php endforeach; ?>
        <!--  <input id="customizesave" class="myButton" type="submit" name="submit" value="Classic Pizza"> -->
      <div>
        <h3>Calories: 50</h3>
        <h3>Protein: 20</h3>
        <h3>Carbohydrates:100</h3>
      </div>
    </div>
</div>


<script>
    var sets = {};
    <?php $temp = -1; ?>
    <?php foreach ($sets as $set): ?>
        <?php if($temp < $set->id): ?>
            <?php $temp = $set->id; ?>
            sets[<?php echo $set->id ?>] = {};
            sets[<?php echo $set->id ?>].sauce = '<?php echo $accessories[$set->sauce]->name ?>';
            sets[<?php echo $set->id ?>].cheese = '<?php echo $accessories[$set->cheese]->name ?>';
            sets[<?php echo $set->id ?>].topping1 = '<?php echo $accessories[$set->topping1]->name ?>';
            sets[<?php echo $set->id ?>].topping2 = '<?php echo $accessories[$set->topping2]->name ?>';

    <?php endif; ?>
    <?php endforeach; ?>

    // Function to display preset pizza information
    function displayPreset(button) {
        Array.prototype.slice.call(document.querySelectorAll('.layer img'), 1).forEach(function(img) {img.style.display = 'none';} )

        var setId = button.id;
        var sauceLayer = sets[setId].sauce + 'Layer';
        var cheeseLayer = sets[setId].cheese + 'Layer';
        var topping1Layer = sets[setId].topping1 + 'Layer';
        var topping2Layer = sets[setId].topping2 + 'Layer';

        document.getElementById(sauceLayer).style.display = 'inline';
        document.getElementById(cheeseLayer).style.display = 'inline';
        document.getElementById(topping1Layer).style.display = 'inline';
        document.getElementById(topping2Layer).style.display = 'inline';

    }
</script>