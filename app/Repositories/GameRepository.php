<?php


    namespace App\Repositories;


    use App\Interfaces\GameInterface;
    use App\Models\Game;

    class GameRepository implements GameInterface
    {
        public Game $model;

        public function __construct(Game $model)
        {
            $this->model = $model;
        }

        public function getGames(): array
        {
            return $this->model->with(['teams'])->get()->toArray();
        }
    }
