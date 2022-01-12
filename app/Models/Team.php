<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Team extends Model
    {
        use HasFactory, SoftDeletes;

        public $fillable = ['name', 'attack_power', 'defence_power', 'score_goals', 'giveaway_goals', 'win', 'deal', 'loss', 'point'];
        public $timestamps = true;

        public function matches()
        {
            $this->belongsToMany(Game::class, 'teams_matches');
        }
    }
