<?php
    $url = get_query_var('epfl_tableau-url');
    $width = get_query_var('epfl_tableau-width');
    $height = get_query_var('epfl_tableau-height');
?>


<script type='text/javascript' src='https://tableau.epfl.ch/javascripts/api/viz_v1.js'></script>
<div class="container my-3">
    <div class='tableauPlaceholder' style='width: <?php echo esc_attr($width) ?>px; height: <?php echo esc_attr($height) ?>px;'>
        <object class='tableauViz' width='<?php echo esc_attr($width) ?>' height='<?php echo esc_attr($height) ?>' style='display:none;'>
            <param name='host_url' value='https%3A%2F%2Ftableau.epfl.ch%2F' />
            <param name='embed_code_version' value='3' />
            <param name='site_root' value='' />
            <param name='name' value='<?php echo esc_attr($url) ?>' />
            <param name='tabs' value='no' />
            <param name='toolbar' value='yes' />
            <param name='showAppBanner' value='false' />
            <param name='filter' value='iframeSizedToWindow=true' />
        </object>
    </div>
</div>

<!-- original code
<script type='text/javascript' src='https://tableau.epfl.ch/javascripts/api/viz_v1.js'></script>
<div class='tableauPlaceholder' style='width: 1316px; height: 992px;'>
    <object class='tableauViz' width='1316' height='992' style='display:none;'>
        <param name='host_url' value='https%3A%2F%2Ftableau.epfl.ch%2F' />
        <param name='embed_code_version' value='3' />
        <param name='site_root' value='' />
        <param name='name' value='EPFLofficialstatistics&#47;StatistiquesOfficielles' />
        <param name='tabs' value='no' />
        <param name='toolbar' value='yes' />
        <param name='showAppBanner' value='false' />
        <param name='filter' value='iframeSizedToWindow=true' />
    </object>
</div>

other versions 

<script type='text/javascript' src='https://tableau.epfl.ch/javascripts/api/viz_v1.js'></script>
<div class='tableauPlaceholder' style='width: 1920px; height: 841px;'>
    <object class='tableauViz' width='1920' height='841' style='display:none;'>
        <param name='host_url' value='https%3A%2F%2Ftableau.epfl.ch%2F' />
        <param name='embed_code_version' value='3' />
        <param name='site_root' value='' />
        <param name='name' value='UMR2018Analytics&#47;Story1' />
        <param name='tabs' value='no' />
        <param name='toolbar' value='yes' />
        <param name='showAppBanner' value='false' />
        <param name='filter' value='iframeSizedToWindow=true' />
    </object>
</div>
-->

<!-- sample
<div class='tableauPlaceholder' id='viz1541060418729' style='position: relative'>
    <noscript>
        <a href='#'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Gl&#47;GlobalRankings-EPFL&#47;Completevisualization&#47;1_rss.png' style='border: none' /></a>
    </noscript>
    <object class='tableauViz' style='display:none;'>
        <param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' />
        <param name='embed_code_version' value='3' />
        <param name='site_root' value='' />
        <param name='name' value='GlobalRankings-EPFL&#47;Completevisualization' />
        <param name='tabs' value='no' />
        <param name='toolbar' value='yes' />
        <param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Gl&#47;GlobalRankings-EPFL&#47;Completevisualization&#47;1.png' />
        <param name='animate_transition' value='yes' />
        <param name='display_static_image' value='yes' />
        <param name='display_spinner' value='yes' />
        <param name='display_overlay' value='yes' />
        <param name='display_count' value='yes' />
        <param name='filter' value='publish=yes' />
    </object>
</div>
<script type='text/javascript'>
    var divElement = document.getElementById('viz1541060418729');
    var vizElement = divElement.getElementsByTagName('object')[0];
    vizElement.style.width = '625px';
    vizElement.style.height = '991px';
    var scriptElement = document.createElement('script');
    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';
    vizElement.parentNode.insertBefore(scriptElement, vizElement);
</script>
-->