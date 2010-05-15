<table width="550" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td colspan="2" align="center"><img src="/tienda/images/oferta-comuniones.gif" title="Oferta comuniones"/></td>
  </tr>
  <?php
  if ($banner = tep_banner_exists('dynamic', 'center1')) {
    ?>
  <tr>

    <td colspan="2" align="center"><?php
          echo tep_display_banner('static', $banner);
        ?></td>
  </tr>


    <?php

  }

  ?>

  <?php

  if ($banner = tep_banner_exists('dynamic', 'center2')) {

    ?>
  <tr>

    <td colspan="2" align="center"><?php
          echo tep_display_banner('static', $banner);
        ?>
    </td>
  </tr>

    <?php

  }


  ?>

  <?php

  if ($banner = tep_banner_exists('dynamic', 'baner1') || $banner = tep_banner_exists('dynamic', 'baner2')) {

    ?>
  <tr>

    <td align="center"><?php if ($banner = tep_banner_exists('dynamic', 'baner1')) {
          echo tep_display_banner('static', $banner);
        }?></td>

    <td align="center"><?php if ($banner = tep_banner_exists('dynamic', 'baner2')) {
          echo tep_display_banner('static', $banner);
        }?></td>
  </tr>


  <tr>

    <td align="center"><?php if ($banner = tep_banner_exists('dynamic', 'baner3')) {
          echo tep_display_banner('static', $banner);
        }?></td>

    <td align="center"><?php if ($banner = tep_banner_exists('dynamic', 'baner4')) {
          echo tep_display_banner('static', $banner);
        }?></td>
  </tr>

    <?php } ?>
</table>