<?php

namespace App\Http\Controllers;

use App\Mail\InteLakaCandidateEmail;
use App\Models\BusinessPlan;
use App\Models\Experience;
use App\Models\LegalFile;
use App\Models\Member;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use setasign\Fpdi\Fpdi;
use ZipArchive;

class MemeberController extends Controller
{
    private $candidateUpload = 'uploads/candidats/';

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
            $memberData = [ 'name' => $member->fullName, 'id'  => $member->id,];
            Mail::to( $member->email )->send(new InteLakaCandidateEmail( $memberData ));
            return redirect('/')->with('success','Email has been send successfully');
        }

        return redirect('/')->with('error','An unexpected error has occurred.');

    }
    public function tracking(Member $member){
        return view('members.demandTracking',compact('member'));
    }
    public function formationForm(Member $member){
        $training = Training::where('member_id',$member->id)->first();
        return view('members.formationForm',compact('member','training'));
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

            $file->move($this->candidateUpload, $docName);

            $member =  Member::find($request->memberId);

            switch ($request->table) {
                case 'members':
                    $this->updateMemberCin($member, $docName);
                    break;
                case 'experiences':
                    $this->updateExperience($request->memberId, $request->fileName, $docName, $member);
                    break;
                case 'legal_files':
                    $this->updateLegalFile($request->memberId, $request->fileName, $docName, $member);
                    break;
                case 'business_plans':
                    $this->updateBusinessPlan($request->memberId, $request->fileName, $docName, $member);
                    break;
                case 'trainings':
                    $this->updateTraining($request->memberId, $request->fileName, $docName);
                    break;
            }
            $member->save();

            return response()->json([
               'message' =>  'File uploaded successfully.',
               'path'    => asset($this->candidateUpload. $docName)
            ]);
        }

        return response()->json('File not found.', 400);

    }
    public function projectFilePdf(Member $member){
        // Path to the existing PDF file
        $pdfFilePath = public_path('sources/projectFile.pdf');

        // initiate FPDI
        $pdf = new Fpdi();
        $pdf->AddPage('L');
        $pdf->setSourceFile($pdfFilePath);
        $tplId = $pdf->importPage(1);
        $pdf->useTemplate($tplId, 0, 0);

        $pdf->SetFont('Helvetica');

        $pdf->Text(10    , 97, $member->fullName);
        $pdf->Text(85       , 97, $member->province);

        $pdf->SetXY(150, 115);
        $pdf->MultiCell(0, 6, Str::limit( $member->projectDescription,130));

        $imagePath = public_path('images/photo.jpg');
        $pdf->Image($imagePath, 11, 10, 50, 64, 'JPEG');


        $pdf->Output();
    }
    public function candidateInfoPdf(Member $member){
        // Path to the existing PDF file
        $pdfFilePath = public_path('sources/candidateInfo.pdf');

        // initiate FPDI
        $pdf = new Fpdi();
        $pdf->AddPage();
        $pdf->setSourceFile($pdfFilePath);
        $tplId = $pdf->importPage(1);
        $pdf->useTemplate($tplId, 0, 0);

        $pdf->SetFont('Helvetica');

        $pdf->Text(10    , 78, $member->fullName);
        $pdf->Text(10       , 104, $member->province);
        $pdf->Text(10       , 128, $member->mobile);
        $pdf->Text(105       , 128, $member->email);

        $pdf->Output();
    }
    public function createZipFile(Member $member)
    {

        $zipFileName = 'candidate'. trim($member->fullName) .'.zip';

        $zip = new ZipArchive();

        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $filesToZip = glob($this->candidateUpload . '*_'.$member->id.'_*');
            foreach ($filesToZip as $file) {
                $zip->addFile($file, basename($file));
            }

            $zip->close();

            return response()->download($zipFileName)->deleteFileAfterSend(true);
        } else {
            return response()->json(['error' => 'Unable to create the zip file.'], 500);
        }
    }


    // Helper method to update member cin
    private function updateMemberCin(Member $member, $docName)
    {
        $member->cin = $docName;
        $member->save();
    }
    // Helper method to update or create an experience
    private function updateExperience($memberId, $fileName, $docName, Member $member)
    {
        $experience = Experience::updateOrCreate(['id' => $memberId], [$fileName => $docName]);
        $member->experience_id = $experience->id;
        $member->save();
    }
    // Helper method to update or create a legal file
    private function updateLegalFile($memberId, $fileName, $docName, Member $member)
    {
        $legalFile = LegalFile::updateOrCreate(['id' => $memberId], [$fileName => $docName]);
        $member->legal_file_id = $legalFile->id;
        $member->save();
    }
   // Helper method to update or create a business plan
    private function updateBusinessPlan($memberId, $fileName, $docName, Member $member)
    {
        $businessPlan = BusinessPlan::updateOrCreate(['id' => $memberId], [$fileName => $docName]);
        $member->business_plan_id = $businessPlan->id;
        $member->save();
    }
   // Helper method to update or create a training
    private function updateTraining($memberId, $fileName, $docName)
    {
        Training::updateOrCreate(['id' => $memberId], [
            $fileName  => $docName,
            'member_id' => $memberId,
            'user_id'   => Auth::id()
        ]);
    }
}
