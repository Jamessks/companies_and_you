<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Custom\Messenger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\ToggleCompanyStatusRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::where('user_id', auth()->id())
            ->where('status', true)->latest()->simplePaginate(6);

        $inactiveCompanies =
            Company::where('user_id', auth()->id())
            ->where('status', false)->latest()->simplePaginate(6);

        return view('companies.index', ['companies' => $companies, 'inactiveCompanies' => $inactiveCompanies ?? []]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        try {

            $company = Company::create([
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'website' => $request->website,
                'user_id' => Auth::id(),
            ]);

            if ($company) {
                Messenger::success("Company was created successfully");
            }
        } catch (QueryException $e) {
            Messenger::error("There was an error creating the company" . $e->getMessage());
        }

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        if ($company->user_id != Auth::id() && $company->status == 0) {
            abort(404);
        }

        // Only the owner may visit their own company listings.
        if ($company->user_id == Auth::id() && $company->status == 0) {
            return view('companies.company', ['company' => $company, 'ownerVisit' => true]);
        }

        return view('companies.company', ['company' => $company, 'ownerVisit' => false]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $this->authorize('manage', $company);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        try {
            $company->update($request->validated());

            if ($company) {
                Messenger::success("Company was edited successfully");
                return redirect()->route('companies.index');
            }
        } catch (\Exception $e) {
            Messenger::error("There was an error when trying to edit the company");
            return redirect()->route('companies.edit', $company->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $this->authorize('manage', $company);

        try {
            $company->delete();

            if ($company) {
                Messenger::success("Company was deleted successfully");
            }
        } catch (\Exception $e) {
            Messenger::error("There was an error when trying to delete the company");
        }
        return redirect()->route('companies.index');
    }

    /**
     * Restore the specified company.
     */
    public function toggleStatus(ToggleCompanyStatusRequest $request, $id)
    {
        try {
            $company = Company::findOrFail($id);

            // Convert to boolean
            $status = $request->input('status') === '1';
            // Set status to true or false
            $company->status = $status;

            // Determine success message based on the status
            $message = $status ? "Company was restored successfully" : "Company was delisted successfully";
            Messenger::success($message);

            $company->save();
            return redirect()->route('companies.index');
        } catch (\Exception $e) {
            Messenger::error("There was an error when trying to change the status of the company");
            return redirect()->route('companies.index');
        }
    }

    public function allCompanies()
    {
        $companies = Company::where('status', 1)->latest()->paginate(10);

        return view('companies.allCompanies', ['companies' => $companies]);
    }
}
