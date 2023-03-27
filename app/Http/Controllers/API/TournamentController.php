<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TournamentFormRequest;
use App\Models\TournamentAdmin;
use Illuminate\Http\Request;
use App\Models\Tournament;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TournamentFormRequest $request)
    {

        $data = $request->all();
        $tournament = new Tournament();
        $tournament->title =$data['title'];
        $tournament->gender = $data['gender'];
        $tournament->number_of_rounds = $data['number_of_rounds'];
        $tournament->save();
        $result = TournamentAdmin::generateTournament(
            $tournament,
            $data['players'],
        );
        return response()->json(['Tournament generated',$result], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $tournament = Tournament::find($id);
        if (isset($tournament)) {
            return response()->json($tournament, 200);
        }
        return response()->json('Tournament not found', 404);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
