<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMaintainerRequest;
use App\Http\Requests\UpdateMaintainerRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Maintainer;
use Illuminate\Http\Request;
use App\Models\Domain;
use Flash;

class MaintainerController extends AppBaseController
{
    /**
     * Display a listing of the Maintainer.
     */
    public function index(Request $request)
    {
        /** @var Maintainer $maintainers */
        $maintainers = Maintainer::latest()->with('domains')->paginate(10);

        return view('maintainers.index')
            ->with('maintainers', $maintainers);
    }


    /**
     * Show the form for creating a new Maintainer.
     */
    public function create()
    {
        $domains = Domain::pluck('name', 'id');
        return view('maintainers.create')->with('domains', $domains);
    }

    /**
     * Store a newly created Maintainer in storage.
     */
    public function store(CreateMaintainerRequest $request)
    {
        $input = $request->all();

        /** @var Maintainer $maintainer */
        $maintainer = Maintainer::create($input);

        $maintainer->domains()->sync($request->input('domains', []));

        Flash::success('Maintainer saved successfully.');

        return redirect(route('maintainers.index'));
    }

    /**
     * Display the specified Maintainer.
     */
    public function show($id)
    {
        /** @var Maintainer $maintainer */
        $maintainer = Maintainer::find($id);

        if (empty($maintainer)) {
            Flash::error('Maintainer not found');

            return redirect(route('maintainers.index'));
        }

        return view('maintainers.show')->with('maintainer', $maintainer);
    }

    /**
     * Show the form for editing the specified Maintainer.
     */
    public function edit($id)
    {
        /** @var Maintainer $maintainer */
        $maintainer = Maintainer::find($id);

        if (empty($maintainer)) {
            Flash::error('Maintainer not found');

            return redirect(route('maintainers.index'));
        }
        $domains = Domain::pluck('name', 'id');

        return view('maintainers.edit',compact('maintainer','domains'));
    }

    /**
     * Update the specified Maintainer in storage.
     */
    public function update($id, UpdateMaintainerRequest $request)
    {
        /** @var Maintainer $maintainer */
        $maintainer = Maintainer::find($id);

        if (empty($maintainer)) {
            Flash::error('Maintainer not found');

            return redirect(route('maintainers.index'));
        }

        $maintainer->fill($request->all());
        $maintainer->save();

        $maintainer->domains()->sync($request->input('domains', []));

        Flash::success('Maintainer updated successfully.');

        return redirect(route('maintainers.index'));
    }

    /**
     * Remove the specified Maintainer from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Maintainer $maintainer */
        $maintainer = Maintainer::find($id);

        if (empty($maintainer)) {
            Flash::error('Maintainer not found');

            return redirect(route('maintainers.index'));
        }

        $maintainer->delete();

        Flash::success('Maintainer deleted successfully.');

        return redirect(route('maintainers.index'));
    }
}
