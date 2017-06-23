<?php

namespace Statamic\Addons\PdfUpload;

use Illuminate\Http\Request;
use Statamic\Extend\Controller;
use Statamic\API\AssetContainer;
use Statamic\API\Asset;
use Illuminate\Support\Facades\Log;

class PdfUploadController extends Controller
{
    /**
     * Maps to your route definition in routes.yaml
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->view('index');
    }

    public function save(Request $request)
    {
         // validate upload
         $this->validate($request, [
             'pdf' => 'mimes:pdf,sql,js|max:1000000'
         ]);
        //get file 
        $pdf = $request->file('upload');
        // get file extension
        $filext = $pdf->getClientOriginalExtension();
        // set file name
        $input['pdfname'] = $request->get('pdfname').'.'.$filext;
        // get working directory / create upload path
        $home_path = getcwd() .'/assets/pdf/';  
        // upload folder
        $destinationPath = public_path($home_path);
        // move file to upload folder
        $pdf->move($destinationPath, $input['pdfname']);
        // call update asset method / pass request and file extension
        $this->updateYaml($request,$filext);
        //
        return back()->with('success', 'Image Upload successful');
    }
    public function getAll(){
        //get asset list       
        $assets = Asset::whereContainer('main');
        return  $this->view('asset', compact('assets'));
    }
    public function getEdit(Request $request){
        $id  = $request->id;
        $asset = Asset::find($id);
        $file_detail = array(
            'file_id'=>$asset->id(),
            'file_path' => $asset->path(),
            );
        return $this->view('edit', compact('file_detail'));
    }

    public function updateAsset(Request $request){
        $id = $request->id;
        $asset = Asset::find($id);
        $asset->set('alt', $request->alt);
        $asset->set('year', $request->year);
        $asset->set('download', $request->download);
        $asset->save();
        return  back()->with('success', 'File Updated');
    }

    public function updateYaml($request,$filext)
    {
        // find container
        $container = AssetContainer::find('main');
        //get book name
        $pdfPath = 'pdf/' . $request->get('pdfname').'.' .$filext;
        // create asset
        $asset = $container->createAsset($pdfPath);
        // update meta data
        $asset->set('alt', $request->get('alt'));
        $asset->set('year', $request->get('year'));
        // save to file
        $asset->save();
    }
}
