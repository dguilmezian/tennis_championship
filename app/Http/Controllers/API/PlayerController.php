<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerRequest;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $players = Player::all();
        return response()->json($players);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PlayerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PlayerRequest $request)
    {
        $player = Player::create($request->validated());
        return response()->json($player, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $player = Player::find($id);
        return response()->json($player);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PlayerRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PlayerRequest $request, $id)
    {
        $player = Player::findOrFail($id);
        $player->uproudate($request->all());
        return response()->json($player, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Player::findOrFail($id)->delete();
        return response()->json('Player ' . $id . 'deleted', 200);
    }
}
