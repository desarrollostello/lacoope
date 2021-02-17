<div class="tab-pane fade {{ $tab == 'roles' ? 'show active' : '' }}" id="roles_content" role="tabpanel">
    
    <div class="row mt-5">
        <div class="col-sm-12 col-md-7">
            <h6 class="text-center">
                Listado de Roles
            </h6>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="cursor: pointer" onclick="clearRoleSelected()">
                        <i class="las la-lg la-eraser"></i>
                    </span>
                </div>
                <input type="text" id="roleName" class="form-control" autocomplete="off">
                <input type="hidden" id="roleId">
                <div class="input-group-prepend">
                    <button style="margin-left: 7px" class="btn btn-primary" wire:click="$emit('CrearRole', $('#roleName').val(), $('#roleId').val() )" type="button">
                        <i class="las la-lg la-save"></i>
                    </button>
                    
                </div>
            </div>
        
            <div class="table-responsive">
                <table id="tblRoles" class="table  table-border tab-hover table-striped table-checkable table-higlight-dead mb-4">
                    <thead>
                        <tr>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Usuarios</th>
                            <th class="text-center">Acciones</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $r)
                            <tr>
                                <td>{{ $r->name }}</td>
                                <td class="text-center">{{ \App\Models\User::role($r->name)->count() }}</td>
                                <td class="text-center">
                                    <span style="cursor: pointer" onclick="showRole('{{ $r }}')">
                                        <i class="lar la-2x la-edit"></i>
                                    </span>

                                    @if (\App\Models\User::role($r->name)->count() <= 0)
                                        <a href="javascript:void(0)"
                                        onclick="Confirm('{{ $r->id }}', 'destroyRole')"
                                        title="Eliminar rol"><i class="lar la-2x la-eraser"></i> </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="n-check" id="divRoles">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input data-name="{{ $r->name }}" 
                                                {{ $r->checked == 1 ? 'checked': '' }}
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
            <h6 class="text-left">Elegir Usuario</h6>
            <div class="input-group">
                <select wire:model="userSelected" name="" id="userId" class="form-control">
                    <option value="Seleccionar">Seleccionar</option>
                    @foreach ($usuarios as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="button" onclick="AsignarRoles()" class="btn btn-primary mt-3">Asignar Roles</button>
        </div>
    </div>
</div>