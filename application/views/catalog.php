<div class="catalogBody">

    <!--  the area for all accessories to be overlayed on a pizza crust -->
    <div class="layer">
        <!-- The pizza crust for adding ingrediants on  -->
        <img id="pizzacrust" src="/assets/images/crust.png" alt="PizzaCrust">
        {pizzaLayers}
    </div>


    <!--All the ingrediants to be added on the pizza-->
    <div id="allIngrediants" class="ingrediants">
        {ingredients}
        <form role="form" action="/catalog/save" method="post" >
            {formFields}
            <input id="pizzaName" name="pizzaName" type="text" placeholder="Pizza Name" required>
            <input id="customizesave" class="myButton" type="submit" value="Save">
        </form>


    </div>


</div>

<script>

    function setVisibility(img) {
        var IDs = img.id.split("/")
        var ctgId = IDs[0]
        var ascId = IDs[1]

        //Unset old accessory
        var old = document.getElementById(ctgId + " form").value
        if (old)
        {
            document.getElementById(ctgId + "/" + old).style.visibility = 'hidden'
        }

        //Set new image, and reset form
        document.getElementById(img.id).style.visibility = 'visible'
        document.getElementById(ctgId + " form").value = ascId
    }
</script>