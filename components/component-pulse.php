<!-- Customer Review Block -->
<?php
    $pulse = get_field('pulse_code', 'options');
?>
<div class="popup--button">
    <h5>Read Our</h5>
  <h4>Reviews</h4>
</div>
<div class="popup">
    <div class="popup--body">
        <?php echo $pulse; ?>  
    </div>
    <div class="popup--close">
        <h6>Close</h6>
    </div>
</div>