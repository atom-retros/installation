<?php

namespace Atom\Installation\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteInstallation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'website_installation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'step',
        'installation_key',
        'user_ip',
        'completed',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'completed' => 'boolean',
    ];
}
