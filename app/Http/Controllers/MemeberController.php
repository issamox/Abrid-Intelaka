<?php

namespace App\Http\Controllers;

use App\Mail\InteLakaCandidateEmail;
use App\Models\BusinessPlan;
use App\Models\Experience;
use App\Models\LegalFile;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MemeberController extends Controller
{
    public function index(){
        $members = Member::all();
        return view('members.index',compact('members'));
    }

    public function update(Member $member,Request $request){
        $request->validate([
            'description' => 'min:8|max:255'
        ]);
        $member->update([
            'projectDescription' => $request->description
        ]);

        return redirect()->back()->with('success','updated successfully');
    }

    public function sendMail($id){
        $member = Member::find($id);

        if ( $member->email ){

            $memberData = [
                'name' => $member->fullName,
                'id'  => $member->id,
            ];

            Mail::to( $member->email )->send(new InteLakaCandidateEmail( $memberData ));
            return redirect('/')->with('success','Email has been send successfully');
        }

        return redirect('/')->with('error','An unexpected error has occurred.');

    }

    public function tracking($id){
        $member =  Member::find($id);
        return view('members.demandTracking',compact('member'));
    }

    public function uploadFile(Request $request){
        $request->validate([
            'file'     => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'table'    => 'required',
            'memberId' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $file    = $request->file('file');
            $docName = $request->table . '_' . $request->memberId . '_' . $request->fileName .'.'. $file->getClientOriginalExtension();

            $file->move(public_path('uploads/candidats/'), $docName);

            $member =  Member::find($request->memberId);

            switch ( $request->table ){
                case 'members' :
                     $member->cin = $docName;
                     $member->save();
                     break;
                case 'experiences' :
                    $experience =  Experience::updateOrCreate( ['id' => $request->memberId ], [ $request->fileName  => $docName,]);
                    $member->experience_id = $experience->id;
                    $member->save();
                    break;
                case 'legal_files' :
                    $legalFile = LegalFile::updateOrCreate( ['id' => $request->memberId ], [ $request->fileName  => $docName,]);
                    $member->legal_file_id = $legalFile->id;
                    $member->save();
                    break;
                case 'business_plans' :
                    $businessPlan = BusinessPlan::updateOrCreate( ['id' => $request->memberId ], [ $request->fileName  => $docName,]);
                    $member->business_plan_id = $businessPlan->id;
                    $member->save();
                    break;

            }

            return response()->json([
               'message' =>  'File uploaded successfully.',
               'path'    => asset('uploads/candidats/'. $docName)
            ]);
        }

        return response()->json('File not found.', 400);

    }
}
