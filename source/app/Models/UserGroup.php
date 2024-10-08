<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string  $title_user_group
 * @property boolean $is_delete
 * @property int     $created_at
 * @property int     $updated_at
 */
class UserGroup extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_group';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_user_group';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_user_group', 'sort', 'is_delete'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title_user_group' => 'string', 'is_delete' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    protected $dateFormat = 'Y-m-d H:i:s';

    // Scopes...

    // Functions ...

    // Relations ...
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
