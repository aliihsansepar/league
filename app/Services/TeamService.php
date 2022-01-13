<?php

    namespace App\Services;

    use App\Interfaces\FixtureInterface;
    use App\Interfaces\TeamInterface;
    use Illuminate\Database\Eloquent\Model;
    use phpDocumentor\Reflection\Types\Collection;

    class TeamService implements TeamInterface
    {
        const TEAM_COUNT = 20;

        /** @var TeamInterface */
        private TeamInterface $teamRepository;

        /**
         * TeamService constructor.
         * @param TeamInterface $teamRepository
         * @param FixtureInterface $fixtureRepo
         */
        public function __construct(TeamInterface $teamRepository)
        {
            $this->teamRepository = $teamRepository;
        }

        /**
         * @return array
         */
        public function generateTeams(): array
        {
            return $this->teamRepository->generateTeams($this->generateTeamStats());
        }

        /**
         * This function generate random team's names, attack power and  defence power
         * Uses the contents from the "names" config file to generate the random names
         * @return array
         */
        public function generateTeamStats(): array
        {
            $prefixes = config('names.prefix');
            $names = config('names.name');
            $teams_stats = array();
            for ($x = 0; $x < self::TEAM_COUNT; $x++) {
                $random_prefix = $prefixes[array_rand($prefixes)];
                $random_name = $names[array_rand($names)];
                $team_stat = self::generatePower();
                $teams_stats[] = [
                    'name' => "$random_prefix $random_name",
                    'attack_power' => $team_stat['attack'],
                    'defence_power' => $team_stat['defence'],
                    'score_goals' => 0,
                    'giveaway_goals' => 0,
                    'win' => 0,
                    'loss' => 0,
                    'deal' => 0,
                    'point' => 0,
                ];
            }
            return $teams_stats;
        }

        /** @return array */
        public function generatePower(): array
        {
            $attack_power = rand(25, 90);
            $defence_power = rand(40, 80);
            return [
                'attack' => $attack_power,
                'defence' => $defence_power,
            ];
        }

        /** @return array */
        public function getTeams(): array
        {
             return $this->teamRepository->getTeams();
        }

        /**
         * @param int $id
         * @return Model
         */
        public function getTeam(int $id): Model
        {
            return $this->teamRepository->getTeam($id);
        }
    }
