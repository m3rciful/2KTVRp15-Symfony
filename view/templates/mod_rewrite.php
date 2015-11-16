<?php $title = 'TEST'; ?>

<?php ob_start() ?>

<?php
	// GET LOCAL IP
	$command="/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
	$localIP = exec ($command);

	if(!function_exists('apache_get_modules') )
	{ 
		phpinfo(); 
		exit; 
	}
	$style = 'alert-danger';
	$res = 'Module Unavailable';

	if(in_array('mod_rewrite',apache_get_modules())) 
	{
		$style = 'alert-success';
		$res = 'Module Available';
	}

?>

<h2><a href="./" class="fa fa-chevron-left"></a> A mod_rewrite availability check!</h2>
<hr>
<div class="col-sm-8">

<div class="alert <?php echo $style; ?>" role="alert">
	<?php echo apache_get_version(), ' mod_rewrite: '.$res; ?> 
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">How to enable <b>mod_write</b> on Apache2</h3>
  </div>
  <div class="panel-body">
    To enable and load mod_rewrite, do the rest of steps.
    <div class="well well-sm">a2enmod rewrite</div>
    Finally, restart Apache2.
    <div class="well well-sm">service apache2 restart</div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">How remove <b>index.php</b> from url</h3>
  </div>
  <div class="panel-body">
  	<p>Go to <b>.htaccess</b> file, and try to modify to be:</p>
    <div class="well well-sm">
		RewriteEngine on<br><br>

		# if a directory or a file exists, use it directly<br>
		RewriteCond %{REQUEST_FILENAME} !-f<br>
		RewriteCond %{REQUEST_FILENAME} !-d<br><br>

		# otherwise forward it to index.php<br>
		RewriteRule . index.php
    </div>
  </div>
</div>

<blockquote><footer>Local IP: <?php echo $localIP; ?></footer></blockquote>

</div>
<?php $content = ob_get_clean(); ?>

<?php include "view/templates/layout.php";