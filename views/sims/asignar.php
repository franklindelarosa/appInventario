<script>
	$(document).on('ready', function(event) {
		$('#tipoDispositivo').on('change', function(event) {
			if($('#tipoDispositivo').val()!=""){
				$.post('dispdisponibles', {id_tipo: $('#tipoDispositivo').val()})
				.done(function(data){
					$('#imeiDisp').empty();
					$('#imeiDisp').append('<option value="">Seleccionar Imei</option>');
					$.each(data, function(index, val) {
						$('#imeiDisp').append('<option value="'+val.imei+'">'+val.imei+'</option>')
					});
					$('.selectpicker').selectpicker('refresh');
				});
			}
		});
		$('#btnAsignar').on('click', function(event) {
			event.preventDefault();
			$.post('asignar', {data: $('#asignarSimcard').serialize()})
			.done(function(data) {
				if(data.respuesta == '1'){
					window.location.href = '<?= \Yii::$app->homeUrl."dispositivos/view?id="; ?>'+data.id;
				}
				console.log(data);
			})
		});
		var data = <?= $data;?>;
		if(data['informado']=='1'){
			$('#tipoDispositivo').val(data['tipo']);
			$('#tipoDispositivo option:not(:selected)').attr('disabled', 'true');
			$('#imeiDisp').val(data['imei']);
			$('#imeiDisp option:not(:selected)').attr('disabled', 'true');
		}else{
			$('#tipoDispositivo').attr('data-live-search', 'true');
			$('#imeiDisp').attr('data-live-search', 'true');
		}
	});
	
</script>
<?php

use yii\helpers\Html;

$this->title = 'Asignar simcard';
$this->params['breadcrumbs'][] = ['label' => 'Simcards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="header-tittle"><?= $this->title; ?></h1><br>
<div class="col-sm-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Asignar Simcard</h3>
		</div>
		<div class="panel-body">
			<form id="asignarSimcard" action="asignar" class="form form-horizontal" method="post" role="form"><br>
				<div class="form-group col-md-12">
					<label class="col-md-3 control-label">Nuevo estado de la sim:</label>
					<div class="col-md-7">
						<select id="estado" data-live-search="true" name="0" data-width="100%" class="selectpicker">
							<option value="">Seleccionar estado</option>
							<?php
							foreach($estados as $row){?>
								<option value="<?php echo $row['id_estado'];?>"><?php echo $row['estado'];?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="form-group col-md-12">
					<label for="dateAsi" class="col-md-3 control-label">Fecha de asignación:</label>
					<div class="col-md-7">
						<input type="date" class="form-control" name="1" placeholder="dd/mm/aaaa">
					</div>
				</div>
				<div class="form-group col-md-12">
					<label class="col-md-3 control-label">Tipo de dispositivo:</label>
					<div class="col-md-7">
						<select id="tipoDispositivo" name="2" data-width="100%" class="selectpicker">
							<option value="">Seleccionar tipo de dispositivo</option>
							<?php
							foreach($tipos as $row){?>
								<option value="<?php echo $row['id_tipo'];?>"><?php echo $row['nombre'];?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="form-group col-md-12">
					<label class="col-md-3 control-label">Imei del dispositivo a asignar:</label>
					<div class="col-md-7">
						<select id="imeiDisp" name="3" data-width="100%" class="selectpicker">
							<option value="">Seleccionar Imei</option>
							<?php
							foreach($imeis as $row){?>
								<option value="<?php echo $row['imei'];?>"><?php echo $row['imei'];?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="form-group col-md-12">
					<label class="col-md-3 control-label">Plan:</label>
					<div class="col-md-7">
						<select id="plan" name="4" data-width="100%" class="selectpicker">
							<option value="">Seleccionar plan</option>
							<?php
							foreach($planes as $row){?>
								<option value="<?php echo $row['Plan'];?>"><?php echo $row['Nombre'];?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="buttons-submit col-md-9">
					<div class="col-md-2 col-md-offset-5">
						<button id="btnAsignar" type="submit" class="btn btn-primary">Asignar simcard</button>
					</div>
					<div class="col-md-2 col-md-offset-1">
						<a href="<?php echo Yii::$app->user->returnUrl ?>" class="btn btn-success">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
