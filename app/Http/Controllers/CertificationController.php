<?php
namespace App\Http\Controllers;
use App\Certification;
use DataTables,Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        return view('admin.certification.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.certification.add_edit');
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
            'name.required' => 'Please Enter Certificate Name',
        ];

        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();
                $certification = new Certification(['name' => $request->get('name') , 'created_at' => date('Y-m-d h:i:sa') ]);
                $certification->save();
                \DB::commit();
                return redirect('admin/certification')
                ->with('success', 'Certificate saved!');
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

        $certifiction = Certification::find($id);
        return view('admin.certification.add_edit', compact('certifiction'));
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
            'name.required' => 'Please Enter Certificate Name',
        ];

        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();
                $contact = Certification::find($id);
                $contact->name = $request->get('name');
                $contact->updated_at = date('Y-m-d h:i:sa');
                $contact->save();
                \DB::commit();
                return redirect('admin/certification')
                ->with('success', 'Certificate Updated!');
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
        $user = Certification::find($id);
        $user->delete();

    }

    public function status_change()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $contact = Certification::find($id);
        $contact->status = $status;
        $contact->save();

    }

    public function getcertificate(Request $request)
    {

        // $limit = $request->input('length');
        // $start = $request->input('start');
        if ($request->input('status') != "")
        {
            $data = Certification::where('status', '=', $request->input('status'))
                ->orderBy('updated_at', 'DESC')
                ->get();
        }
        else
        {
            $data = Certification::latest()->orderBy('updated_at', 'DESC')
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
            if($request->user()->can('edit_Certification')){
                $btn .= '<a href="' . route('certification.edit', $row->id) . '" class="edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>';
            }
            if($request->user()->can('delete_Certification')){
                $btn .= ' <a href="javascript:void(0);" onclick="deletecertificate(' . $row->id . ')" class="edit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>';
            }
            return $btn;
        })->rawColumns(['name', 'status', 'action'])
            ->make(true);

    }

}

