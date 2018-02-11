<div class="catalogBody">
    <div class="layer">
    <!-- The oizza crust for adding ingrediants on   -->
    <img id="pizzacrust" src="assets/images/crust.png" alt="PizzaCrust">

    <img id="tomatoLayer" src="assets/images/sauce_tomato.png">
    <img id="bbqLayer" src="assets/images/sauce_bbq.png">
    <img id="ranchLayer" src="assets/images/sauce_ranch.png">
    <img id="blueLayer" src="assets/images/cheese_blue.png">
    <img id="cheddarLayer" src="assets/images/cheese_cheddar.png">
    <img id="mozzarellaLayer" src="assets/images/cheese_mozzarella.png">
    <img id="anchovieLayer" src="assets/images/topping1_anchovie.png">
    <img id="pepperoniLayer" src="assets/images/topping1_pepperoni.png">
    <img id="peppersLayer" src="assets/images/topping2_peppers.png">
    <img id="mushroomsLayer" src="assets/images/topping2_mushrooms.png">

    </div>

    <!--All the ingrediants to be added on the pizza-->
    <div id="allIngrediants" class="ingrediants">
        <h3>Sauce</h3>
        <div id="sauces">
            <img id="tomato" src="assets/images/sauce_tomato.png" alt="Tomato" onclick="setVisibility(this)">
            <img id="bbq" src="assets/images/sauce_bbq.png" alt="BBQ" onclick="setVisibility(this)">
            <img id="ranch" src="assets/images/sauce_ranch.png" alt="Ranch" onclick="setVisibility(this)" >

        </div>
        <h3>Cheese</h3>
        <div id="cheese">
            <img src="assets/images/cheese_blue.png" alt="Blue" >
            <img src="assets/images/cheese_cheddar.png" alt="Cheddar" >
            <img src="assets/images/cheese_mozzarella.png" alt="Mozzarella" >
        </div>

        <h3>Topping 1</h3>
        <div id="topping1">
            <img src="assets/images/topping1_anchovie.png" alt="Anchovie" >
            <img src="assets/images/topping1_pepperoni.png" alt="Pepperoni" >
        </div>

        <h3>Topping 2</h3>
        <div id="topping2">
            <img src="assets/images/topping2_peppers.png" alt="Peppers" >
            <img src="assets/images/topping2_mushrooms.png" alt="Mushrooms" >
        </div>
    </div>

    <div class="attributes">
        <h3>Calories: 50</h3>
        <h3>Protein: 20</h3>
        <h3>Carbohydrates:100</h3>
    </div>

</div>



<script>
    function setVisibility(img) {

        var layerId = img.id + "Layer";
        var imgLayer = document.getElementById(layerId);
        imgLayer.style.display = 'inline';
    }
</script>