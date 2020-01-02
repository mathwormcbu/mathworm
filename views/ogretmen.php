<?php require_once('maintance/header.php'); ?>
<style type="text/css">
	.editor-box {
		width: 100%;
		border: 1px solid #D2D2D2;
		margin: 0 auto;
		background: #fff;
		border-collapse: block
	}

	.toolbar {
		background-color: #F5F5F5;
		display: grid;
		grid-template-columns: repeat(12, 8.33%);
		text-align: center
	}

	.toolbar-button {
		margin: 5px;
		text-decoration: none;
		color: #000
	}

	.editor {
		border: 1px solid #D2D2D2;
		min-height: 100px;
		padding: 2px
	}

	a > i >s .fa { font-size: 3em; }
</style>
<div class="container">
	<form style="margin-top: 25px;" id="ogretmenForm">
		<div class="row">
			<div class="col-md-12">
				<select class="form-control" id="qCategory" name="qCategory" required="">
					<option value="">Lütfen Soru'nun Konusunu Seçiniz Please</option>
					<?php 
					foreach ($questionCategories as $row) {
						?>
						<option value="<?= $row['questionCategoryID']; ?>"><?= $row['name']; ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<hr style="width: 100%;">
			<div class="col-md-12">
				<h3 align="center">Soru Metni : </h3>
				<div class="editor-box">
					<div class="toolbar">
						<a href="javascript:void(0)" data-command="bold" class="toolbar-button">
							<i class="fa fa-bold"></i>
						</a>
						<a href="javascript:void(0)" data-command="italic" class="toolbar-button">
							<i class="fa fa-italic"></i>
						</a>
						<a href="javascript:void(0)" data-command="underline" class="toolbar-button">
							<i class="fa fa-underline"></i>
						</a>
						<a href="javascript:void(0)" data-command="justifyLeft" class="toolbar-button">
							<i class="fa fa-align-left"></i>
						</a>
						<a href="javascript:void(0)" data-command="justifyCenter" class="toolbar-button">
							<i class="fa fa-align-center"></i>
						</a>
						<a href="javascript:void(0)" data-command="justifyFull" class="toolbar-button">
							<i class="fa fa-align-justify"></i>
						</a>
						<a href="javascript:void(0)" data-command="justifyRight" class="toolbar-button">
							<i class="fa fa-align-right"></i>
						</a>
						<a href="javascript:void(0)" data-command="h1" class="toolbar-button">
							<strong>H1</strong>
						</a>
						<a href="javascript:void(0)" data-command="h2" class="toolbar-button">
							<strong>H2</strong>
						</a>
						<a href="javascript:void(0)" data-command="h3" class="toolbar-button">
							<strong>H3</strong>
						</a>
						<a href="javascript:void(0)" data-command="h4" class="toolbar-button">
							<strong>H4</strong>
						</a>
						<a href="javascript:void(0)" data-command="insertorderedlist" class="toolbar-button">
							<i class="fa fa-list-ol"></i>
						</a>
						<a href="javascript:void(0)" data-command="insertUnorderedList" class="toolbar-button">
							<i class="fa fa-list-ul"></i>
						</a>
						<a href="javascript:void(0)" data-command="createlink" class="toolbar-button">
							<i class="fa fa-link"></i>
						</a>
						<a href="javascript:void(0)" data-command="unlink" class="toolbar-button">
							<i class="fa fa-unlink"></i>
						</a>
						<a href="javascript:void(0)" data-command="subscript" class="toolbar-button">
							<i class="fa fa-subscript"></i>
						</a>
						<a href="javascript:void(0)" data-command="superscript" class="toolbar-button">
							<i class="fa fa-superscript"></i>
						</a>
						<a href="javascript:void(0)" data-command="indent" class="toolbar-button">
							<i class="fa fa-indent"></i>
						</a>
						<a href="javascript:void(0)" data-command="outdent" class="toolbar-button">
							<i class="fa fa-outdent"></i>
						</a>
						<a href="javascript:void(0)" data-command="insertimage" class="toolbar-button">
							<i class="fa fa-image"></i>
						</a>
						<a href="javascript:void(0)" data-command="undo" class="toolbar-button">
							<i class="fa fa-undo"></i>
						</a>
						<a href="javascript:void(0)" data-command="redo" class="toolbar-button">
							<i class="fa fa-redo"></i>
						</a>
					</div>
					<div class="editor" id="qText" name="qText" contenteditable="true">
					</div>
					<span id="error" style="display: none;color: red;">En fazla 20000 Karakter kabul edilmektedir.</span>
				</div>
			</div>
			<div class="col-md-6">
				<h3 style="margin-top: 15px;" align="center">A Şıkkı : </h3>
				<div class="editor-box">
					<div class="toolbar">
						<a href="javascript:void(0)" data-command="bold" class="toolbar-button">
							<i class="fa fa-bold"></i>
						</a>
						
						<a href="javascript:void(0)" data-command="superscript" class="toolbar-button">
							<i class="fa fa-superscript"></i>
						</a>
						
						<a href="javascript:void(0)" data-command="insertimage" class="toolbar-button">
							<i class="fa fa-image"></i>
						</a>
						<a href="javascript:void(0)" data-command="undo" class="toolbar-button">
							<i class="fa fa-undo"></i>
						</a>
						<a href="javascript:void(0)" data-command="redo" class="toolbar-button">
							<i class="fa fa-redo"></i>
						</a>
					</div>
					<div class="editor" id="qAnswerA" name="qAnswerA" contenteditable="true">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<h3 style="margin-top: 15px;" align="center">B Şıkkı : </h3>
				<div class="editor-box">
					<div class="toolbar">
						<a href="javascript:void(0)" data-command="bold" class="toolbar-button">
							<i class="fa fa-bold"></i>
						</a>
						
						<a href="javascript:void(0)" data-command="superscript" class="toolbar-button">
							<i class="fa fa-superscript"></i>
						</a>
						
						<a href="javascript:void(0)" data-command="insertimage" class="toolbar-button">
							<i class="fa fa-image"></i>
						</a>
						<a href="javascript:void(0)" data-command="undo" class="toolbar-button">
							<i class="fa fa-undo"></i>
						</a>
						<a href="javascript:void(0)" data-command="redo" class="toolbar-button">
							<i class="fa fa-redo"></i>
						</a>
					</div>
					<div class="editor" id="qAnswerB" name="qAnswerB" contenteditable="true">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<h3 style="margin-top: 15px;" align="center">C Şıkkı : </h3>
				<div class="editor-box">
					<div class="toolbar">
						<a href="javascript:void(0)" data-command="bold" class="toolbar-button">
							<i class="fa fa-bold"></i>
						</a>
						
						<a href="javascript:void(0)" data-command="superscript" class="toolbar-button">
							<i class="fa fa-superscript"></i>
						</a>
						
						<a href="javascript:void(0)" data-command="insertimage" class="toolbar-button">
							<i class="fa fa-image"></i>
						</a>
						<a href="javascript:void(0)" data-command="undo" class="toolbar-button">
							<i class="fa fa-undo"></i>
						</a>
						<a href="javascript:void(0)" data-command="redo" class="toolbar-button">
							<i class="fa fa-redo"></i>
						</a>
					</div>
					<div class="editor" id="qAnswerC" name="qAnswerC" contenteditable="true">
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<h3 style="margin-top: 15px;" align="center">D Şıkkı : </h3>
				<div class="editor-box">
					<div class="toolbar">
						<a href="javascript:void(0)" data-command="bold" class="toolbar-button">
							<i class="fa fa-bold"></i>
						</a>
						
						<a href="javascript:void(0)" data-command="superscript" class="toolbar-button">
							<i class="fa fa-superscript"></i>
						</a>
						
						<a href="javascript:void(0)" data-command="insertimage" class="toolbar-button">
							<i class="fa fa-image"></i>
						</a>
						<a href="javascript:void(0)" data-command="undo" class="toolbar-button">
							<i class="fa fa-undo"></i>
						</a>
						<a href="javascript:void(0)" data-command="redo" class="toolbar-button">
							<i class="fa fa-redo"></i>
						</a>
					</div>
					<div class="editor" id="qAnswerD" name="qAnswerD" contenteditable="true">
					</div>
				</div>
			</div>
			<hr style="width: 100%;">
			<div class="col-md-12">
				<select class="form-control" id="qTrueAnswer" name="qTrueAnswer" required="">
					<option value="">Lütfen Soru'nun Cevap Şıkkını Seçiniz Please</option>
					<option value="1">A</option>
					<option value="2">B</option>
					<option value="3">C</option>
					<option value="4">D</option>
				</select>
			</div>
			<div class="col-md-12" align="center">
				<input type="checkbox" id="goldenQuestion" name="goldenQuestion" class="ml-auto mr-auto mt-4"> <span style="color:red;">Altın Soru (Her Testte Öğrencinin Karşısına Çıkacak Soru )</span>
			</div>
			<button type="submit" class="btn btn-success ml-auto mr-auto mt-4" id="qAddButton" name="qAddButton">Soruyu Ekle</button>
		</div>
	</form>
</div>

<?php require_once('maintance/footer.php'); ?>
<script type="text/javascript">
	$('#ogretmenForm').on('submit',function(n) {
		n.preventDefault();
		var btn = $('#qAddButton');

		var txt=$('#qText').html(),
		cat=$('#qCategory').val(),
		a=$('#qAnswerA').html(),
		b=$('#qAnswerB').html(),
		c=$('#qAnswerC').html(),
		d=$('#qAnswerD').html(),
		answ=$('#qTrueAnswer').val();
		check=$('#goldenQuestion:checked').val();
		btn.attr("disabled",true);
		$.ajax({
			type: 'POST',
			url: ajaxUrl,
			data: {qTxt:txt,qAnsA:a,qAnsB:b,qAnsC:c,qAnsD:d,qCat:cat,qAns:answ,gold:check,type:'soruekle'},
			success: function(result) {
				setTimeout(function() {
					btn.attr("disabled",false);
				},2000)
				console.log(result);
				if(result.status === 'warning') {
					toastr.warning(result.message);
				} else if(result.status === 'success') {
					toastr.success(result.message);
				} else if(result.status === 'error') {
					toastr.error(result.message);
				}
			},
			error: function (request, error) {
				console.log(arguments);
				toastr.error(error);
			}
		});
	})
</script>
<script type="text/javascript">
	$(document).ready(function() {
		SlimWhizzy({
			_document: document,
			_window: window,
			btnClass: '.toolbar-button',
			editorSelector: '.editor'
		});
		$('.editor').on('keyup',function() {
			var txtLength = $(this).html().length;
			var text = $(this).html();
			if(txtLength > 10000)
			{
				var new_text = text.substr(0,10000);
				$(this).html(new_text);
				toastr.warning('Belirlenen karakter sınırını aştınız.');
			}
		});
	})
</script>