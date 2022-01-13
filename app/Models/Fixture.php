<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Fixture extends Model
    {
        use HasFactory, SoftDeletes;

        public $fillable = ['season', 'week_id', 'home_team_id', 'away_team_id'];
        public $timestamps = true;

        public function weeks()
        {
            return $this->hasMany(Week::class);
        }

        public function games()
        {
            return $this->belongsToMany(Game::class, 'weeks', 'id', 'game_id');
        }
    }
