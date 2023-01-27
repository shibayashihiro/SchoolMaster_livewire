<?php

namespace App\Helpers;

use App\Helpers\Interfaces\CacheKeys;
use App\Helpers\Interfaces\CounselorEventTypes;
use App\Helpers\Interfaces\EmployerTypes;
use App\Helpers\Interfaces\EventTypes;
use App\Helpers\Interfaces\InviteeTypes;
use App\Helpers\Interfaces\Paths;
use App\Helpers\Interfaces\PushSections;
use App\Helpers\Interfaces\RequestTypes;
use App\Helpers\Interfaces\StudyLevels;
use App\Helpers\Interfaces\Time;
use App\Helpers\Interfaces\Roles;
use App\Helpers\Interfaces\Status;
use App\Helpers\Interfaces\UniversityStatus;
use App\Helpers\Interfaces\UserAccountStatus;
use App\Helpers\Interfaces\PointTypes;
use App\Helpers\Interfaces\UniversityEventTypes;

class AppConstants implements Paths, Time, EmployerTypes, CacheKeys, Roles, Status, RequestTypes,
    UserAccountStatus, UniversityStatus, PushSections,EventTypes, PointTypes,StudyLevels, InviteeTypes, CounselorEventTypes, UniversityEventTypes
{
}
