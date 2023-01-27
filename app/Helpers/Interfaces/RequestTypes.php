<?php

namespace App\Helpers\Interfaces;

/**
 * App\Helpers\Interfaces\UserAccountStatus.
 *
 * @property int ADD_RECORD
 * @property int UPDATE_RECORD
 * @property int DELETE_RECORD
 * */

interface RequestTypes
{

    /**
     * ADD_RECORD
     *
     * @var int
     */
    const ADD_RECORD = 0;

    /**
     * UPDATE_RECORD
     *
     * @var int
     */
    const UPDATE_RECORD = 1;

    /**
     * DELETE_RECORD
     *
     * @var int
     */
    const DELETE_RECORD = 2;

}
