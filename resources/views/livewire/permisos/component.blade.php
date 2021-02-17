<div class="layout-px-spacing">
    <div class="row">
        <div class="col-lg-12 col-md-12"> {{-- poner una columna de 12 pero con tailwindcss --}}
            {{-- <div class="widget-content-area br-4"> 
                <div class="widget-one">--}}
                    {{ $tab }}
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

                                {{-- 
                            <a href="#roles_content" 
                                class="nav-link {{ $tab == 'roles' ? 'active' : '' }}" wire:click="$set('tab', 'roles')"
                                data-toggle="pill" role="tab" id="roles_content-tab" aria-controls="roles_content">
                                    <i class="la la-user la-2x">ROLES</i>
                                </a>
                                --}}
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


                                {{-- 
                            <a href="#permisos_content" 
                                class="nav-link {{ $tab = 'permisos' ? 'active' : '' }}" wire:click="$set('tab', 'permisos')"
                                data-toggle="pill" role="tab" id="permisos_content-tab" aria-controls="permisos_content">
                                    <i class="la la-user la-2x">PERMISOS</i>
                            </a>
                            --}}
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



            {{-- 
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">Home</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">Profile</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Contact</div>
              </div>
              --}}
        </div>
    </div>
</div>

<script>
    function showRole(role)
    {
        var data = JSON.parte(role)
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
        var data = JSON.parte(permission)
        $('#permisoName').val(data['name'])
        $('#permisoId').val(data['id'])
    }

    function clearPermissionSelected()
    {
        $('#permissionName').val('')
        $('#permissionId').val(0)
        $('#permissionName').focus()
    }

    function Confirm(id, eventName)
    {
        swal({
            title: 'CONFIRMAR',
            text: 'Deseas Eliminar el Registro?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3065d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            closeOnConfirm: false
        },
        function(){
            window.livewire.emit(eventName, id)
            toastr.success('info', 'Registro eliminado con éxito')
            $('#roleName').val('')
            $('#roleId').val(0)
            $('#permissionName').val('')
            $('#permissionId').val(0)
            swal.close()
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

        window.livewire.emit('AsignarPermiso', permisosList, $('#roleSelected option:selected').val())
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


