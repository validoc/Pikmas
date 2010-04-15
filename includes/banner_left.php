<?php
if ($banner = tep_banner_exists('dynamic', 'izquierda1')) {
  ?>
<div class="banner-left banner">
    <?php echo tep_display_banner('static', $banner) ?>
</div>
  <?php  }
if ($banner = tep_banner_exists('dynamic', 'izquierda2')) {
  ?>
<div class="banner-left banner">
    <?php echo tep_display_banner('static', $banner) ?>
</div>
  <?php  } ?>
<?php
if ($banner = tep_banner_exists('dynamic', 'izquierda3')) {
  ?>
<div class="banner-left banner">
    <?php echo tep_display_banner('static', $banner) ?>
</div>
  <?php  } ?>
<?php
if ($banner = tep_banner_exists('dynamic', 'izquierda4')) {
  ?>
<div class="banner-left banner">
    <?php echo tep_display_banner('static', $banner) ?>
</div>
<?php  } ?>
<?php
if ($banner = tep_banner_exists('dynamic', 'izquierda5')) {
  ?>
<div class="banner-left banner">
    <?php echo tep_display_banner('static', $banner) ?>
</div>
<?php  } ?>