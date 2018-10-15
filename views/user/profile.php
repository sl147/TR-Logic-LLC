<?php include 'views/layouts/header.php';?>
<div class="text-center col-lg-3 col-md-3 col-sm-0 col-xs-0"></div>
<div class="text-center col-lg-5 col-md-5 col-sm-12 col-xs-12">
	<h3 class="text-center">Профайл клиента с логином <?= $user['user_login']?></h3>
	<table class="table table-bordered table-striped table-hover">
		<tbody>
			<?php foreach ($userMetas as $meta):?>
				<tr>
					<td><?= User::getMetaNameById($meta['user_meta'])?></td>
					<td><?= $meta['value']?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php include 'views/layouts/footer.php';?>