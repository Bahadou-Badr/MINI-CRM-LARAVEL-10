<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Services\ActionLogService;
use Illuminate\Http\Request;

class EmployeController extends Controller
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
    public function index(Request $request)
    {
        $order = $request->query('order');
        $allEmployees = User::where('is_admin', FALSE);
        // sort list by name
        switch ($order) {
            case "asc":
                $allEmployees->orderBy('name', 'asc');
                break;
            case "desc":
                $allEmployees->orderBy('name', 'desc');
                break;
        }
        $allEmployees = $allEmployees->paginate(4)->withQueryString();
        return view('employees.index', ['employees' => $allEmployees]);
    }

    public function getEmployeeList(string $comapny_id)
    {
        $companyEmployees = User::where('company_id', $comapny_id)->paginate(3);
        return view('employees.list',  ['employees' => $companyEmployees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registerEmployee(Request $request)
    {
        // inputs validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users', // email must be unique
            'address' => 'required|max:255',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:15',
            'birth_date' => 'required|date',
        ]);

        //create the Employee
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'is_admin' => false,
            'company_id' => $request->company_id,
        ]);
        // Create a new Action Log record for the register confirmation
        $this->actionLogService->CreateActionLog("user_confirmed", null, $user);
        //authenticate the user
        auth()->login($user);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('employees.profil', ['employee' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('employees.edit', ['employee' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // inputs validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|string|max:15',
            'birth_date' => 'required|date',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;

        $user->save();

        return redirect()->route('employees.show', ['employee' => $user])->with('status', 'Les informations personnelles ont été mises à jour');
    }


}
