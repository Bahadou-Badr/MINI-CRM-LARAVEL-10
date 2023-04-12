<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use App\Models\Action;
use App\Models\Company;
use App\Models\Invitation;
use App\Models\User;
use App\Services\ActionLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    private ActionLogService $actionLogService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActionLogService $actionLogService)
    {
        $this->actionLogService = $actionLogService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invitations = User::find(Auth::id())->invitations;
        return view('invitations.index', ['invitations' => $invitations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::select('id', 'company_name')->get();
        return view('invitations.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function inviteUser(Request $request)
    public function store(Request $request)
    {
        $request->validate([
            'employer_name' => 'required|max:255',
            'email' => 'required|email|unique:invitations|max:255', // email must be unique
            'company' => 'required|max:255',
        ]);
        // Generate a unique token for the invitation
        $token = Str::random(40);
        // Save the invitation in DB
        $invitation = Invitation::create([
            'employer_name' => $request->employer_name,
            'email' => $request->email,
            'status' => 0, // STATUS VALUES : 0 = en attente | 1 = validée | 2 = annulée || Default value equal 0
            'company_id' =>  $request->company,
            'token' => $token,
            'admin_id' => $request->user()->id,
        ]);
        // Create a new Action Log record for the invitation sent
        $this->actionLogService->CreateActionLog("invitation_sent", $invitation);
        // Send the invitation email with a link to the registration page
        $registrationLink = url('/verify/invitation?token=' . $token);
        Mail::to($invitation->email)->send(new InvitationMail($registrationLink));

        return redirect()->route('invitations.index')->with('status', "L'invitation a été envoyée avec succès");
    }

    /**
     * verify Invitation token.
     */
    public function verifyInvitation(Request $request)
    {
        // Get token from the URL
        $token = $request->query('token');

        // Find the invitation with the matching token and the status != 2 (annulée)
        $invitation = Invitation::where('token', $token)->where('status', '<>', 2)->first();

        // If the token is not valid, show an error message
        if (!$invitation) {
            abort(404, 'Token invalide');
        }

        //change the status of the invitation , status should be equal 1 : validée
        $invitation->status = 1;
        $invitation->save();
        // Create a new Action Log record for the invitation valid
        $this->actionLogService->CreateActionLog("invitation_valid", $invitation);

        // Display the registration form for the employee to complete
        return view('employees.register', ['invitation' => $invitation]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function cancelInvitation(string $id)
    {
        $invitation = Invitation::find($id);
        //change the status of the invitation , status should be equal 2 : annulée
        $invitation->status = 2;
        $invitation->save();

        // Create a new Action Log record for the invitation cancel
        $this->actionLogService->CreateActionLog("invitation_cancel", $invitation);

        return redirect()->route('invitations.index')->with('status', "L'invitation a été annulée");
    }
}
