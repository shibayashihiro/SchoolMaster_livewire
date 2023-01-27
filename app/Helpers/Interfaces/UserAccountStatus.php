<?php

namespace App\Helpers\Interfaces;

/**
 * App\Helpers\Interfaces\UserAccountStatus.
 *
 * @property int ACCOUNT_PENDING
 * @property int ACCOUNT_APPROVED
 * @property int ACCOUNT_REJECTED
 * */

interface UserAccountStatus
{
    /**
     * ACCOUNT_PENDING
     *
     * @var int
     */
    const ACCOUNT_PENDING = 0;

    /**
     * ACCOUNT_APPROVED
     *
     * @var int
     */
    const ACCOUNT_APPROVED = 1;

    /**
     * ACCOUNT_REJECTED
     *
     * @var int
     */
    const ACCOUNT_REJECTED = 2;


}
