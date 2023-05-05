<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Team;
use App\Models\Domain;
use Illuminate\Http\Request;
use Flash;

class TeamController extends AppBaseController
{
    /**
     * Display a listing of the Team.
     */
    public function index(Request $request)
    {
        /** @var Team $teams */
        $teams = Team::paginate(10);

        return view('teams.index')
            ->with('teams', $teams);
    }


    /**
     * Show the form for creating a new Team.
     */
    public function create()
    {
        $domains = Domain::pluck('name', 'id');
        return view('teams.create')->with('domains', $domains);
    }

    /**
     * Store a newly created Team in storage.
     */
    public function store(CreateTeamRequest $request)
    {
        $input = $request->all();

        /** @var Team $team */
        $team = Team::create($input);

        Flash::success('Team saved successfully.');

        return redirect(route('teams.index'));
    }

    /**
     * Display the specified Team.
     */
    public function show($id)
    {
        /** @var Team $team */
        $team = Team::find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('teams.index'));
        }

        return view('teams.show')->with('team', $team);
    }

    /**
     * Show the form for editing the specified Team.
     */
    public function edit($id)
    {
        /** @var Team $team */
        $team = Team::find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('teams.index'));
        }

        $domains = Domain::pluck('name', 'id');

        return view('teams.edit','team', 'domains');
    }

    /**
     * Update the specified Team in storage.
     */
    public function update($id, UpdateTeamRequest $request)
    {
        /** @var Team $team */
        $team = Team::find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('teams.index'));
        }

        $team->fill($request->all());
        $team->save();

        Flash::success('Team updated successfully.');

        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified Team from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Team $team */
        $team = Team::find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('teams.index'));
        }

        $team->delete();

        Flash::success('Team deleted successfully.');

        return redirect(route('teams.index'));
    }
}
