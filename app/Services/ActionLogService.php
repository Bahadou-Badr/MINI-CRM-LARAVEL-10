<?php

namespace App\Services;

use App\Models\Action;
use App\Models\Company;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ActionLogService
{

    public function CreateActionLog(string $action_type,Invitation $invitation = NULL, User $user = NULL)
    {
        $actionLog = new Action();
        switch ($action_type) {
            case "invitation_sent":
                $company = Company::find($invitation->company_id);
                $actionLog->action_message = "Admin " . Auth::user()->name . " a invite l'employé  '" . $invitation->employer_name . "' à joindre la société  " . $company->company_name;
                break;
            case "invitation_valid":
                $actionLog->action_message = $invitation->employer_name . " a validé l'invitation ";
                break;
            case "invitation_cancel":
                $actionLog->action_message = "Admin " . Auth::user()->name . " a annulé l'invitation envoyeé a " . $invitation->employer_name;
                break;
            case "user_confirmed":
                $actionLog->action_message = $user->name . " a confirmé son profile";
                break;
        }

        $actionLog->action_type = $action_type;
        $actionLog->save();
    }
}
