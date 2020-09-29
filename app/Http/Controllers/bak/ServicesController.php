<?php

namespace App\Http\Controllers;
use App\Service;
use App\UserDivision;
use App\UserUnit;
use App\ServicesProc;
use App\ServicesProcNote;
use App\ServicesProcItem;
use App\ChecklistReq;
use App\Attachment;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;
use File;
use Auth;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $attachments= Attachment::all();

        return view('attachments.index', compact('attachments','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $divisions = UserDivision::get();
        return view('services.create',compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $division = $request->division_id;
        $unitOwner = $request->unit_owner;
        $title = $request->title;
        $description = $request->description;
        $attachment = $request->file('attachment');
        $officeDivision = $request->office_division;
        $classification = $request->classification;
        $transactionType = $request->transaction_type;
        $whoAvail = $request->who_avail;

        $validator = Validator::make($request->all(), [
            'division_id' => 'required',
            'unit_owner' => 'required',
            'title' => 'required',
            'description' => 'required',
            //'attachment' => 'required',
            'office_division' => 'required',
            'classification' => 'required',
            'transaction_type' => 'required',
            'who_avail' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->with('fail')
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $instanceSrvs = new Service;
            $instanceSrvs->division = $division;
            $instanceSrvs->unit_owner = $unitOwner;
            $instanceSrvs->title = $title;
            $instanceSrvs->description = $description;
            $instanceSrvs->office_division = $officeDivision;
            $instanceSrvs->classification = $classification;
            $instanceSrvs->transaction_type = $transactionType;
            $instanceSrvs->who_avail = $whoAvail;
            $instanceSrvs->save();

            $srvsData = Service::orderBy('created_at', 'desc')->first();
            $parentID = $srvsData->id;

            $instanceAttachment = new Attachment;
            $moduleType = 'services';

            $directory = $this->uploadFile($parentID, $attachment);

            if (!empty($directory)) {
                $instanceAttachment->parent_id = $parentID;
                $instanceAttachment->module_type = $moduleType;
                $instanceAttachment->directory = $directory;
                $instanceAttachment->uploaded_by = Auth::user()->id;
                $instanceAttachment->save();
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail', 'Fail');
        }

        return redirect()->back()->with('success', 'Success');

        /*
        // return $request;
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        // ]);
        // $services = Service::create($validatedData);

        // return redirect('/services')->with('success', 'Service is successfully saved');

            $data = $request->all();
            $services_id=Service::create($data)->id;
            if($request->requirements){

                foreach ($request->requirements as $checklist_req=>$v){
                    $data2= array(
                        'services_id'=>$services_id,
                        'requirements'=>$request->requirements[$checklist_req],
                        'where_secure'=>$request->where_secure[$checklist_req]
                    );
                    ChecklistReq::insert($data2);
                }
            }
            // if(count($request->process_name)>0){

            //     foreach($request->process_name as $services_proc){
            //         $data3= array(
            //             'services_id'=>$services_id,
            //             'process_name'=>$request->requirement[$services_proc]
            //         );
            //         ServicesProc::insert($data3);
            //         $services_proc_id= ServicesProc::find('id');

            //         if(count($request->cliet_step)>0){
            //             foreach($request->cliet_step as $services_proc_itm){
            //                 $data4= array(
            //                     'services_id'=>$services_id,
            //                     'srv_proc_id'=>$services_proc_id,
            //                     'client_step'=>$request->cliet_step[$services_proc_itm],
            //                     'agency_action'=>$request->agency_action[$services_proc_itm],
            //                     'fee'=>$request->fee[$services_proc_itm],
            //                     'proc_time'=>$request->proc_time[$services_proc_itm],
            //                     'respond_person'=>$request->respond_person[$services_proc_itm],

            //                 );
            //                 ServicesProcItem::insert($data4);
            //          }
        //        }
        //     }
        // }
        return redirect()->back()->with('success');
        // return $data2;
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data=Attachment::find($id);
       return view('attachments.show', compact('data'));

    //    $services = Service::all();
    //     $attachments= Attachment::all();

    //     return view('attachments.show', compact('attachments','services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::findOrFail($id);

        return view('services.edit', compact('services'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        Service::whereId($id)->update($validatedData);

        return redirect('/services')->with('success', 'Service is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Service::findOrFail($id);
        $services->delete();

        return redirect('/services')->with('success', 'services is successfully deleted');
    }

    public function getDivision(){
        $divisions = UserDivision::get();
        return view('services.create', [
            'divisions' => $divisions
        ]);

    }

    public function getUnits($divisionID){
        $units = UserUnit::where('division', $divisionID)->get();
        return response()->json($units);

        // dd($units);
    }

    private function uploadFile($parentID, $attachment) {
        $directory = "";

        if (!empty($attachment)) {
            $newFileName = $attachment->getClientOriginalName();
            Storage::put("public/attachments/$parentID/$newFileName/",
                         file_get_contents($attachment));
            $directory = "storage/attachments/$parentID/$newFileName";
        }

        return $directory;
    }
}
