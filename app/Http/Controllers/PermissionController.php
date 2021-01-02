<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DataTables,Validator;
use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        $modules = Module::get();
        return view('admin.permissions.index')->with(['roles' => $roles,'modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules = array(
            'role' => 'required',
        );
        $messages = [
            'role.required' => 'Please select role name',
        ];
        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();
                $input = $request->all();
                $data = $input;
                $role_id = $input['role'];
                unset($data['_token']);
                unset($data['role']);

                $permissionIds = [];
                $i=0;
                foreach ($data as $permission => $value) {
                    $slug = $permission;
                    $permissionData = 
                        Permission::updateOrCreate([
                            'name' => $permission
                        ],[
                            'name' => $permission,
                            'guard_name' => 'admin'
                        ]);
                    $permissionIds[$i]['permission_id'] = $permissionData->id;
                    $i++;
                }
                $role = Role::where('id',$role_id)->first();
                $role->syncPermissions($permissionIds);
                \DB::commit();
                return redirect('admin/permission')->with('success',"Permission given successfully");
            } catch(\Illuminate\Database\QueryException $ex){ 
                $msg = $ex->getMessage();
                if(isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                }
                \DB::rollback();
                return Redirect::back()->with('error',$msg);
            }  catch (Exception $ex) {
                $msg = $ex->getMessage();
                \DB::rollback();
                return Redirect::back()->with('error',$msg);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getPermissonData(Request $request)
    {      
        if($request->role != null){
            $permissionData = Role::with(['permissions'])->where('id',$request->role)->first()->permissions->pluck('name')->toArray();
        }else{
            $permissionData = [];
        }
        $modules = Module::get();
        return Datatables::of($modules)
            ->addColumn('name', function ($q) {
                return $q->name;
            })
            ->addColumn('create', function ($q) use($permissionData) {
                if(in_array('create_'.$q->name,$permissionData))
                    return '<div class="icheck-primary d-inline"><input type="checkbox" checked name="create_'.$q->name.'" id="create_'.$q->name.'"><label for="create_'.$q->name.'"></label></div';
                else
                    return '<div class="icheck-primary d-inline"><input type="checkbox" name="create_'.$q->name.'" id="create_'.$q->name.'"><label for="create_'.$q->name.'"></label></div>';
            })
            ->addColumn('edit', function ($q) use($permissionData) {
                if(in_array('edit_'.$q->name,$permissionData))
                     return '<div class="icheck-primary d-inline"><input type="checkbox" checked name="edit_'.$q->name.'" id="edit_'.$q->name.'"><label for="edit_'.$q->name.'"></label></div>';
                else
                    return '<div class="icheck-primary d-inline"><input type="checkbox" name="edit_'.$q->name.'" id="edit_'.$q->name.'"><label for="edit_'.$q->name.'"></label><div>';
            })
            ->addColumn('delete', function ($q) use($permissionData) {
                if(in_array('delete_'.$q->name,$permissionData))
                     return '<div class="icheck-primary d-inline"><input type="checkbox" checked name="delete_'.$q->name.'" id="delete_'.$q->name.'"><label for="delete_'.$q->name.'"></label></div>';
                else
                    return '<div class="icheck-primary d-inline"><input type="checkbox" name="delete_'.$q->name.'" id="delete_'.$q->name.'"><label for="delete_'.$q->name.'"></label></div>';
            })
            ->addColumn('view', function ($q) use($permissionData) {
                if(in_array('view_'.$q->name,$permissionData))
                     return '<div class="icheck-primary d-inline"><input type="checkbox" checked name="view_'.$q->name.'" id="view_'.$q->name.'"><label for="view_'.$q->name.'"></label><div>';
                else
                    return '<div class="icheck-primary d-inline"><input type="checkbox" name="view_'.$q->name.'" id="view_'.$q->name.'"><label for="view_'.$q->name.'"></label></div>';
            })
            ->addIndexColumn()
            ->rawColumns(['create','edit','delete','view'])
            ->make(true);
    }
}
