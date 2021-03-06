<?=$page['header']?>

<?=$page['menu']?>

<?php if ($print <> '') { echo "<pre>";print_r($print);echo "</pre>"; } ?>
	<div class="col-lg-12">
		<h1 class="page-header">Empleados</h1>
	</div>
	<!-- /.col-lg-12 -->
	<div class="col-lg-10">
		<div class="table">
			<table class="table table-striped table-bordered table-hover" id="dataTableDefault">
				<thead>
					<tr>
						<?php if (!$userdata['mobile']): ?>
						<th style="width:50px;">Foto</th>
						<?php endif; ?>
						<th style="width:100px;">Nombre</th>
						<th style="width:80px;">Documento</th>
						<?php if (!$userdata['mobile']): ?>
						<th>Email</th>
						<?php endif; ?>
						<th style="width:70px;">Acción</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($records as $item): ?>
						<tr>
							<?php if (!$userdata['mobile']): ?>
							<td style="text-align:center;">
								<?php if ($item['foto_filename'] === '') {
									$img_name  = 'Foto'.$item['idPersona'];
									if ($item['Genero'] == 'Masculino') {
										$img_src = base_url('').'public/images/default/avatar2.png';
									} else {
										$img_src = base_url('').'public/images/default/avatar5.png';
									}
								} else {
									$img_name = $item['foto_filename'];
									$img_src  = base_url('').'public/images/integrantes/'.$item['foto_filename'];
								} 
								$img_title = $item['Nombre'].' '.$item['Apellido'];
								?>
								<a class="example-image-link" href="<?= $img_src ?>" data-lightbox="<?= $img_name ?>" 
									data-title="<?= $img_title ?>">
									<img src="<?= $img_src ?>" class="logo-circle" style="width:36px;height:36px">
								</a>
							</td>
							<?php endif; ?>
							<!-- <td class="row-center">
								<input name="idPersona" type="hidden" value="<?=$item['idPersona']?>">
								<?=$item['idPersona']?>
							</td> -->
							<td>
								<?=$item['Nombre']?>&nbsp;<?=$item['Apellido']?>
							</td>
							<td>
								<?=$item['DocumentoNo']?>
							</td>
							<?php if (!$userdata['mobile']): ?>
							<td>
								<?=$item['Email']?>
							</td>
							<?php endif; ?>
							<td class="row-center">
								<div class="btn-group  btn-group-sm">
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Acción <span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li>
											<a href="<?=site_url('Integrante/updateItem/'.$item['idPersona'])?>">
											<i class="fa fa-pencil-square-o fa-fw"></i> Actualizar
											</a>
										</li>
										<li>
											<a data-toggle="modal" data-target="#deleteModal" data-code="<?= $item['idPersona']?>" data-name="<?= $item['Nombre']?>" data-surname="<?= $item['Apellido']?>">
											<i class="fa fa-trash-o fa-fw"></i> Eliminar
											</a>
										</li>
									</ul>
								</div>												
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<!-- /.table-responsive -->
	</div>
	<!-- /.col-lg-12 -->

<?=$page['footer']?>

