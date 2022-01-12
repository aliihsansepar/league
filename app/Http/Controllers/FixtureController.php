<?php

    namespace App\Http\Controllers;

    use App\Services\FixtureService;
    use App\Services\GameService;
    use App\Services\TeamService;

    class FixtureController extends Controller
    {
        const TEAM_COUNT = 20;

        /**
         * @var FixtureService $fixtureService
         * @var GameService $gameService
         * @var TeamService $teamService
         */
        private FixtureService $fixtureService;
        private GameService $gameService;
        private TeamService $teamService;

        /**
         * FixtureController constructor.
         * @param FixtureService $fixtureService
         * @param GameService $gameService
         * @param TeamService $teamService
         */
        public function __construct(FixtureService $fixtureService, GameService $gameService, TeamService $teamService)
        {
            $this->fixtureService = $fixtureService;
            $this->gameService = $gameService;
            $this->teamService = $teamService;
        }

        public function generateFixture()
        {
            return $this->fixtureService->createFixture(self::TEAM_COUNT);
        }

        public function getFixture()
        {
            return $this->fixtureService->getFixture();
        }
    }
