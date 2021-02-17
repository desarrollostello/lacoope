<div class="tab-pane fade {{ $tab == 'permisos' ? 'show active' : '' }}" id="permisos_content" role="tabpanel">
    
    <div class="row mt-5">
        <div class="col-sm-12 col-md-7">
            <h6 class="text-center">
                Listado de Permisos
            </h6>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="cursor: pointer" onclick="clearPermissionSelected()">
                        <i class="las la-lg la-eraser"></i>
                    </span>
                </div>
                <input type="text" id="permissionName" class="form-control" autocomplete="off">
                <input type="hidden" id="permissionId">
                <div class="input-group-prepend">
                    <button style="margin-left: 7px" class="btn btn-primary" wire:click="$emit('CrearPermiso', $('#permissionName').val(), $('#permissionId').val() )" type="button">
                        <i class="las la-lg la-save"></i>
                    </button>
                </div>
            </div>
        
            <div class="table-responsive">
                <table id="tblPermisos" class="table  table-border tab-hover table-striped table-checkable table-higlight-dead mb-4">
                    <thead>
                        <tr>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Roles<br>con el permiso</th>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">
                                <div class="n-check">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" class="new-control-input check-all">
                                        <span class="new-control-indicator"></span>TODOS
                                    </label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permisos as $p)
                            <tr>
                                <td>{{ $p->name }}</td>
                                <td class="text-center">{{ \App\Models\User::permission($p->name)->count() }}</td>
                                <td class="text-center">
                                    <span style="cursor: pointer" onclick="showPermission('{{ $p }}')">
                                        <i class="lar la-2x la-edit"></i>
                                    </span>

                                    @if (\App\Models\User::permission($p->name)->count() <= 0)
                                        <a href="javascript:void(0)"
                                        onclick="Confirm('{{ $p->id }}', 'destroyPermiso')"
                                        title="Eliminar permiso"><i class="las la-2x la-eraser"></i></a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="n-check" id="divPermisos">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input data-name="{{ $p->name }}" 
                                                {{ $p->checked == 1 ? 'checked': '' }}
                                                type="checkbox" 
                                                class="new-control-input checkbox-rol">
                                            <span class="new-control-indicator">Asignar</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>

        <div class="col-sm-12 col-md-5">
            <h6 class="text-left">Elegir Rol</h6>
            <div class="input-group">
                <select wire:model="roleSelected" name="" id="roleSelected" class="form-control">
                    <option value="Seleccionar">Seleccionar</option>
                    @foreach ($roles as $r)
                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="button" onclick="AsignarPermisos()" class="btn btn-primary mt-3">Asignar Permisos</button>
        </div>
    </div>
</div>
