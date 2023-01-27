<?php

namespace App\Helpers\Interfaces;

/**
 * App\Helpers\Interfaces\Status.
 *
 * @property int PENDING
 * @property int APPROVED
 * @property int REJECTED
 * @property int EXPIRED_FEATURED
 * @property int ACTIVE_FEATURED
 * @property int UPLOAD_PHOTO
 * @property int ADD_BIO
 * @property int ADD_EMPLOYMENT
 * @property int SELECT_FACTORS
 * @property int ADD_COMMITTEE_EXPERIENCE
 * @property int PROFILE_COMPLETED
 * */
interface Status
{
    /**
     * PENDING
     *
     * @var int
     */
    const PENDING = 0;

    /**
     * APPROVED
     *
     * @var int
     */
    const APPROVED = 1;

    /**
     * REJECTED
     *
     * @var int
     */
    const REJECTED = 2;

    /**
     * EXPIRED_FEATURED
     *
     * @var int
     */
    const EXPIRED_FEATURED = 0;

    /**
     * ACTIVE_FEATURED
     *
     * @var int
     */
    const ACTIVE_FEATURED = 1;
    /**
     * UPLOAD_PHOTO
     *
     * @var int
     */
    const UPLOAD_PHOTO = 1;

    /**
     * ADD_BIO
     *
     * @var int
     */
    const ADD_BIO = 2;

    /**
     * ADD_EMPLOYMENT
     *
     * @var int
     */
    const ADD_EMPLOYMENT = 3;

    /**
     * SELECT_FACTORS
     *
     * @var int
     */
    const SELECT_FACTORS = 4;

    /**
     * ADD_COMMITTEE_EXPERIENCE
     *
     * @var int
     */
    const ADD_COMMITTEE_EXPERIENCE = 5;

    /**
     * PROFILE_COMPLETED
     *
     * @var int
     */
    const PROFILE_COMPLETED = 6;

    const INVITATION_PENDING = 0;
    const INVITATION_ACCEPTED = 1;
    const INVITATION_REJECTED = 2;

    const INVITATION_STATUSES = [self::INVITATION_PENDING => 'pending', self::INVITATION_ACCEPTED => 'accepted', self::INVITATION_REJECTED => 'rejected'];
    const INVITATION_STATUSES_BY_KEY = ['pending' => self::INVITATION_PENDING, 'accepted' => self::INVITATION_ACCEPTED, 'rejected' => self::INVITATION_REJECTED];

    const REGISTARTION_PENDING = 0;
    const REGISTARTION_ACCEPTED = 1;
    const REGISTARTION_REJECTED = 2;

    const UNIVERSITY_ATTENDANCE_PENDING = null;
    const UNIVERSITY_ATTENDANCE_NOT_ARRIVED = 0;
    const UNIVERSITY_ATTENDANCE_ARRIVED = 1;
    const UNIVERSITY_ATTENDANCE_LATE = 2;
}
