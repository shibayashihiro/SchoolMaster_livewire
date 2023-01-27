<?php

namespace App\Helpers\Interfaces;

/**
 * App\Helpers\Interfaces\UniversityStatus.
 *
 * @property int UNIVERSITY_UNVERIFIED
 * @property int UNIVERSITY_UNDER_REVIEW
 * @property int UNIVERSITY_RECOGNIZED
 * @property int UNIVERSITY_VERIFIED
 * @property int UNIVERSITY_RECOGNIZED_VERIFIED
 * @property array UNIVERSITY_STATUSES_BY_KEY
 * @property array UNIVERSITY_STATUSES_BY_NAME
 * */

interface UniversityStatus
{
    const UNIVERSITY_INACTIVE = 1;
    const UNIVERSITY_UNVERIFIED = 2;
    const UNIVERSITY_UNDER_REVIEW = 3;
    const UNIVERSITY_RECOGNIZED = 4;
    const UNIVERSITY_VERIFIED = 5;
    const UNIVERSITY_RECOGNIZED_VERIFIED = 6;

    /**
     * UNIVERSITY_STATUSES_BY_KEY
     *
     * @var array
     */
    const  UNIVERSITY_STATUSES_BY_KEY = [
        self::UNIVERSITY_INACTIVE=>'Inactive',
        self::UNIVERSITY_UNVERIFIED=>'Unverified',
        self::UNIVERSITY_UNDER_REVIEW=>'Under Review',
        self::UNIVERSITY_RECOGNIZED=>'Recognized | Unverified',
        self::UNIVERSITY_VERIFIED=>'Verified',
        self::UNIVERSITY_RECOGNIZED_VERIFIED=>"Recognized | Verified"
    ];

    /**
     * UNIVERSITY_STATUSES_BY_NAME
     *
     * @var array
     */
    const  UNIVERSITY_STATUSES_BY_NAME = [
        'Inactive'=>self::UNIVERSITY_INACTIVE,
        'Unverified'=>self::UNIVERSITY_UNVERIFIED,
        'Under Review'=>self::UNIVERSITY_UNDER_REVIEW,
        'Recognized | Unverified'=>self::UNIVERSITY_RECOGNIZED,
        'Verified'=>self::UNIVERSITY_VERIFIED,
        "Recognized | Verified"=>self::UNIVERSITY_RECOGNIZED_VERIFIED,
    ];
}
