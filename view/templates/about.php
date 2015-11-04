<?php $title = 'Обо мне'; ?>

<?php ob_start() ?>

<h2><a href="../" class="fa fa-chevron-left"></a> Обо мне</h2>
<hr>
	<ul>
		<li>Sergei Novitskov</li>
		<li>2KTVRp15</li>
	</ul>

<?php $content = ob_get_clean(); ?>

<?php include "view/templates/layout.php";