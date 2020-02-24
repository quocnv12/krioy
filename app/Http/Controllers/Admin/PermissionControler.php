<?php

namespace App\Http\Controllers\Admin;
use App\models\permission;
use App\models\staff\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Permission\{PermissionRequest,EditPermissionRequest};

class PermissionControler extends Controller
{
    //đanh sách role
    public function listRole()
    {
        $data['roles']=role::all();
        return view('pages.role.list',$data);
    }
    //Add role
    public function getAddRole()
    {
        $data['permissions']=permission::all(); 
        return view('pages.role.add',$data);
    }
    public function postAddRole(PermissionRequest $request)
    {
        if(!$request->permission)
        {
            return redirect('kids-now/role/add')->with('danger','Please choose permission !')->withInput();
        }
        else
        {
            try {
                DB::beginTransaction();
                $role = new role;
                $role->name = $request->role;
                $role->save();
                $role->permission_role()->attach($request->permission);
                DB::commit();
                return redirect('kids-now/role')->with('success','Add role success !');
            } catch (\Exception $exception) {
                DB::rollBack();
            }
        }
       
    }

    //edit role
    public function getEditRole($id)
    {   
        $data['role'] = role::find($id);
        $data['permissions']=permission::all(); 
        $data['roleOfPermission'] = DB::table('permission_roles')->where('id_role',$id)->pluck('id_permission');
        return view('pages.role.edit',$data); 
    }
    public function postEditRole(EditPermissionRequest $request,  $id)
    {   
        $role = role::find($id);
        $role->name = $request->role;
        $role->permission_role()->Sync($request->permission);
        return redirect('kids-now/role')->with('success','Edit role success !');
        
    }
    //--xoa role
    public function deleteRole($id)
    {   
       role::destroy($id);
       return redirect('kids-now/role')->with('success','Delete role success !');
    }

}
