<?php

    namespace App\Interfaces;

    use Illuminate\Database\Eloquent\Model;

    interface TeamInterface
    {
        public function getTeam(int $id): Model;
    }
