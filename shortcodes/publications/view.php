<!--
It was a prototype that I use as reference at the moment

TODO: delete this  unused file
-->
<?php
  $publications = get_query_var('epfl_infoscience_search_grouped_by_publications');
  $url = get_query_var('epfl_infoscience_search_url');
  $format = get_query_var('epfl_infoscience_search_format');
  $summary = get_query_var('epfl_infoscience_search_summary');
  $thumbnail = get_query_var('epfl_infoscience_search_thumbnail');
?>

<div class="list-group mb-5">
    <?php
    # parsing all
      foreach($publications['group_by'] as $grouped_by_publications) {
        # do we have a groupby title ?
        if ($grouped_by_publications['label']) {
          echo '<h1>' . $grouped_by_publications['label'] . '</h1>';
        }
        # parsing groupby lvl1 data
        foreach($grouped_by_publications['values'] as $grouped_by2_publications) {
          if ($grouped_by2_publications['label'] && !$grouped_by_publications['label']) {
            echo '<h1>' . $grouped_by2_publications['label'] . '</h1>';
          } else {
            echo '<h2>' . $grouped_by2_publications['label'] . '</h2>';
          }

          foreach($grouped_by2_publications['values'] as $index3 => $publication) {
    ?>
    <div class="list-group-item list-group-item-publication">
      <div class="row">
        <?php if ($publication['url']['icon'][0]): ?>
          <div class="col-md-10">
          <img src="<?php echo $publication['url']['icon'][0] ?>" class="float-left mr-3" alt="publication thumbnail">
        <?php endif ?>
        <div class="col-md-10">
          <h4 class="h5"><?php echo $publication['title'][0] ?></h4>
          <p class="text-muted small mb-0 tex2jax_process">
          <?php if ($summary): ?>
            <?php echo $publication['summary'][0] ?><br>
          <?php endif ?>
            Author(s): 
            <?php foreach ($publication['author'] as $author) { ?>
              <a class="text-muted no-tex2jax_process" href="<?php echo $author['search_url'] ?>" href="_blank"><?php echo $author['initial_name'] ?></a><?php if ($author !== end($publication['author'])) echo ','; ?>
            <?php } ?>
          </p>
        </div>
        <div class="col-md-2 text-right mt-4 mt-md-0">
          <p>
            <a href="//infoscience.epfl.ch/record/<?php echo $publication['record_id'][0] ?>" class="btn btn-secondary btn-sm" target="_blank">Detailed record</a>
          </p>
          <?php if ($publication['url']['fulltext'][0]): ?>
            <p class="text-muted small mb-0">
            <?php if ($publication['url']['fulltext'][0]): ?>
              <a class="text-muted" href="<?php echo $publication['url']['fulltext'][0] ?>" target="_blank">Full text</a>
            <?php endif ?>
            <?php if ($publication['doi'][0]): ?>
              <?php if ($publication['url']['fulltext'][0]) echo " - "; ?>
              <a class="text-muted" href="https://dx.doi.org/<?php echo $publication['doi'][0] ?>" target="_blank">View at publisher</a>  
            <?php endif ?>
            </p>
          <?php endif ?>
        </div>
      </div>
    </div>
    <?php
          }
        }
      }
    ?>
  </div>
</div>

<?php if ($url): ?>
<p class="text-center">
  <a class="link-pretty" href="<?php echo $url ?>">See all publications</a>
</p>
<?php endif ?>
