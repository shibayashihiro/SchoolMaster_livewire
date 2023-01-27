<?php

namespace App\Models\Traits;

trait HasRoles
{
    /**
     * @param int $role_id
     * @return bool
     */
    public function hasRole(int $role_id): bool
    {
        return $this->roles->contains('id',$role_id);
    }


    /**
     * @return bool
     */
    public function isUniversityAdmin(): bool
    {
        return $this->hasRole(\AppConst::UNIVERSITY_ADMINISTRATOR);
    }

    /**
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        return $this->hasRole(\AppConst::SUPER_ADMINISTRATOR);
    }

    /**
     * @return bool
     */
    public function isAcademic(): bool
    {
        return $this->hasRole(\AppConst::ACADEMIC);
    }

    /**
     * @return bool
     */
    public function isCommittee(): bool
    {
        return $this->hasRole(\AppConst::COMMITTEE);
    }

    /**
     * @return bool
     */
    public function isStudent(): bool
    {
        return  $this->hasRole(\AppConst::STUDENT);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return  $this->hasRole(\AppConst::UNIRANKS_ADMINISTRATOR);
    }


}
