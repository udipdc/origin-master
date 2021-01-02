<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DataTables,Validator;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add_edit');
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
            'name' => 'required',
        );
        $messages = [
            'name.required' => 'Please Enter Category Name',
        ];

        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();
                $Category = new Category(['name' => $request->get('name') , 'created_at' => date('Y-m-d h:i:sa') ]);
                $Category->save();
                \DB::commit();
                return redirect('admin/category')
                ->with('success', 'Category saved!');
            } catch (\Illuminate\Database\QueryException $ex) {
                $msg = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                }
                \DB::rollback();
                return Redirect::back()
                ->with('error', $msg);
            } catch (Exception $ex) {
                $msg = $ex->getMessage();
                \DB::rollback();
                return Redirect::back()
                ->with('error', $msg);
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::find($id);
        return view('admin.category.add_edit', compact('category'));
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
        $rules = array(
            'name' => 'required',
        );
        $messages = [
            'name.required' => 'Please Enter Category Name',
        ];

        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();
                $contact = Category::find($id);
                $contact->name = $request->get('name');
                $contact->updated_at = date('Y-m-d h:i:sa');
                $contact->save();
                \DB::commit();
                return redirect('admin/category')
                ->with('success', 'Category Updated!');
            } catch (\Illuminate\Database\QueryException $ex) {
                $msg = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                }
                \DB::rollback();
                return Redirect::back()
                ->with('error', $msg);
            } catch (Exception $ex) {
                $msg = $ex->getMessage();
                \DB::rollback();
                return Redirect::back()
                ->with('error', $msg);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        $id = $_POST['id'];
        $user = Category::find($id);
        $user->delete();

    }

    public function status_change()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $contact = Category::find($id);
        $contact->status = $status;
        $contact->save();

    }

    public function getcategory(Request $request)
    {
        if ($request->input('status') != "")
        {
            $data = Category::where('status', '=', $request->input('status'))
                ->orderBy('updated_at', 'DESC')
                ->get();
        }
        else
        {
            $data = Category::latest()->orderBy('updated_at', 'DESC')
                ->get();
        }

        return Datatables::of($data)->addIndexColumn()->addColumn('name', function ($row)
        {
            return $row->name;
        })->addColumn('status', function ($row)
        {
            $check = ($row->status == 1) ? 'checked' : "";
            $btn = '<input id="chk_' . $row->id . '" onchange="statuschange(' . $row->id . ')" ' . $check . ' type="checkbox">';
            return $btn;
        })->addColumn('action', function ($row)  use($request)
        {
            $btn = '';
            if($request->user()->can('edit_Category')){
                $btn .= '<a href="' . route('category.edit', $row->id) . '" class="edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>';
            }
            if($request->user()->can('delete_Category')){
                $btn .= ' <a href="javascript:void(0);" onclick="deletecategory(' . $row->id . ')" class="edit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>';
            }
            return $btn;
        })->rawColumns(['name', 'status', 'action'])
            ->make(true);

    }
}
