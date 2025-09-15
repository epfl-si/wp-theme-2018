    <?php
    if (is_plugin_active('epfl-intranet/epfl-intranet.php')) {
    ?>
    <li id="menu-item-1">
        <a class="nav-item" href="https://inside.epfl.ch/">Inside</a>
    </li>
    <?php
    } else {
	?>
    <li id="menu-item-1">
        <a class="nav-item" href="https://www.epfl.ch/about/">About</a>
    </li>
    <li id="menu-item-2">
        <a class="nav-item" href="https://www.epfl.ch/education/">Education</a>
    </li>
    <li id="menu-item-3">
        <a class="nav-item" href="https://www.epfl.ch/research/">Research</a>
    </li>
    <li id="menu-item-4">
        <a class="nav-item" href="https://www.epfl.ch/innovation/">Innovation</a>
    </li>
    <li id="menu-item-5">
        <a class="nav-item" href="https://www.epfl.ch/schools/">Schools</a>
    </li>
    <li id="menu-item-6">
        <a class="nav-item" href="https://www.epfl.ch/campus/">Campus</a>
    </li>
    <?php
    }
	?>
