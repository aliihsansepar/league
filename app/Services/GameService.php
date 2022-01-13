<?php


    namespace App\Services;


    use App\Interfaces\GameInterface;

    class GameService implements GameInterface
    {
        /**
         * @var GameInterface
         */
        private GameInterface $gameRepository;

        /**
         * GameService constructor.
         * @param GameInterface $gameRepository
         */
        public function __construct(GameInterface $gameRepository)
        {
            $this->gameRepository = $gameRepository;
        }

        public function getGames(): array
        {
            return $this->gameRepository->getGames();
        }
    }
