<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlanguage extends Model
{
   
   protected $table="user_languages";
   protected $guarded = [
       
];
    /**
     * Get the user that owns the Userlanguage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the user that owns the Userlanguage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
