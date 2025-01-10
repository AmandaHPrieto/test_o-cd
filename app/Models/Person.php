<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;


class Person extends Model
{

    protected $fillable = [
        'first_name',
        'middle_names',
        'last_name',
        'birth_date',
        'death_date',
        'created_by',
    ];

    // Une personne peut avoir plusieurs parents
    public function parents() : BelongsToMany   
    {
        return $this->belongsToMany(Person::class, 'relationships', 'child_id', 'parent_id');
    }

    // Une personne peut avoir plusieurs enfants
    public function children(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'relationships', 'parent_id', 'child_id');
    }

    // Une personne a un seul utilisateur-créateur
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    

}
