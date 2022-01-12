<?php


    namespace App\Http\Controllers;


    use App\Services\TeamService;

    class TeamController extends Controller
    {
        /** @var TeamService */
        protected TeamService $teamService;

        /**
         * TeamController constructor.
         * @param TeamService $teamService
         */
        public function __construct(TeamService $teamService)
        {
            $this->teamService = $teamService;
        }

        public function generate()
        {
            try {
                return $this->teamService->generateTeams();
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }

        public function getTeams(): array
        {
            return $this->teamService->getTeams();
        }
    }
