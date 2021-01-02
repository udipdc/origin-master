<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

use DataTables,Validator;
use Illuminate\Support\Facades\Redirect;
use File;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index');
    }

    public function create()
    {
        return view('admin.blog.add_edit');
    }

    public function store(Request $request)
    {
        $rules = array(
            'blog_name' => 'required',
            'blog_link' => 'required',
            'blog_details' => 'required',
            'blog_image' => 'mimes:jpg,jpeg,png,JPG,JPEG,PNG',
        );
        $messages = [
            'blog_name.required' => 'Please Enter Blog Name',
            'blog_link.required' => 'Please Enter Blog Link',
            'blog_details.required' => 'Please Enter Blog Details',
            'blog_details.mimes' => 'Please select image format.(eg: jpg|jpeg|png|JPG|JPEG|PNG)',
        ];

        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();

                //dd("validation true");

                $blog_image_name="";
                if(isset($request->blog_image) && !empty($request->blog_image))
                {
                    if($request->old_blog_image != '' || $request->old_blog_image != null){
                        $old_blog_image = public_path('blogs/'.$request->old_blog_image);
                        if (File::exists($old_blog_image)) { 
                            unlink($old_blog_image);
                        }
                    }
                    $originalPath = public_path('blogs/');
                    $resume = $request->blog_image;
                    $blog_image_name = "blog_".$resume->getClientOriginalName();
                    if(!empty($originalPath)){
                        if(!is_dir($originalPath)) {
                            mkdir($originalPath, 0755, true);
                        }
                        copy($resume->getRealPath(), public_path('blogs/'.$blog_image_name));
                    }
                }

                $Blog = new Blog(['blog_name' => $request->get('blog_name'), 'blog_image' => $blog_image_name, 'blog_link' => $request->get('blog_link'), 'blog_details' => $request->get('blog_details'),]);
                $Blog->save();
                \DB::commit();
                return redirect('admin/blog')
                ->with('success', 'Blog saved!');
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

    public function edit(Blog $blog, $id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.add_edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog, $id)
    {
        $rules = array(
            'blog_name' => 'required',
            'blog_link' => 'required',
            'blog_details' => 'required',
            'blog_image' => 'mimes:jpg,jpeg,png,JPG,JPEG,PNG',
        );
        $messages = [
            'blog_name.required' => 'Please Enter Blog Name',
            'blog_link.required' => 'Please Enter Blog Link',
            'blog_details.required' => 'Please Enter Blog Details',
            'blog_details.mimes' => 'Please select image format.(eg: jpg|jpeg|png|JPG|JPEG|PNG)',
        ];

        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();

                $blogData = Blog::find($id);
                $blogData->blog_name = $request->get('blog_name');
                $blogData->blog_link = $request->get('blog_link');
                $blogData->blog_details = $request->get('blog_details');
                $blogData->save();

                if(isset($request->blog_image) && !empty($request->blog_image))
                {
                    if($request->old_blog_image != '' || $request->old_blog_image != null){
                        $old_blog_image = public_path('blogs/'.$request->old_blog_image);
                        if (File::exists($old_blog_image)) { 
                            unlink($old_blog_image);
                        }
                    }
                    $originalPath = public_path('blogs/');
                    $blog = $request->blog_image;
                    $blog_image_name = "blog_".$blog->getClientOriginalName();
                    if(!empty($originalPath)){
                        if(!is_dir($originalPath)) {
                            mkdir($originalPath, 0755, true);
                        }
                        copy($blog->getRealPath(), public_path('blogs/'.$blog_image_name));
                    }
                    Blog::where(['id' => $blogData->id])->update(['blog_image'=>$blog_image_name]);
                }
                else
                {
                    //dd("not available image");
                    if($request->old_blog_image == '' || $request->old_blog_image == null)
                    {
                        if($blogData->blog_image!= null)
                        {
                            $old_blog_image = public_path('blogs/'.$blogData->blog_image);
                            if(File::exists($old_blog_image))
                            { 
                                unlink($old_blog_image);
                            }
                            Blog::where(['id' => $blogData->id])->update(['blog_image'=>""]);
                        }
                    }
                }

                \DB::commit();
                return redirect('admin/blog')
                ->with('success', 'Blog Updated!');
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

    public function delete(Blog $blog)
    {
        $id = $_POST['id'];
        $blog = Blog::find($id);
        $blog->delete();
    }

    public function blog_status_change()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $blog = Blog::find($id);
        $blog->status = $status;
        $blog->save();

    }

    public function getblog(Request $request)
    {
        if ($request->input('status') != "")
        {
            $data = Blog::where('status', '=', $request->input('status'))
                ->orderBy('updated_at', 'DESC')
                ->get();
        }
        else
        {
            $data = Blog::latest()->orderBy('updated_at', 'DESC')
                ->get();
        }

        return Datatables::of($data)->addIndexColumn()
        ->addColumn('name', function ($row)
        {
            return $row->blog_name;
        })
        ->addColumn('link', function ($row)
        {
            return $row->blog_link;
        })
        ->addColumn('status', function ($row)
        {
            $check = ($row->status == 1) ? 'checked' : "";
            $btn = '<input id="chk_' . $row->id . '" onchange="blog_status_change(' . $row->id . ')" ' . $check . ' type="checkbox">';
            return $btn;
        })->addColumn('action', function ($row)  use($request)
        {
            $btn = '';
            $btn .= '<a href="' . route('blog.edit', $row->id) . '" class="edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>';
            $btn .= ' <a href="javascript:void(0);" onclick="deleteblog(' . $row->id . ')" class="edit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>';
            return $btn;
        })->rawColumns(['name', 'status', 'action'])
            ->make(true);
    }

}
