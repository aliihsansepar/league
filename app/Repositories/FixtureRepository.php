<?php


    namespace App\Repositories;


    use App\Interfaces\FixtureInterface;
    use App\Models\Fixture;
    use App\Models\Team;
    use App\Models\Week;
    use Carbon\Carbon;

    class FixtureRepository implements FixtureInterface
    {

        /** @var Fixture */
        private Fixture $model;

        /**
         * FixtureRepository constructor.
         * @param Fixture $model
         */
        public function __construct(Fixture $model)
        {
            $this->model = $model;
        }

        public function getFixture(): array
        {
            return $this->model->get()->toArray();
        }

        /**
         * @param array $fixture
         * @return array
         */
        public function storeFixture(array $fixture): array
        {
            collect($fixture)->each(function ($items) {
                foreach ($items as $item) {
                    $this->model->create([
                        'season' => Carbon::now()->year . ' - ' . Carbon::now()->addYear()->year,
                        'week_id' => $item['week'],
                        'home_team_id' => $item['home'],
                        'away_team_id' => $item['away'],
                    ]);
                }
            });
            return $this->model->get()->toArray();
        }

        /**
         * @return array
         */
        public function getTeamIDs(): array
        {
            return Team::get(['id'])->toArray();
        }
    }
