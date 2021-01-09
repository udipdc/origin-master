<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

use DataTables,Validator;
use Illuminate\Support\Facades\Redirect;
use File;
use URL;

use Image;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.gallery.index');
    }

    public function create()
    {
        return view('admin.gallery.add_edit');
    }

    public function store(Request $request)
    {
        $rules = array(
            'image_name' => 'required',
            'image' => 'mimes:jpg,jpeg,png,JPG,JPEG,PNG',
        );
        $messages = [
            'image_name.required' => 'Please Enter Blog Name',
            'image.mimes' => 'Please select image format.(eg: jpg|jpeg|png|JPG|JPEG|PNG)',
        ];

        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();

                //dd("validation true");

                $image_name="";
                if(isset($request->image) && !empty($request->image))
                {
                    if($request->old_image != '' || $request->old_image != null){
                        $old_image = public_path('gallery/'.$request->old_image);
                        if (File::exists($old_image)) { 
                            unlink($old_image);
                        }
                    }
                    $originalPath = public_path('gallery/');
                    $image = $request->file('image');
                    $destinationPath = public_path('gallery/');
                    $img = Image::make($image->path());
                    $image_new_name = "image_".$image->getClientOriginalName();
                    if(!empty($originalPath))
                    {
                        if(!is_dir($originalPath))
                        {
                            mkdir($originalPath, 0755, true);
                        }
                        $img->resize(370, 278);
                        $img->save(public_path('gallery/'.$image_new_name));
                    }
                }

                $Gallery = new Gallery(['image_name' => $request->get('image_name'), 'image' => $image_new_name]);
                $Gallery->save();
                \DB::commit();
                return redirect('admin/gallery')
                ->with('success', 'Gallery saved!');
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

    public function edit(Gallery $gallery, $id)
    {
        $gallery = Gallery::find($id);
        return view('admin.gallery.add_edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery, $id)
    {
        $rules = array(
            'image_name' => 'required',
            'blog_image' => 'mimes:jpg,jpeg,png,JPG,JPEG,PNG',
        );
        $messages = [
            'image_name.required' => 'Please Enter Image Name',
            'image.mimes' => 'Please select image format.(eg: jpg|jpeg|png|JPG|JPEG|PNG)',
        ];

        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();

                $imageData = Gallery::find($id);
                $imageData->image_name = $request->get('image_name');
                $imageData->save();

                if(isset($request->image) && !empty($request->image))
                {
                    if($request->old_image != '' || $request->old_image != null){
                        $old_image = public_path('gallery/'.$request->old_image);
                        if (File::exists($old_image)) { 
                            unlink($old_image);
                        }
                    }
                    $originalPath = public_path('gallery/');
                    $image = $request->file('image');
                    $destinationPath = public_path('gallery/');
                    $img = Image::make($image->path());
                    $image_name = "image_".$image->getClientOriginalName();
                    if(!empty($originalPath))
                    {
                        if(!is_dir($originalPath))
                        {
                            mkdir($originalPath, 0755, true);
                        }
                        $img->resize(370, 278);
                        $img->save(public_path('gallery/'.$image_name));
                    }
                    Gallery::where(['id' => $imageData->id])->update(['image'=>$image_name]);
                }
                else
                {
                    //dd("not available image");
                    if($request->old_image == '' || $request->old_image == null)
                    {
                        if($imageData->image!= null)
                        {
                            $old_image = public_path('gallery/'.$imageData->image);
                            if(File::exists($old_image))
                            { 
                                unlink($old_image);
                            }
                            Gallery::where(['id' => $imageData->id])->update(['image'=>""]);
                        }
                    }
                }

                \DB::commit();
                return redirect('admin/gallery')
                ->with('success', 'Gallery Updated!');
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

    public function delete(Gallery $gallery)
    {
        $id = $_POST['id'];
        $gallery = Gallery::find($id);
        if(!empty($gallery->id))
        {
            $image_path = public_path('gallery/'.$gallery->image);
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }
            $deleteStatus = $gallery->forceDelete();
        }
    }

    public function getgallery(Request $request)
    {
        if ($request->input('status') != "")
        {
            $data = Gallery::where('status', '=', $request->input('status'))
                ->orderBy('updated_at', 'DESC')
                ->get();
        }
        else
        {
            $data = Gallery::latest()->orderBy('updated_at', 'DESC')
                ->get();
        }

        return Datatables::of($data)->addIndexColumn()
        ->addColumn('name', function ($row)
        {
            return $row->image_name;
        })
        ->addColumn('image', function ($row)
        {
            //return "<img src='{{public_path('gallery/'.$row->image)}}' border='0' width='40' class='img-rounded' align='center' />";
            /*$imageURL = "<img src='{{url('gallery/'.$row->image)}}' />";
            return $imageURL;*/

            $imagePath = url('gallery/'.$row->image);
            return $imagePath;
        })
        ->addColumn('status', function ($row)
        {
            $check = ($row->status == 1) ? 'checked' : "";
            $btn = '<input id="chk_' . $row->id . '" onchange="image_status_change(' . $row->id . ')" ' . $check . ' type="checkbox">';
            return $btn;
        })->addColumn('action', function ($row)  use($request)
        {
            $btn = '';
            $btn .= '<a href="' . route('gallery.edit', $row->id) . '" class="edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>';
            $btn .= ' <a href="javascript:void(0);" onclick="deletegallery(' . $row->id . ')" class="edit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>';
            return $btn;
        })->rawColumns(['name', 'image', 'status', 'action'])
            ->make(true);
    }

    public function image_status_change()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $imageData = Gallery::find($id);
        $imageData->status = $status;
        $imageData->save();

    }

}
