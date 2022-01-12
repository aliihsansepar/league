<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Game extends Model
    {
        use HasFactory, SoftDeletes;

        public $fillable = ['week_id', 'home_id', 'away_id', 'home_score', 'away_score'];
        public $timestamps = true;

        public function week()
        {
            return $this->hasOne(Week::class, 'id', 'week_id');
        }

        public function teams()
        {
            return $this->belongsToMany(Team::class, 'teams_games');
        }
    }
