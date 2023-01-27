<?php


namespace App\Helpers\Interfaces;


interface CacheKeys
{

    const USER_SCHOOL_KEY = 'user-school';

    const UNIVERSITY = 'university';

    const COUNTRY_UNIVERSITIES = 'country_universities';

    const UNIVERSITY_PROFILE_CACHE = self::UNIVERSITY . '-profile';
    const UNIVERSITY_INFO_CACHE = self::UNIVERSITY . '-info';

    const UNIVERSITY_FACILITIES_CACHE = self::UNIVERSITY . '-facilities';

    const UNIVERSITY_GALLERY_CACHE = self::UNIVERSITY . '-gallery';
    const UNIVERSITY_FOLLOW_LINKS_CACHE = self::UNIVERSITY . '-follow-links';

    const TOTAL_NO_UNIVERSITIES = 'total_no_universities';

    const DEGREES_CACHE = 'degrees';
    const DEGREEIDS_CACHE = 'degreeIds';

    const PROGRAM_CATEGORIES_CACHE = 'program-categories';

    const FACULTY_TYPES_CACHE = 'faculty-types';

    const COUNTRIES_THAT_HAVE_UNIVERSITIES = 'countries-that-have-universities';

    const CONTINENTS_CACHE = 'continents';
    const CONTINENTS_WITHOUT_COUNTRIES_CACHE = 'continents-without-countries';
    const CONTINENT_COUNTRIES_CACHE = 'continents-countries';
    const CONTINENT_CACHE_BY_NAME = 'continent';
    const COUNTRIES_CACHE_BY_NAME = 'country';

    const   PROGRAMS_CATEGORIES_WITH_PROGRAMS_CACHE = self::PROGRAM_CATEGORIES_CACHE . 'with-programs';

    const GENDER_CACHE = 'genders';

    const ALL_COUNTRIES_CACHE = 'all-countries';
    const COUNTRY_CITIES = 'country-cities';

    const LEARNING_TYPES_CACHE = 'learning-types';

    const PROGRAMS_CACHE = 'programs';
    const PROGRAMIDS_CACHE = 'programIds';

    const GRADING_TYPES_CACHE = 'grading-types';

    const COMPANIES_CACHE = 'companies';

    const EMPLOYMENT_TYPES_CACHE = 'employment-types';
    const TEST_TYPES_CACHE = 'test-types';

    const INSTITUTES_CACHE = 'institutes';
    const INSTITUTEIDS_CACHE = 'instituteIds';


}
