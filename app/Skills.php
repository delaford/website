<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    /**
     * The attributes that are guarded against mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function updateSkills($data)
    {
	$mining = $data['mining'];
	$woodcutting = $data['woodcutting'];

        $this->update([
            'mining_level'      => $mining['level'],
            'mining_experience' => $mining['exp'],
	    'woodcutting_level' => $woodcutting['level'],
	    'woodcutting_experience' => $woodcutting['exp'],
        ]);
    }
}
