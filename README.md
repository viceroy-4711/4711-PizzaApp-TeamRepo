## CodeIgniter3.1-starter4

* Comp 4711 Project - Assignment 1
* Creating an accessorization web app for pizza toppings..

This starter builds on [CodeIgniter3.1-starter3](https://github.com/jedi-academy/CodeIgniter3.1-starter3),
adding an entity model and enhancing the collection models to use it.

This starter adds a rich persistent data abstraction, initially in the form
of the CSV_Model.

An example, using menu items at a fast food place...

`data/menuitems.csv`:

    id,name,category,price
    BM,Big Mac,entree,5.25
    MF,Medium fried,side,2.00
    LF,Large fries,side,3.00

`application/models/themenu.php`:

    class Themenu extends CSV_Model {
      function __construct() {
        parent::__construct('../data/menuitems.csv','id');
      }
    }

Usage inside some controller, taking advantage of the DataMapper interface
implemented by the CSV_Model...

    $this->load->model('themenu;);
    $all_the_items = $this->themenu->all();
    ...
    // get all of the entrees
    $subset = $this->themenu->where('category','entree');
    ...
