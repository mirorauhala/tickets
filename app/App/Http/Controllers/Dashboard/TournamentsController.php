<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Event;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TournamentCreateRequest;

class TournamentsController extends Controller
{
    /**
     * Display a listing of tournaments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        $this->authorize('view', $event);
        $tournaments = $event->tournaments;

        return view('dashboard.tournaments.index')->with([
            'event'       => $event,
            'tournaments' => $tournaments,
        ]);
    }

    /**
     * Show the form for creating a new tournament.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        return view('dashboard.tournaments.create')->with(['event' => $event]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TournamentCreateRequest $request, Event $event)
    {
        $tournament = $event->tournaments()->create($request->validated());

        return redirect()->route('dashboard.tournaments.edit', [$event, $tournament]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.tournaments.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TournamentCreateRequest $request, Event $event, Tournament $tournament)
    {
        $tournament = $event->tournaments()->update($request->validated());

        return redirect()->route('dashboard.tournaments.edit', [$event, $tournament]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, Tournament $tournament)
    {
        $this->authorize('delete', $tournament);

        $tournament->delete();

        return redirect()->route('dashboard.tournaments.index', [$event]);
    }
}
