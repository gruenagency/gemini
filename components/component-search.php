<?php

/**
 * Component to display an inline search bar, used for filters
 */

$search_query = get_search_query() ? get_search_query() : '';
?>

<div class="u-marginBottom8gu search-form">
  <label class="screen-reader-text" for="s">
    <span class="search-form__label u-block u-marginBottom2gu p--small">Search:</span>
    <input class="search-form__input" type="text" value="<?php echo $search_query; ?>" name="s" id="s" />
  </label>
  <input type="submit" id="searchsubmit" class="button button--submit button--submit--inline button--simple-icon--primary" value="" />

</div>