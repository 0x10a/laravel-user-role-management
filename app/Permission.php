<?php

namespace URM;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    use LogsActivity;

    protected static $logAttributes = ['*'];

}