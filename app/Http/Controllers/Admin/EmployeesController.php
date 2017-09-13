<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Manager;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
  
class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managersList = Manager::pluck('last_name', 'id');

        return view('admin.employees.create', compact('managersList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $managersList = Manager::pluck('last_name', 'id');

        return view('admin.employees.edit', compact('employee', 'managersList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdviceRequest $request
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect()->route('admin.employees.index')->with('success', trans('message.success.update'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdviceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->all());
 
        return redirect()->route('admin.employees.index')->with('success', trans('message.success.store'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('admin.employees.index')->with('success', trans('message.success.delete'));
    }
}
