<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CCharterMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

  //External Services//
    //SETUP
        $pdf1 = "pdf/External/Steps/Setup/1-TNA.pdf";
        $pdf2 = "pdf/External/Steps/Setup/2-Proposal.pdf";
        $pdf3 = "pdf/External/Steps/Setup/3-Evaluation.pdf";

   //LGIA
        $pdf4 = "pdf/External/Steps/Lgia/1-Request.pdf";
        $pdf5 = "pdf/External/Steps/Lgia/2-Proposal.pdf";
    //TCS
        $pdf6 = "pdf/External/Steps/Tcs/1-Application.pdf";

    //PandL
        $pdf7 = "pdf/External/Steps/Pl/1-PandL.pdf";

    //RSTL
        $pdf8 = "pdf/External/Steps/Rstl/1-Submission of Samples.pdf";
        $pdf9 = "pdf/External/Steps/Rstl/2-Releasing.pdf";
        $pdf10 = "pdf/External/Steps/Rstl/3-Rstl Brochure.pdf";
        $pdf11 = "pdf/External/Steps/Rstl/4-Metrology Brochure.pdf";

    //SEI
        $pdf12 = "pdf/External/Steps/Sei/1-Scholarship Application.pdf";
        $pdf13 = "pdf/External/Steps/Sei/2-Clearance.pdf";
        $pdf14 = "pdf/External/Steps/Sei/3-Certificate of Enrollment.pdf";

   //Admin
        $pdf15 = "pdf/External/Steps/Admin/1-Customer Inquiry.pdf";
        $pdf16 = "pdf/External/Steps/Admin/2-Incoming Document.pdf";
        $pdf17 = "pdf/External/Steps/Admin/3-Releasing of Document.pdf";

    //Cashier
        $pdf18 = "pdf/External/Steps/Cashier/1-Payment of Claims by Check.pdf";
        $pdf19 = "pdf/External/Steps/Cashier/2-Payment of Claims by LDDAP-ADA.pdf";
        $pdf20 = "pdf/External/Steps/Cashier/3-Collection of Laboratory Fees.pdf";

    //Procurement
        $pdf21 = "pdf/External/Steps/Procurement/1-Public Bidding.pdf";
        $pdf22 = "pdf/External/Steps/Procurement/2-Small Value.pdf";
        $pdf23 = "pdf/External/Steps/Procurement/3-Annex A.pdf";

    //Hr
        $pdf24 = "pdf/External/Steps/Hr/1-Application for Employment.pdf";
        $pdf25 = "pdf/External/Steps/Hr/2-Queries on Employment.pdf";

//End External Services//

//Internal Services//
    //Hr
        $pdf26 = "pdf/Internal/Steps/Hr/1-Application for Employment.pdf";
        $pdf27 = "pdf/Internal/Steps/Hr/2-Response to Queries on Employment.pdf";
    //Budget
        $pdf28 = "pdf/Internal/Steps/Budget/1-ORS.pdf";
        $pdf29 = "pdf/Internal/Steps/Budget/2-AnnexA.pdf";
        $pdf30 = "pdf/Internal/Steps/Budget/3-AnnexB.pdf";

    //Accounting
        $pdf31 = "pdf/Internal/Steps/Accounting/1-DV.pdf";
        $pdf32 = "pdf/Internal/Steps/Accounting/2-AnnexA.pdf";
        $pdf33 = "pdf/Internal/Steps/Accounting/3-AnnexB.pdf";
    //Planning
        $pdf34 = "pdf/Internal/Steps/Planning/1-Preparation of Reports.pdf";
     //MIS
        $pdf35 = "pdf/Internal/Steps/Mis/1-CorrectiveMaintenances.pdf";
        $pdf36 = "pdf/Internal/Steps/Mis/2-OtherICTServices.pdf";

//End Internal Services//



        return view('sub-menu.ccharter-menu',compact('pdf1','pdf2','pdf3','pdf4','pdf5','pdf6','pdf7','pdf8','pdf9','pdf10','pdf11',
        'pdf12','pdf13','pdf14','pdf15','pdf16','pdf17','pdf18','pdf19','pdf20','pdf20','pdf21','pdf22','pdf23','pdf24','pdf25',
        'pdf26','pdf27','pdf28','pdf29','pdf30','pdf31','pdf32','pdf33','pdf34','pdf35','pdf36'));
    }

    /**
     * Show the form for creating a new resource.
     *
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
        //
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
