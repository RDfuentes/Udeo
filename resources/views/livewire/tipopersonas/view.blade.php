@section('title', __('Tipopersonas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa fa-users"></i>
								Tipo de Personas </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar tipo persona">
						</div>
						<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
							<i class="fa fa-plus"></i> Nuevo Tipo Persona
						</div>
					</div>
				</div>

				<div class="card-body">
					@include('livewire.tipopersonas.modals')
					<div class="table-responsive">
						<table class="table table-bordered table-sm">
							<thead class="thead">
								<tr>
									<td>#</td>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Estado</th>
									<td>Acciones</td>
								</tr>
							</thead>
							<tbody>
								@forelse($tipopersonas as $row)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $row->name }}</td>
									<td>{{ $row->descripcion }}</td>
									<td>
										@if($row->status == 1)
										<span class="badge bg-success">Activo</span>
										@else
										<span class="badge bg-danger">Inactivo</span>
										@endif
									</td>
									<td width="90">
										<div class="dropdown">
											<a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
											<a class="btn btn-danger btn-sm" wire:click="deleteConfirmation({{$row->id}})"><i class="fa fa-trash"></i>Borrar</a>
										</div>
									</td>
								</tr>
								@empty
								<tr>
									<td class="text-center" colspan="100%">No se encontro información </td>
								</tr>
								@endforelse
							</tbody>
						</table>
						<div class="float-end">{{ $tipopersonas->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@push('scripts')
<script>
	window.addEventListener('show-delete-confirmation', event => {
		Swal.fire({
			title: '¿Estás seguro(a)?',
			text: "¡No podrás revertir esto!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Eliminar!'
		}).then((result) => {
			if (result.isConfirmed) {
				@this.call('deletedConfirmed')
			}
		})
	});
</script>
@endpush