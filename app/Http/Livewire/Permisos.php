<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;
//use DB;
use Illuminate\Support\Facades\DB;

use SweetAlert;

class Permisos extends Component
{

    public $permisoTitle = 'Crear', $roleTitle='Crear';
    public $userSelected;
    public $tab = 'roles';
    public $roleSelected;

    public $permisoName;
    public $permisoId;

    public function render()
    {
        $roles = Role::select('*', DB ::RAW("0 as checked"))->get();
        $permisos = Permission::select('*', DB::RAW("0 as checked"))->get();

        if($this->userSelected != '' && $this->userSelected != 'Seleccionar')
        {
            foreach ($roles as $r) {
                $user = User::find($this->userSelected);
                $tieneRole = $user->hasRole($r->name);
                if ($tieneRole)
                {
                    $r->checked = 1;
                }
            }
        }

        if($this->roleSelected != '' && $this->roleSelected != 'Seleccionar')
        {
            foreach ($permisos as $p) {
                $role = Role::find($this->roleSelected);
                $tienePermiso = $role->hasPermissionTo($p->name);
                if ($tienePermiso)
                {
                    $p->checked = 1;
                }
            }
        }

        return view('livewire.permisos.component', [
            'roles' => $roles,
            'permisos'  => $permisos,
            'usuarios'  => User::select('id', 'name')->get()
        ]);
    }

    public function resetInput()
    {
        $this->roleTitle = 'Crear';
        $this->permisoTitle = 'Crear';
        $this->userSelected = '';
        $this->roleSelected = '';
        $this->permisoName = '';
        //$this->permisoId;
    }

    public function CrearRole($roleName, $roleId)
    {
        
        if($roleId)
            $this->UpdateRole($roleName, $roleId);
        else
            $this->SaveRole($roleName);
        
    }

    public function SaveRole($roleName)
    {
        $role = Role::where('name', $roleName)->first();
        if($role)
        {
            $this->emit('msg-error', 'El Rol que intentas registrar ya exsite en el sistema');
            return;
        }

        Role::create([
            'name'  => $roleName
        ]);
        SweetAlert::success('Rol Registrado Correctamente', 'Guardando Rol');
        //$this->emit('msg-ok', 'Se registró el rol correctamente');
        $this->resetInput();
    }

    public function UpdateRole($roleName, $roleId)
    {
        $role = Role::where('name', $roleName)->where('id', '<>', $roleId)->first();
        if($role)
        {
            $this->emit('msg-error', 'El Rol que intentas registrar ya exsite en el sistema');
            return;
        }

        $role = Role::find($roleId);
        $role->name = $roleName;
        $role->save();
        $this->emit('msg-ok', 'El rol se a ctualizó correctamente');
        $this->resetInput();
    }

    public function destroyRole($roleId)
    {
        Role::find($roleId)->delete();
        $this->emit('msg-ok', 'El rol se Eliminó correctamente');
        $this->resetInput();
    }

    public function AsignarRoles($rolesList)
    {
        if($this->userSelected)
        {
            $user = User::find($this->userSelected);
            if($user)
            {
                $user->syncRoles($rolesList);
                $this->emit('msg-ok', 'Roles asignados correctamente');
                $this->resetInput();
            }
        }
    }

    protected $listeners = [
        'destroyRole'       => 'destroyRole',
        'destroyPermiso'    => 'destroyPermiso',
        'CrearPermiso'      => 'CrearPermiso',
        'CrearRole'         => 'CrearRole',
        'AsignarRoles'      => 'AsignarRoles',
        'AsignarPermisos'   => 'AsignarPermisos'
    ];


    //permisos

    public function CrearPermiso($permisoName, $permisoId)
    {
        $this->permisoId = $permisoId;
        $this->permisoName = $permisoName;

        if($this->permisoId)
        {
            $this->UpdatePermiso($this->permisoName, $this->permisoId);
            $this->permisoId = '';
            $this->permisoName = '';
        }
        else{
            $this->SavePermiso($permisoName);
            $this->permisoName = '';
        }
            
    }

    public function SavePermiso($permisoName)
    {
        
        $permiso = Permission::where('name', $permisoName)->first();
        if($permiso)
        {
            $this->emit('msg-erro', 'El permiso que intenta registrar ya existe');
            return;
        }
        Permission::create([
            'name'  => $permisoName
        ]);
        //$this->emit('msg-ok', 'Permiso Registrado correctamente');
        SweetAlert::success('Rol Registrado Correctamente', 'Guardando Rol');
        $this->resetInput();
    }

    public function UpdatePermiso($permisoName, $permisoId)
    {
        $permiso = Permission::where('name', $permisoName)->where('id', '<>', $permisoId)->first();
        if($permiso)
        {
            $this->emit('msg-error', 'El permiso que intenta registrar ya existe en Sistema');
            return;
        }
        $permiso = Permission::find($permisoId);
        $permiso->name = $permisoName;
        $permiso->save();
        $this->emit('msg-ok', 'Permiso Actualizado correctamente');
        $this->resetInput();

    }

    public function destroyPermiso($permisoId)
    {
        Permission::find($permisoId)->delete();
        
        $this->emit('alert', ['type' => 'success', 'message' => 'Permiso Eliminado correctamente!']);
        $this->resetInput();
    }

    public function AsignarPermisos($permisosList, $roleId)
    {
        if($roleId > 0)
        {
            $role = Role::find($roleId);
            if($role)
            {
                $role->syncPermissions($permisosList);
                $this->emit('msg-ok', 'Permisos asignados correctamente');
                $this->resetInput();
            }
        }
    }


}
