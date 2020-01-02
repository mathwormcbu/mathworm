<?php require_once('maintance/header.php') ?>
<div class="container" align="center">
	<div class="col-md-3 mt-4 mb-4">
		<select class="form-control" id="exampleFormControlSelect1">
			<option value="0">Lütfen Tarih Seçiniz</option>
			<?php
			foreach ($dates as $row) {
				?>
				<option value="<?= $row['testID'] ?>"><?= $row['testDate']?></option>
				<?php
			}
			?>
			<option value="all">Genel Ortalama</option>
		</select>
	</div>
	<div class="col-md-6 mt-4 mb-4" id="table">
	
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
<?php require_once('maintance/footer.php') ?>
<script type="text/javascript">
	function setChart(a,b,c,d,e,f,g,h,i,j) {
		var ctx = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['Rasyonel Sayılar', 'Kümeler', 'Doğal Sayılar', 'Problemler', 'Oran Orantı', 'Tam Sayılar','Yüzdeler','Cebirsel İfadeler','Ondalık Gösterim','Denklemler'],
				datasets: [{
					label: '% Başarı Oranı Yüzdesi',
					data: [a, b, c, d, e, f, g, h, i, j],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(70, 102, 50, 0.2)',
					'rgba(200, 20, 30, 0.2)',
					'rgba(44, 232, 12, 0.2)',
					'rgba(13, 12, 55, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(70, 102, 50, 0.2)',
					'rgba(200, 20, 30, 0.2)',
					'rgba(44, 232, 12, 0.2)',
					'rgba(13, 12, 55, 0.2)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	}
	$('select').on('change', function() {
		var vals = this.value;
		$.ajax({
			type:'POST',
			url:ajaxUrl,
			data:{type:'tablechange',val:vals},
			success:function(result) {
				$('#table').html('<canvas id="myChart" width="500" height="400"></canvas>')
				setChart(result.rates['1'],result.rates['2'],result.rates['3'],result.rates['4'],result.rates['5'],result.rates['6'],result.rates['7'],result.rates['8'],result.rates['9'],result.rates['10'])
			}
		})
	});
</script>