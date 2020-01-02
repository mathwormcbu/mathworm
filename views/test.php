<?php require_once('maintance/header.php') ?>
<button class="btn btn-success" id="testbitir" style="position: fixed;left: 24px;bottom: 24px;">Testi Bitir</button>
<button class="btn btn-warning" id="sure" style="position: fixed;right: 24px;top: 80px;">30:00</button>
<div class="container" align="center">
	<?php 
	for ($i=0; $i < count($otherQuestions); $i++) {
		?> 	
		<div class="col-md-6" align="center" style="border: 1px solid black;border-radius: 15px;padding: 15px;margin-top: 30px;">
			<?= $otherQuestions[$i]['questionText']; ?>
			<hr>
			<form id="<?= $otherQuestions[$i]['questionID'] ?>">
				
				<?php
				$answers = ['answerA','answerB','answerC','answerD'];
				for($j=0;$j<4;$j++)
				{
					$answer = $j + 1;
					?>
					<div class="form-check">
						<?php
						if($otherQuestions[$i]['trueAnswer'] === $answer) {
							?>
							<input class="form-check-input" type="radio" name="button" value="1" data-questID="<?= $otherQuestions[$i]['questionID'] ?>">
							<label class="form-check-label"><?= trim($otherQuestions[$i][$answers[$j]]); ?></label>
							<?php
						} else {
							?>
							<input class="form-check-input" name="button" type="radio" value="0" data-questID="<?= $otherQuestions[$i]['questionID'] ?>">
							<label class="form-check-label"><?= trim($otherQuestions[$i][$answers[$j]]); ?></label>
							<?php
						}
						?>
					</div>
					<?php
				}
				?>
			</form>
		</div> 
		<?php
	}
	?>
</div>


<?php require_once('maintance/footer.php') ?>
<script type="text/javascript">
	$(document).ready(function(){
         var h = 59;
         var s = 59;
         function testibitir(){
         	$.ajax({
         		type:'POST',
         		url:ajaxUrl,
         		data:{type:'endtest'},
         		success:function(result) {
         			location.href = result.link;
         		}
         	})
         }
         function getdate(){
            if(h == 0 && s == 0) {
            	testibitir();
            	return;
            }
            if(s == 0) {
            	h--;
            	s=59;
            }
            s--;
            console.log(h);
            $("#sure").text(h+" : "+s);
             setTimeout(function(){getdate()}, 1000);
            }

        getdate();
    });
    $('.form-check-input').on('click',function() {
    	var radio = $(this);
    	var questID = radio.attr('data-questID');
    	var answer = radio.val();
    	$.ajax({
    		type:'POST',
    		url:ajaxUrl,
    		data:{type:'answerquest',id:questID,ans:answer},
    		success:function(result) {
    			console.log(result);
    		}
    	})
    })
</script>