<div>
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
                <div class="row">
                    <div class="col-lg-12 col-md-12"> {{-- poner una columna de 12 pero con tailwindcss --}}
                        {{-- <div class="widget-content-area br-4"> 
                            <div class="widget-one">--}}
                                
                                <ul class="nav nav-pills mt-3 mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a 
                                            wire:click="$set('tab', 'roles')"
                                            class="nav-link {{ $tab == 'roles' ? 'active' : '' }}" 
                                            id="roles_content-tab" 
                                            data-toggle="pill" 
                                            href="#roles_content" 
                                            role="tab" 
                                            aria-controls="roles_content" 
                                            aria-selected="true">
                                                Roles
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a 
                                            wire:click="$set('tab', 'permisos')"
                                            class="nav-link {{ $tab == 'permisos' ? 'active' : '' }}" 
                                            id="permisos_content-tab" 
                                            data-toggle="pill" 
                                            href="#permisos_content" 
                                            role="tab" 
                                            aria-controls="permisos_content" 
                                            aria-selected="true">
                                                Permisos
                                        </a>

                                    </li>
                                
                                </ul>
                            

                                <div class="tab-content">
                                    @if($tab == 'roles')
                                        @include('livewire.permisos.roles')
                                    @elseif($tab == 'permisos')
                                        @include('livewire.permisos.permisos')
                                    @endif
                                </div>
                        {{--  </div>
                        </div>--}}


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.livewire.on('alert', param =>{
        toastr.[param['type']] (param['message'], param['type']);
    });
    </script>
    
<script>


    function showRole(role)
    {
        var data = JSON.parse(role)
        $('#roleName').val(data['name'])
        $('#roleId').val(data['id'])
    }

    function clearRoleSelected()
    {
        $('#roleName').val('')
        $('#roleId').val(0)
        $('#roleName').focus()
    }

    function showPermission(permission)
    {
        var data = JSON.parse(permission)
        $('#permissionName').val(data['name'])
        
        $('#permissionId').val(data['id'])
    }

    function clearPermissionSelected()
    {
        $('#permissionName').val('')
        $('#permissionId').val(0)
        $('#permissionName').focus()
    }

    function Confirm(id, eventName)
    {
        
        Swal.fire({
            title: 'Confirmar?',
            text: "Deseas Eliminar el Registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit(eventName, id)
                $('#roleName').val('')
                $('#roleId').val(0)
                $('#permissionName').val('')
                $('#permissionId').val(0)
            }
        })
        

    }

    function AsignarRoles()
    {
        var rolesList =[]
        $('#tblRoles').find('input[type=checkbox]:checked').each(function(){
            rolesList.push($(this).attr('data-name'))
        })

        if(rolesList.length < 1)
        {
            toastr.error('', 'Seleccione al menos un rol')
            return;
        }else if( $('#userId option:selected').val() == 'Seleccionar'){
            toastr.error('', 'Seleccione un Usuario')
            return;
        }

        window.livewire.emit('AsignarRoles', rolesList)
    }

    function AsignarPermisos()
    {
        var permisosList =[]
        $('#tblPermisos').find('input[type=checkbox]:checked').each(function(){
            permisosList.push($(this).attr('data-name'))
        })
        
        if(permisosList.length < 1)
        {
            toastr.error('', 'Seleccione al menos un permiso')
            return;
        }

        if( $('#roleSelected option:selected').val() == 'Seleccionar'){
            toastr.error('', 'Seleccione un Rol')
            return;
        }
        
        window.livewire.emit('AsignarPermisos', permisosList, $('#roleSelected option:selected').val())
    }

    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('activarTab', tabName => {
            var tab = "[href='" + tabName + "']"
            $(tab).tab('show')
        })

        window.livewire.on('msg-ok', msgText =>{
            $('#permissionName').val('')
            $('#permissionId').val(0)
            $('#roleName').val('')
            $('#roleId').val(0)
        })

        $('body').on('click', '.check-all', function(){
            var state = $(this).is(':checked') ? true : false
            $('#tblPermisos').find('input[type=checkbox]').each(function(e){
                $(this).prop('checked', state)
            })
        })
    })


{{-- https://www.youtube.com/watch?v=nHqE2V4yc3U&list=PLJjetMSzCM-pV7MYP_9kDsrdgXE3Sx-lq&index=73 --}}
</script>


