<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use App\Models\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actionLogs = Action::latest()->paginate(5);
        return view('history.index', ['actionLogs' => $actionLogs]);
    }

}
