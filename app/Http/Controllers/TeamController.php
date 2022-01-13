<?php


    namespace App\Http\Controllers;


    use App\Services\FixtureService;
    use App\Services\TeamService;

    class TeamController extends Controller
    {
        const TEAM_COUNT = 20;

        /** @var TeamService */
        protected TeamService $teamService;
        protected FixtureService $fixtureService;

        /**
         * TeamController constructor.
         * @param TeamService $teamService
         * @param FixtureService $fixtureService
         */
        public function __construct(TeamService $teamService, FixtureService $fixtureService)
        {
            $this->teamService = $teamService;
            $this->fixtureService = $fixtureService;
        }

        public function generate()
        {

            try {
                return [
                    'teams' => $this->teamService->generateTeams(),
                    'games' => $this->fixtureService->getFixture()
                ];
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }

        public function getTeams(): array
        {
            return $this->teamService->getTeams();
        }
    }
