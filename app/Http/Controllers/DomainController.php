<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDomainRequest;
use App\Http\Requests\UpdateDomainRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Domain;
use Illuminate\Http\Request;
use Flash;

class DomainController extends AppBaseController
{
    /**
     * Display a listing of the Domain.
     */
    public function index(Request $request)
    {
        /** @var Domain $domains */
        $domains = Domain::latest()->paginate(10);

        return view('domains.index')
            ->with('domains', $domains);
    }


    /**
     * Show the form for creating a new Domain.
     */
    public function create()
    {
        return view('domains.create');
    }

    /**
     * Store a newly created Domain in storage.
     */
    public function store(CreateDomainRequest $request)
    {
        $input = $request->all();

    

        /** @var Domain $domain */
        $domain = Domain::create($input);

        Flash::success('Domain saved successfully.');

        return redirect(route('domains.index'));
    }

    /**
     * Display the specified Domain.
     */
    public function show($id)
    {
        /** @var Domain $domain */
        $domain = Domain::find($id);

        if (empty($domain)) {
            Flash::error('Domain not found');

            return redirect(route('domains.index'));
        }

        return view('domains.show')->with('domain', $domain);
    }

    /**
     * Show the form for editing the specified Domain.
     */
    public function edit($id)
    {
        /** @var Domain $domain */
        $domain = Domain::find($id);

        if (empty($domain)) {
            Flash::error('Domain not found');

            return redirect(route('domains.index'));
        }

        return view('domains.edit')->with('domain', $domain);
    }

    /**
     * Update the specified Domain in storage.
     */
    public function update($id, UpdateDomainRequest $request)
    {
        /** @var Domain $domain */
        $domain = Domain::find($id);

        if (empty($domain)) {
            Flash::error('Domain not found');

            return redirect(route('domains.index'));
        }

        $domain->fill($request->all());
        $domain->save();

        Flash::success('Domain updated successfully.');

        return redirect(route('domains.index'));
    }

    /**
     * Remove the specified Domain from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Domain $domain */
        $domain = Domain::find($id);

        if (empty($domain)) {
            Flash::error('Domain not found');

            return redirect(route('domains.index'));
        }

        $domain->delete();

        Flash::success('Domain deleted successfully.');

        return redirect(route('domains.index'));
    }
}
