<div class="wrap">
<h2>PadiAct - Increase Email Subscription</h2>

<p>In order to start using PadiAct on your website just fill in your <b>PadiAct ID</b> below.
</p>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('padiact'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">PadiAct ID:</th>
<td><input type="text" name="padiact_code" value="<?php echo get_option('padiact_code'); ?>" /></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
<h3>How to get you PadiAct ID code</h2>
<ol>
<li>Login to your <a href="http://my.padiact.com">PadiAct Account</a></li>
<li>Click on <b>JavaScript Code</b> under <b>Useful links</b> on the dashboard area.</li>
<li>Get the PadiAct ID from the sidebar</li>
</ol>
</div>
