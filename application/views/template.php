<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{pagetitle}</title>
    <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/default.css"/>

    <!--        CSS for background and some text-->
    <link rel="stylesheet" type="text/css" media="all" href="/css/reset.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="/css/text.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="/css/style.css"/>
    <!--        <link rel="stylesheet" type="text/css" media="all" href="/css/style1.css" />-->


    <!-- <link rel="stylesheet" type="text/css" media="all" href="../css/lightbox.css" /> -->

</head>
<body>
<div id="container">
    <div class="grace1">
        <ul>
            <li><a>{pagetitle}</a></li>
            <li class="home"><a href="/homepage">Home</a></li>
            <li class="tutorials"><a href="/catalog">Catalogs</a></li>
            <a href="javascript:void(0)" class="gracedropbtn">User Role</a>
            <div class="gracedropdown-content">
                <li><a href="/roles/actor/Guest">Guest</a></li>
                <li><a href="/roles/actor/User">User</a></li>
                <li><a href="/roles/actor/Admin">Admin</a></li>
            </div>

        </ul>
    </div>
    <div class="title-container">

    </div>
    {content}
</div>

</body>
</html>
