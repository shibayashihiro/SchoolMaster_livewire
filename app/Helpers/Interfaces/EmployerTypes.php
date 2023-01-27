<?php

namespace App\Helpers\Interfaces;
/**
 * App\Helpers\Interfaces\EmployerTypes.
 *
 * @property int EMPLOYMENT_TYPES
 * @property int EMPLOYED_AT_UNIVERSITY
 * @property int EMPLOYED_AT_COMPANY
 *
 */
interface EmployerTypes
{

    /**
     * EMPLOYMENT_TYPES
     *
     * @var int
     */
    const  EMPLOYMENT_TYPES = ["university"=>"University","company"=>"Company"];

    /**
     * EMPLOYED_AT_UNIVERSITY
     *
     * @var int
     */
    const EMPLOYED_AT_UNIVERSITY = "university";

    /**
     * EMPLOYED_AT_COMPANY
     *
     * @var int
     */
    const EMPLOYED_AT_COMPANY = "company";
}
