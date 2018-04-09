<div class="homepageBody">

    <!--  the area for all accessories to be overlayed on a pizza crust -->
    <div class="layer">
        <!-- The pizza crust for adding ingrediants on  -->
        <img id="pizzacrust" src="/assets/images/crust.png" alt="PizzaCrust">
        {toppings}
    </div>

    <!-- hard coded for this assignment-->
    <div class="preset">
        {sets}
        <a href="/homepage/display/{id}">
            <button id="{id}" class="myButton">
                {name}
            </button>
            <br />
        </a>
        {/sets}
        <div>
            <h3>{calories}</h3>
            <h3>{protein}</h3>
            <h3>{carbohydrates}</h3>
        </div>
    </div>
</div>