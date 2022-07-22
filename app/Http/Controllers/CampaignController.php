<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
use Auth;

class CampaignController extends Controller
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
        $request->validate([

            'cover_image' => 'required| mimes:jpeg,jpg,png',
            'document' => 'required|mimes:pdf',

        ]);

        if ($file = $request->file('cover_image')){
            $photo = time().'_'.$request->file('cover_image')->getClientOriginalName();
            $photo = str_replace(' ', '_', $photo);
            $file->move('cover_image',$photo);
        }
        if ($r_file = $request->file('document')){
            $name_file = time().'_'.$request->file('document')->getClientOriginalName();
            $name_file = str_replace(' ', '_', $name_file);
            $r_file->move('document',$name_file);

        }
        $campaign= new Campaign();
        $campaign->creator_id=Auth::id();
        $campaign->university_id = $request->university_id;
        $campaign->title = $request->title;
        $campaign->description = $request->description;
        $campaign->target_amount = $request->target_amount;
        $campaign->cover_image =$photo;
        $campaign->document =$name_file;
        $campaign->save();
        //redirect based on role
        if(Auth::user()->role =='1'){
            return redirect('/admin_manage_campaign')->with('success','Campaign Successfully Added');
        }else{
            return redirect('/user_campaign_all')->with('success','Campaign Successfully Added');
        }

    }

    public function del_campaign($id)
    {

        $ban = Campaign::find($id);
        $image_name = $ban->cover_image;
        $image_name='cover_image/'.$image_name;
        File::delete($image_name);

        $file_name = $ban->document;
        $file_name='document/'.$file_name;
        File::delete($file_name);

        $ban->delete();
        return redirect('/user_campaign_all')->with('status','Campaign Successfully Deleted');

    }

    public function approve_campaign($id)
    {

        $approve = Campaign::find($id);
        if($approve->campaign_status==1){
            return redirect('/campaign_university')->with('error','Campaign Already Activated');
        }else{

            $approve->campaign_status=2;
            $approve->save();
            return redirect('/campaign_university')->with('status','Campaign Successfully Verified');
        }

    }

    public function active_campaign($id)
    {

        $approve = Campaign::find($id);
        $approve->campaign_status=1;
        $approve->save();
        return redirect('/admin_manage_campaign')->with('status','Campaign Successfully Activated');
    }
    public function inactive_campaign($id)
    {

        $approve = Campaign::find($id);
        $approve->campaign_status=2;
        $approve->save();
        return redirect('/admin_manage_campaign')->with('status','Campaign Successfully InActivated');
    }
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request->campaign_id;
        // //delete existing image and file
        $userdata = Campaign::findOrFail($id);

        if($request->file('cover_image')!=null){
            $image_name = $userdata->cover_image;
            $image_name='cover_image/'.$image_name;
            File::delete($image_name);

            $request->validate([
                'cover_image' => 'required|mimes:jpeg,jpg,png',
            ]);

            if ($file = $request->file('cover_image')){
                $photo = time().'_'.$request->file('cover_image')->getClientOriginalName();
                $photo = str_replace(' ', '_', $photo);
                $file->move('cover_image',$photo);
            }
        }//cover imagear
        else{
            $photo=$userdata->cover_image;
        }

        if($request->file('document')!=null){
            $file_name = $userdata->document;
            $file_name='document/'.$file_name;
            File::delete($file_name);
            $request->validate([
                'document' => 'required|mimes:pdf',
            ]);

            if ($r_file = $request->file('document')){
                $name_file = time().'_'.$request->file('document')->getClientOriginalName();
                $name_file = str_replace(' ', '_', $name_file);
                $r_file->move('document',$name_file);

            }
        }//other image
        else{
            $name_file=$userdata->document;
        }

        $userdata->university_id = $request->university_id;
        $userdata->title = $request->title;
        $userdata->description = $request->description;
        $userdata->target_amount = $request->target_amount;
        $userdata->cover_image =$photo;
        $userdata->document =$name_file;
        $userdata->save();
        //redirect based on role
        if(Auth::user()->role =='1'){
            return redirect('/admin_manage_campaign')->with('success','Campaign Successfully Updated');
        }else{
            return redirect('/user_campaign_all')->with('status','Campaign Successfully Updated');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
