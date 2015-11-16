<?php $title = 'Обо мне'; ?>

<?php ob_start() ?>

<h2><a href="./" class="fa fa-chevron-left"></a> Обо мне</h2>
<hr>
<address>
	<strong>2KTVRp Grupp</strong><br>
	1355 Market Street, Suite 900<br>
	San Francisco, CA 94103<br>
	<abbr title="Phone">P:</abbr> (123) 456-7890
</address>

<address>
	<strong>Sergei Novitskov</strong><br>
	<a href="mailto:#">merciful@hot.ee</a>
</address>

<?php $content = ob_get_clean(); ?>

<?php include "view/templates/layout.php";