<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator,File;
use App\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Setting::first();
        return view('admin.settings.add_edit')->with(['data' => $data]);
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
            'footer_text' => 'required|max:100',
            'site_logo' => 'nullable|mimes:jpeg,jpg,png,gif,svg',
            'pdf_template' => 'nullable|mimes:pdf',
        );
        $messages = [
            'footer_text.required' => 'Please enter footer text',
            'site_logo.mimes' => 'Please select logo in formats.(jpeg,jpg,png,gif,svg)',
            'pdf_template.mimes' => 'Please select template in format.(eg: pdf|PDF)',
        ];
        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();
                    
                    $data = array();
                    if($request->file('site_logo')){
                        $originalPath = public_path('front/images/Logo/');
                        if($request->old_site_logo != null || $request->old_site_logo != ''){
                            $old_site_logo = public_path('front/images/Logo').'/'.$request->old_site_logo;
                            if (File::exists($old_site_logo)) { 
                                unlink($old_site_logo);
                            }
                        }
                        $logo = $request->site_logo;
                        $logo_name = time()."_".$logo->getClientOriginalName();
                        if(!empty($originalPath)){
                            if(!is_dir($originalPath)) {
                                mkdir($originalPath, 0755, true);
                            }
                            copy($logo->getRealPath(), public_path('front/images/Logo/'.$logo_name));
                        }
                        
                    } else {
                        if($request->old_site_logo != '' || $request->old_site_logo != null){
                            $logo_name = $request->old_site_logo;
                        }
                    }

                    $pdf_template_name = '';
                    if(isset($request->pdf_template) && !empty($request->pdf_template)) {
                        if($request->old_pdf_template != '' || $request->old_pdf_template != null){
                            $old_pdf_template = public_path('PDFTemplates/'.$request->old_pdf_template);
                            if (File::exists($old_pdf_template)) { 
                                unlink($old_pdf_template);
                            }
                        }
                        $originalPath = public_path('PDFTemplates/');
                        $pdf_template = $request->pdf_template;
                        $pdf_template_name = time()."_".$pdf_template->getClientOriginalName();
                        if(!empty($originalPath)){
                            if(!is_dir($originalPath)) {
                                mkdir($originalPath, 0755, true);
                            }
                            copy($pdf_template->getRealPath(), public_path('PDFTemplates/'.$pdf_template_name));
                        }

                    }else {
                        if($request->old_pdf_template != '' || $request->old_pdf_template != null){
                            $pdf_template_name = $request->old_pdf_template;
                        }
                    }
                  
                    $data['site_logo'] = $logo_name;
                    $data['pdf_template'] = $pdf_template_name;
                    $data['footer_text'] = $request->footer_text;
                    Setting::updateOrCreate([
                        'id' => 1
                    ],$data);
                
                \DB::commit();
                return Redirect::back()->with('success','Setting data has been added successfully');
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
}
