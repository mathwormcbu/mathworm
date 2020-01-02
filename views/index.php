<?php require_once('maintance/header.php'); ?>

<div class="container" align="center">
	<div class="col-md-3 mt-4 mb-4">
		<button class="btn btn-success" id="starttest">Teste Başla</button><br>
		<button class="btn btn-primary mt-3" id="successtable">Başarı Tablosu</button>
	</div>
</div>
<style type="text/css">
	footer {
		position: fixed;
		left: 0px;
		width: 100%;
		bottom: 0px;
	}
</style>
<?php require_once('maintance/footer.php'); ?>
<script type="text/javascript">
	$('#successtable').click(function() {
		location.href = '<?= __URLS__ ?>ogrenci'
	});
	$('#starttest').click(function() {
		$.ajax({
			type:'POST',
			url:ajaxUrl,
			data:{type:'starttest',id:'<?= $key ?>'},
			success:function(result) {
				if(result.status == "success")
				{
					location.href = result.link;
				} else {
					console.log(result);
				}
			}
		})
	});
</script>