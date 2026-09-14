    <?php
    if (is_plugin_active('epfl-intranet/epfl-intranet.php')) {
    ?>
    <li id="menu-item-1">
        <a class="nav-item" href="https://inside.epfl.ch/fr/">Inside</a>
    </li>
    <?php
    } else {
	?>
    <li id="menu-item-1">
        <a class="nav-item" href="https://www.epfl.ch/about/fr/">À propos</a>
    </li>
    <li id="menu-item-2">
        <a class="nav-item" href="https://www.epfl.ch/education/fr/">Éducation</a>
    </li>
    <li id="menu-item-3">
        <a class="nav-item" href="https://www.epfl.ch/research/fr/">Recherche</a>
    </li>
    <li id="menu-item-4">
        <a class="nav-item" href="https://www.epfl.ch/innovation/fr/">Innovation</a>
    </li>
    <li id="menu-item-5">
        <a class="nav-item" href="https://www.epfl.ch/schools/fr/">Facultés</a>
    </li>
    <li id="menu-item-6">
        <a class="nav-item" href="https://www.epfl.ch/campus/fr/">Campus</a>
    </li>
    <?php
    }
	?>
