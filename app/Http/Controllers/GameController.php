<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Services\GameService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /** @var GameService */
    protected GameService $gameService;

    /**
     * GameController constructor.
     * @param GameService $gameService
     */
    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function getGames()
    {
        $this->gameService->getGames();
    }

    public function getHomeAttribute()
    {
        $home = Team::find($this->home_id);
        return ['name' => $home['name']];
    }
}
