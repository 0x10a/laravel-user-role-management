<?php

namespace URM;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    use LogsActivity;

    protected static $logAttributes = ['*'];
}
