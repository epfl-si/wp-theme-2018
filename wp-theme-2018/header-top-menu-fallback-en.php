<ul aria-hidden="true" class="nav-header d-none d-xl-flex">
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
    <?php if (!get_option( 'epfl_hide_coronavirus_info_header', false ) == "1"): ?>
    <li id="menu-item-0">
        <a style="color:#ff0000;" href="https://www.epfl.ch/campus/security-safety/en/health/coronavirus-covid19/">Coronavirus Info</a>
    </li>
    <?php endif; ?>
</ul>
