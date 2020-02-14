<?php

namespace App\Http\Middleware;

use Closure;
use App\models\staff\StaffProfiles;
use App\models\permission;
use DB;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,$permission=Null)
    {
        //lấy các tất cả các quyền vào hệ thống

        //1.lấy tất cả cấc role của user khi login vào hệ thống
        // $listRoleOfUsers = DB::table('staff_profiles')
        //                     ->join('staff_roles','staff_profiles.id', '=', 'staff_roles.id_staff')
        //                     ->join('roles', 'staff_roles.id_role', '=', 'roles.id')
        //                     ->where('staff_profiles.id',auth()->id())
        //                     ->select('roles.*')
        //                     ->get()->pluck('id')->toArray();
        $listRoleOfUsers = StaffProfiles::find(auth()->id())->pesmissionstaff()->select('roles.id')->pluck('id')->toArray();

        //2.lấy các quyền khi user login vào hệ thông
        $listPermissionOfUsers = DB::table('roles')
                            ->join('permission_roles','roles.id', '=', 'permission_roles.id_role')
                            ->join('permission', 'permission_roles.id_permission', '=', 'permission.id')
                            ->whereIn('roles.id', $listRoleOfUsers)
                            ->select('permission.*')
                            ->get()->pluck('id')->unique();

       //lấy ra màn hình tương ứng để check phân quyền

        $checkPermission = permission::where('name', $permission)->value('id');

        //kiểm tra user được phép vào màn hình này không
       // dd($listPermissionOfUsers->contains($checkPermission))
        if ($listPermissionOfUsers->contains($checkPermission)) 
        {
            return $next($request);
        }
        abort(403);
       
    }
}
