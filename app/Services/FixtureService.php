<?php

    namespace App\Services;

    use App\Interfaces\FixtureInterface;

    class FixtureService implements FixtureInterface
    {
        /** @var FixtureInterface */
        private FixtureInterface $fixtureRepository;

        /**
         * FixtureService constructor.
         * @param FixtureInterface $fixtureRepository
         */
        public function __construct(FixtureInterface $fixtureRepository)
        {
            $this->fixtureRepository = $fixtureRepository;
        }

        public function getFixture()
        {
            $fixtures = [];
            $fixture = $this->fixtureRepository->getFixture();
            foreach ($fixture as $fxtr) {
                $fixtures[] = [
                    'week' => $fxtr->week_id,
                    'home' => $fxtr->home,
                    'away' => $fxtr->away,
                    'home_score' => '--',
                    'away_score' => '--',
                ];
            }
            return $fixtures;
        }

        /**
         * @param int $team_count
         * @return array
         */
        public function createFixture(int $team_count): array
        {
            $teams_ary = $this->fixtureRepository->getTeamIDs();
            $league_first_half_fixture = array();
            $week = 0;

            for ($i = 0; $i < $team_count; $i++) {
                $week++;
                for ($j = 0; $j < $team_count; $j += 2) {
                    if ($team_count - $j <= 1) {
                        /** Eğer ligdeki takım sayısı tek sayı ise son takım haftayı bay geçiyor */
                        continue;
                    }
                    $home = $teams_ary[($team_count - 1) - $j]['id'];
                    $away = $teams_ary[$j]['id'];
                    $league_first_half_fixture[$week][] = [
                        'week' => $week,
                        'home' => $home,
                        'away' => $away,
                    ];
                }
                /**
                 * Her hafta farklı takımlar ile maç yapılması gerektiği için,
                 * sırayla her hafta  son sıradaki takım listenin başına alınarak değişimi sağlanıyor.
                 *
                 * Ligdeki takım sayısı tek sayı ise her hafta bir takım pass by geçitor
                 * @var $ghost
                 */
                $last_element = array_pop($teams_ary);
                array_unshift($teams_ary, $last_element);
            }
            $league_second_half_fixture = array_map(function ($teams) use ($team_count) {
                foreach ($teams as $team) {
                    $home = $team['home'];
                    $away = $team['away'];
                    $new_fixture[$team['week'] + $team_count][] = [
                        'week' => $team['week'] + $team_count,
                        'home' => $away,
                        'away' => $home,
                    ];
                }
                return current($new_fixture);
            }, $league_first_half_fixture);

            $fixture = array_merge($league_first_half_fixture, $league_second_half_fixture);

            return $this->fixtureRepository->storeFixture($fixture);
        }
    }
