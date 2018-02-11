<!DOCTYPE html>
<html>
<head>
	<title>PIZZA!</title>
</head>
<body>

<!-- dynamically shows sets data in database-->
<!-- change this to dropdown list-->
<?php $count = -1;
    foreach ($sets as $set):
        if ($count < $set->id):
            $count = $set->id;?>
        <h2><?php echo $sets[$count]->name; ?></h2>
    <?php endif; ?>
<?php endforeach; ?>

</body>
</html>
