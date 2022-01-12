<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Week extends Model
    {
        use HasFactory, SoftDeletes;

        public $fillable = ['week', 'game_id'];
        public $timestamps = true;

        public function games()
        {
            return $this->hasMany(Game::class);
        }
    }
