<?php
use App\Setting;
use App\User;
use App\JobApplication;
use Illuminate\Support\Facades\Auth;

function activeLinkMenuOpen($links)
{
	$checklinks  = explode(',',trim($links));
	$currentlink = Route::current()->getName();
	if(in_array($currentlink,$checklinks)){
		echo 'collapse in';
	}
}

function activeMenuLink($links)
{
	$checklinks  = explode(',',trim($links));
	$currentlink = Route::current()->getName();
	if(in_array($currentlink,$checklinks)){
		echo 'active';
	}
}

function uploadImage($image,$originalPath,$mediumPath='',$thumbnailPath='')
{
	try{
		$ImageUpload = \Image::make($image);
	  	$image_name = time()."_".$image->getClientOriginalName();
	  	if(!empty($originalPath)){
		  if(!is_dir($originalPath)) {
		      mkdir($originalPath, 0755, true);
		  }
		  $ImageUpload = $ImageUpload->save($originalPath.$image_name);
		}

	  	/*for save medium image*/
	  	if(!empty($mediumPath)){
		  	if(!is_dir($mediumPath)) {
		     	mkdir($mediumPath, 0755, true);
		 	 }
		  	$ImageUpload->resize(800,500,function ($constraint) {
		    	$constraint->aspectRatio();
		    	$constraint->upsize();
		  	});
		  	$ImageUpload = $ImageUpload->save($mediumPath.$image_name);
	  	}
	  	// for save thumnail image
	  	if(!empty($thumbnailPath)){
		  	if(!is_dir($thumbnailPath)) {
		    	 mkdir($thumbnailPath, 0755, true);
		  	}
		  	$ImageUpload->resize(180,120, function ($constraint) {
		    	$constraint->aspectRatio();
		    	$constraint->upsize();
		  	});
		  	$ImageUpload = $ImageUpload->save($thumbnailPath.$image_name);
		}
		return $image_name;
	} catch(\Exception $e){
		$msg = $e->getMessage();
		return Redirect::back()->with('error',$msg);
	}
}

function curlRequest($url,$data=array())
{
		$ch = curl_init(trim($url));
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		$result = curl_exec($ch);
		curl_close($ch);
		// print_r ($result);
    return $result;
}


function settingData(){
	return Setting::first();
}

function Prophecy($functionName, $params)
{
	/*$ProphecyConnect = new SoapClient(config('global.prophecy_url'));
	//$data = $ProphecyConnect->__soapCall($functionName, array($params));
	$data = $ProphecyConnect->__soapCall($functionName, array($params));
	return $data;*/

	$securityCode = "6C75E0B5AA2382C330CD55E41BC265B6";
	//old worked.
	//$ProphecyConnect = new \SoapClient("http://apiconnect.prophecyhealth.com/ProphecyConnect/ProphecyConnect.cfc?wsdl");
	$ProphecyConnect = new \SoapClient("http://apiconnect.prophecyhealth.com/ProphecyConnect/ProphecyConnect.cfc?wsdl");
	$data = $ProphecyConnect->__soapCall($functionName, array($params));
	return $data;

}

function HeaderNameData($nurseName)
{
	//return User::separate_contact_name($nurseName);

	$userLetter=null;
	$jobData = JobApplication::where('email', Auth::user()->email)->first();
	if($jobData!=null && !is_null($jobData))
	{
		$nurseName = $jobData->firstname." ".$jobData->lastname;
		$userLetter = User::separate_contact_name($nurseName);
	}
	return $userLetter;
}
