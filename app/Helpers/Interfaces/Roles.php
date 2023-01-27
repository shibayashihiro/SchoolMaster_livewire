<?php

namespace App\Helpers\Interfaces;

/**
 * App\Helpers\Interfaces\Roles.
 *
 * @property int SUPER_ADMINISTRATOR
 * @property int UNIRANKS_ADMINISTRATOR
 * @property int UNIRANKS_MODERATOR
 * @property int UNIVERSITY_ADMINISTRATOR
 * @property int UNIVERSITY_ADMISSION
 * @property int UNIVERSITY_MARKETING
 * @property int UNIVERSITY_ALUMNI
 * @property int UNIVERSITY_INTERNS
 * @property int UNIVERSITY_REPRESENTATIVE
 * @property int SCHOOL_ADMINISTRATOR
 * @property int SCHOOL_REPRESENTATIVE
 * @property int SCHOOL_COUNSELOR
 * @property int STUDENT
 * @property int COMPANY_ADMINISTRATOR
 * @property int COMPANY_REPRESENTATIVE
 * @property int EMBASSY_ADMINISTRATOR
 * @property int EMBASSY_REPRESENTATIVE
 * @property int TRAINING_CENTER_ADMINISTRATOR
 * @property int TRAINING_CENTER_REPRESENTATIVE
 * @property int EDUCATION_AGENCY_ADMINISTRATOR
 * @property int EDUCATION_AGENCY_REPRESENTATIVE
 * @property int SCHOLARSHIP_PROVIDER_ADMINISTRATOR
 * @property int SCHOLARSHIP_PROVIDER_REPRESENTATIVE
 * @property int ACADEMIC
 * @property int COMMITTEE
 * */

interface Roles
{
    /**
     * SUPER_ADMINISTRATOR ROLE ID
     *
     * @var int
     */
    const SUPER_ADMINISTRATOR = 1;

    /**
     * UNIRANKS_ADMINISTRATOR ROLE ID
     *
     * @var int
     */
    const UNIRANKS_ADMINISTRATOR = 2;

    /**
     * UNIRANKS_MODERATOR ROLE ID
     *
     * @var int
     */
    const UNIRANKS_MODERATOR = 3;

    /**
     * UNIVERSITY_ADMINISTRATOR ROLE ID
     *
     * @var int
     */
    const UNIVERSITY_ADMINISTRATOR = 4;

    /**
     * UNIVERSITY_ADMISSION ROLE ID
     *
     * @var int
     */
    const UNIVERSITY_ADMISSION = 5;

    /**
     * UNIVERSITY_MARKETING ROLE ID
     *
     * @var int
     */
    const UNIVERSITY_MARKETING = 6;

    /**
     * UNIVERSITY_ALUMNI ROLE ID
     *
     * @var int
     */
    const UNIVERSITY_ALUMNI = 7;

    /**
     * UNIVERSITY_INTERNS ROLE ID
     *
     * @var int
     */
    const UNIVERSITY_INTERNS = 8;

    /**
     * UNIVERSITY_REPRESENTATIVE ROLE ID
     *
     * @var int
     */
    const UNIVERSITY_REPRESENTATIVE = 9;

    /**
     * SCHOOL_ADMINISTRATOR ROLE ID
     *
     * @var int
     */
    const SCHOOL_ADMINISTRATOR = 10;

    /**
     * SCHOOL_REPRESENTATIVE ROLE ID
     *
     * @var int
     */
    const SCHOOL_REPRESENTATIVE = 11;

    /**
     * SCHOOL_COUNSELOR ROLE ID
     *
     * @var int
     */
    const SCHOOL_COUNSELOR = 12;

    /**
     * STUDENT ROLE ID
     *
     * @var int
     */
    const STUDENT = 13;

    /**
     * COMPANY_ADMINISTRATOR ROLE ID
     *
     * @var int
     */
    const COMPANY_ADMINISTRATOR = 14;

    /**
     * COMPANY_REPRESENTATIVE ROLE ID
     *
     * @var int
     */
    const COMPANY_REPRESENTATIVE = 15;

    /**
     * EMBASSY_ADMINISTRATOR ROLE ID
     *
     * @var int
     */
    const EMBASSY_ADMINISTRATOR = 16;

    /**
     * EMBASSY_REPRESENTATIVE ROLE ID
     *
     * @var int
     */
    const EMBASSY_REPRESENTATIVE = 17;

    /**
     * TRAINING_CENTER_ADMINISTRATOR ROLE ID
     *
     * @var int
     */
    const TRAINING_CENTER_ADMINISTRATOR = 18;

    /**
     * TRAINING_CENTER_REPRESENTATIVE ROLE ID
     *
     * @var int
     */
    const TRAINING_CENTER_REPRESENTATIVE = 19;

    /**
     * EDUCATION_AGENCY_ADMINISTRATOR ROLE ID
     *
     * @var int
     */
    const EDUCATION_AGENCY_ADMINISTRATOR = 20;

    /**
     * EDUCATION_AGENCY_REPRESENTATIVE ROLE ID
     *
     * @var int
     */
    const EDUCATION_AGENCY_REPRESENTATIVE = 21;

    /**
     * SCHOLARSHIP_PROVIDER_ADMINISTRATOR ROLE ID
     *
     * @var int
     */
    const SCHOLARSHIP_PROVIDER_ADMINISTRATOR = 22;

    /**
     * SCHOLARSHIP_PROVIDER_REPRESENTATIVE ROLE ID
     *
     * @var int
     */
    const SCHOLARSHIP_PROVIDER_REPRESENTATIVE = 23;

    /**
     * ACADEMIC ROLE ID
     *
     * @var int
     */
    const ACADEMIC = 24;
    /**
     * COMMITTEE ROLE ID
     *
     * @var int
     */
    const COMMITTEE = 25;
}
