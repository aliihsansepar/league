<?php


    namespace App\Repositories;


    use App\Interfaces\TeamInterface;
    use App\Models\Team;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;
    use phpDocumentor\Reflection\Types\Collection;

    class TeamRepository implements TeamInterface
    {
        const TEAM_COUNT = 20;
        /**  @var Team */
        private Team $model;

        /**
         * TeamRepository constructor.
         * @param Team $model
         */
        public function __construct(Team $model)
        {
            $this->model = $model;
        }

        /**
         * @return array
         */
        public function getTeams(): array
        {
            return $this->model->orderByDesc('point')->get()->toArray();
        }
        /**
         * @param int $id
         * @return Model
         */

        public function getTeam(int $id): Model
        {
            return $this->model->find($id);
        }

        /**
         * @param array $teams
         * @return array
         */
        public function generateTeams(array $teams): array
        {
            DB::table('teams')->truncate();
            return collect($teams)->each(function ($item) {
                $this->model->create($item);
            })->toArray();
        }

    }
