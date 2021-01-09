<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

use DataTables,Validator;
use Illuminate\Support\Facades\Redirect;
use File;

use Image;
use Auth;
use App\User;

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
                    /*$originalPath = public_path('blogs/');
                    $resume = $request->blog_image;
                    $blog_image_name = "blog_".$resume->getClientOriginalName();
                    if(!empty($originalPath)){
                        if(!is_dir($originalPath)) {
                            mkdir($originalPath, 0755, true);
                        }
                        copy($resume->getRealPath(), public_path('blogs/'.$blog_image_name));
                    }*/

                    $originalPath = public_path('blogs/');
                    $image = $request->file('blog_image');
                    $img = Image::make($image->path());
                    $blog_image_name = "blog_".$image->getClientOriginalName();
                    if(!empty($originalPath))
                    {
                        if(!is_dir($originalPath))
                        {
                            mkdir($originalPath, 0755, true);
                        }
                        $img->resize(370, 278);
                        $img->save(public_path('blogs/'.$blog_image_name));
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
                    /*$originalPath = public_path('blogs/');
                    $blog = $request->blog_image;
                    $blog_image_name = "blog_".$blog->getClientOriginalName();
                    if(!empty($originalPath)){
                        if(!is_dir($originalPath)) {
                            mkdir($originalPath, 0755, true);
                        }
                        copy($blog->getRealPath(), public_path('blogs/'.$blog_image_name));
                    }
                    Blog::where(['id' => $blogData->id])->update(['blog_image'=>$blog_image_name]);*/

                    $originalPath = public_path('blogs/');
                    $image = $request->file('blog_image');
                    $img = Image::make($image->path());
                    $blog_image_name = "blog_".$image->getClientOriginalName();
                    if(!empty($originalPath))
                    {
                        if(!is_dir($originalPath))
                        {
                            mkdir($originalPath, 0755, true);
                        }
                        $img->resize(370, 278);
                        $img->save(public_path('blogs/'.$blog_image_name));
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
        /*$id = $_POST['id'];
        $blog = Blog::find($id);
        $blog->delete();*/
        $id = $_POST['id'];
        $blog = Blog::find($id);
        if(!empty($blog->id))
        {
            $image_path = public_path('blogs/'.$blog->blog_image);
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }
            $deleteStatus = $blog->forceDelete();
        }
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

    /*start front contactUs image change.*/
        public function ContactChange(Request $request)
        {
            //echo "ContactChange";exit();

            $userData = User::where('id', Auth::user()->id)->first();
            //echo "<pre>"; print_r($userData); exit();
            return view('admin.admin_contact_page', compact('userData'));
        }

        public function contact_image_change(Request $request)
        {
            //echo "contact_image_change";exit();

            $rules = array(
                'contact_image' => 'mimes:jpg,jpeg,png,JPG,JPEG,PNG',
            );
            $messages = [
                'contact_image.mimes' => 'Please select image format.(eg: jpg|jpeg|png|JPG|JPEG|PNG)',
            ];
            $validator = validator::make($request->all(), $rules,$messages);

            if($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else
            {
                try {
                    \DB::beginTransaction();

                    $userId = Auth::user()->id;
                    //echo "<pre>"; print_r($userId); exit();

                    $userData = User::find($userId);

                    if(isset($request->contact_image) && !empty($request->contact_image))
                    {
                        if($request->old_contact_image != '' || $request->old_contact_image != null){
                            $old_contact_image = public_path('front/images/'.$request->old_contact_image);
                            if (File::exists($old_contact_image)) { 
                                unlink($old_contact_image);
                            }
                        }
                        $originalPath = public_path('front/images/');
                        $image = $request->file('contact_image');
                        $img = Image::make($image->path());
                        $contact_image_name = $image->getClientOriginalName();
                        if(!empty($originalPath))
                        {
                            if(!is_dir($originalPath))
                            {
                                mkdir($originalPath, 0755, true);
                            }
                            $img->resize(370, 278);
                            $img->save(public_path('front/images/'.$contact_image_name));
                        }
                        User::where(['id' => $userId])->update(['contact_image'=>$contact_image_name]);
                    }
                    else
                    {
                        //dd("not available image");
                        if($request->old_contact_image == '' || $request->old_contact_image == null)
                        {
                            if($userData->contact_image!= null)
                            {
                                $old_contact_image = public_path('front/images/'.$userData->contact_image);
                                if(File::exists($old_contact_image))
                                { 
                                    unlink($old_contact_image);
                                }
                                User::where(['id' => $userId])->update(['contact_image'=>""]);
                            }
                        }
                    }

                    \DB::commit();
                    return redirect('admin/blog/contact_change')->with('success', 'ContactUs Updated!');

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
    /*end front contactUs image change.*/

}
