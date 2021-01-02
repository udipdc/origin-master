<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Category;
use DataTables,Validator;
use Illuminate\Support\Facades\Redirect;
use File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add_edit');
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
            'name.required' => 'Please Enter Product Name',
        ];

        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();

                $product_name="";
                if(isset($request->product_image) && !empty($request->product_image))
                {
                    if($request->old_product_image != '' || $request->old_product_image != null){
                        $old_product_image = public_path('product/'.$request->old_product_image);
                        if (File::exists($old_product_image)) { 
                            unlink($old_product_image);
                        }
                    }
                    $originalPath = public_path('product/');
                    $resume = $request->product_image;
                    $product_name = "product_"."_".$resume->getClientOriginalName();
                    if(!empty($originalPath)){
                        if(!is_dir($originalPath)) {
                            mkdir($originalPath, 0755, true);
                        }
                        copy($resume->getRealPath(), public_path('product/'.$product_name));
                    }
                }

                $Product = new Product(['product_name' => $request->get('name'), 'product_image' => $product_name, 'product_log' => $product_name, 'created_at' => date('Y-m-d h:i:sa')]);
                $Product->save();
                \DB::commit();
                return redirect('admin/product')
                ->with('success', 'Product saved!');
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
        $product = Product::find($id);
        return view('admin.product.add_edit', compact('product'));
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
            'name.required' => 'Please Enter Product Name',
        ];

        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();

                $coverSheet = Product::find($id);
                $coverSheet->product_name = $request->get('name');
                $coverSheet->created_at = date('Y-m-d h:i:sa');
                $coverSheet->save();

                if(isset($request->product_image) && !empty($request->product_image))
                {
                    if($request->old_product_image != '' || $request->old_product_image != null){
                        $old_product_image = public_path('product/'.$request->old_product_image);
                        if (File::exists($old_product_image)) { 
                            unlink($old_product_image);
                        }
                    }
                    $originalPath = public_path('product/');
                    $product = $request->product_image;
                    $product_name = "product_".$coverSheet->id."_".$product->getClientOriginalName();
                    if(!empty($originalPath)){
                        if(!is_dir($originalPath)) {
                            mkdir($originalPath, 0755, true);
                        }
                        copy($product->getRealPath(), public_path('product/'.$product_name));
                    }
                    Product::where(['id' => $coverSheet->id])->update(['product_image'=>$product_name,'product_log'=>$product_name]);
                }

                \DB::commit();
                return redirect('admin/product')
                ->with('success', 'Product Updated!');
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
        $user = Product::find($id);
        $user->delete();

    }

    public function status_change()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $contact = Product::find($id);
        $contact->status = $status;
        $contact->save();

    }

    public function getproduct(Request $request)
    {
        if ($request->input('status') != "")
        {
            $data = Product::where('status', '=', $request->input('status'))
                ->orderBy('updated_at', 'DESC')
                ->get();
        }
        else
        {
            $data = Product::latest()->orderBy('updated_at', 'DESC')
                ->get();
        }

        return Datatables::of($data)->addIndexColumn()->addColumn('name', function ($row)
        {
            return $row->product_name;
        })
        ->addColumn('status', function ($row)
        {
            $check = ($row->status == 1) ? 'checked' : "";
            $btn = '<input id="chk_' . $row->id . '" onchange="statuschange(' . $row->id . ')" ' . $check . ' type="checkbox">';
            return $btn;
        })->addColumn('action', function ($row)  use($request)
        {
            $btn = '';
            if($request->user()->can('edit_Product')){
                $btn .= '<a href="' . route('product.edit', $row->id) . '" class="edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>';
            }
            if($request->user()->can('delete_Product')){
                $btn .= ' <a href="javascript:void(0);" onclick="deleteproduct(' . $row->id . ')" class="edit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>';
            }
            return $btn;
        })->rawColumns(['name', 'status', 'action'])
            ->make(true);

    }

    public function productList(Request $request)
    {
        //dd("productList");

        $productList = Product::latest()->orderBy('updated_at', 'DESC')->get();
        return view('product.index')->with(['productList' => $productList]);
    }

    public function productDetails(Request $request, $id)
    {
        //dd($id);

        $productData = Product::where('id', $id)->first();
        return view('product.productDetails')->with(['productData'=>$productData]);
    }

}
