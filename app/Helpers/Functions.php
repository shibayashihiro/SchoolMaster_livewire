<?php
/**
 * All The Common Helper Function Should be Defined
 * Please make sure to check if function exists or not
 * Please add Proper Comments and Info text For All Function
 * Keep the function definition simple and standard
 * Please Keep the Function name standard and follow <i>camelCase</I>
 * Please try to define the parameter type if possible
 * All The Database Queries should be defined in try,catch block and handle the error proper
 */


use App\Models\General\Continents;
use App\Models\General\Countries;
use App\Models\General\Language;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Jenssegers\Agent\Agent;

if (!function_exists('testFunction')) {
    /**
     *   This is Test function Just to Show you how functions should be defined
     *
     * @param string $name <p><i>Name</i> Should be string .</p>
     * @param int $age <p><i>Age</i> Should be Integer .</p>
     * @param mixed $gender <p><i>Gender</i> Can be mixed .</p>
     * @return array       <p>['name','age','gender','user']</p>
     */
    #[ArrayShape(["name" => "string", "age" => "int", "gender" => "mixed", 'user' => "mixed"])]
    function testFunction(string $name, int $age, mixed $gender): array
    {
        try {
            /* Write Code For Operation */
            $user = \App\Models\User::where('name', $name)->get();
        } catch (\Exception $e) {
            /* Handel The Exception */
            logException($e);
        }
        return ["name" => $name, "age" => $age, "gender" => $gender, 'user' => $user];
    }
}


if (!function_exists('getFileNames')) {
    /**
     * <p><i>getFileNames</i></p> Function That Provides the file names in a give directory
     * @param string $path <p><i>Path</i> Should be string .</p>
     * @return array
     */
    function getFileNames(string $path): array
    {
        $fileNames = array();
        $files = \File::allFiles($path);

        foreach ($files as $file) {
            array_push($fileNames, pathinfo($file)['filename']);
        }
        return $fileNames;
    }
}

if (!function_exists('getInstituteTypeId')) {
    /**
     * <p><i>getInstituteTypeId</i></p> function will provide institute type id.
     * @param string $type <p><i>Path</i> Type Name i.e university .</p>
     * @return string|int
     */
    function getInstituteTypeId(string $type): string|int
    {
        return \App\Models\Institutes\InstituteType::where('type', strtolower($type))->first()->id;
    }
}

if (!function_exists('logException')) {
    /**
     * <p><b>logException</b> This Function will log exception to log channel from the log exception</p>.
     * @param Exception $exception <p><b>exception</b> Exception Object.</p>
     * @param mixed|null $extra_content <p><b>extra_content</b> Extra content you want to send with log.</p>
     * @param string|null $level <p><b>level</b> emergency, alert, critical, error, warning, notice, info and debug.</p>
     */

    function logException(Exception $exception, mixed $extra_content = null, string $level = null)
    {
        /** @var string $level */
        $level = $level ?: 'error';
        Log::$level($exception->getMessage(),
            [
                'File' => $exception->getFile(),
                'Line' => $exception->getLine(),
                'content' => $extra_content,
                'StackTrace' => $exception->getTraceAsString()
            ]
        );
    }
}


if (!function_exists('logDebugInfo')) {

    /**
     * <p><b>logDebugInfo</b> This Function will log debug info to log channel</p>.
     * @param string $message
     * @param array $content <p><b>content</b> ['File' => ...,'Line' => ...,'content' => ...,'StackTrace' => ...]</p>
     * @param string|null $level <p><b>level</b> emergency, alert, critical, error, warning, notice, info and debug.</p>
     */
    function logDebugInfo(string $message, array $content = [], string $level = null)
    {
        /** @var string $level */
        $level = $level ?: 'debug';
        Log::$level($message, $content);
    }
}

if (!function_exists('assetFromCDN')) {

    /**
     * <p><b>cdn_resource</b> Will Return the path to cdn resources</p>.
     * @param string $resource
     * @return string
     */
    function assetFromCDN(string $resource): string
    {
        return AppConst::CDN_PATH . "/{$resource}";
    }
}

if (!function_exists('getCountryName')) {

    /**
     * <p><b>getCityName</b> Will Return the City Name of given city ID</p>.
     * @param int $id
     * @return string
     */
    function getCountryName(?int $id): string
    {
        if (is_null($id)) {
            return '';
        }
        $countryName = App\Models\General\Countries::select('id', 'country_name')->findOrFail($id);
        return $countryName->country_name;
    }

}

if (!function_exists('uploadFileFromRequestObject')) {
    /**
     * @param Request $request
     * @param string $base_path
     * @param string $file_name_in_request_obj
     * @param bool $get_full_path
     * @return string|null <p>string|null. <b>File name</b> or <b>File Relative Path</b> based on user choice.</p>
     */
    function uploadFileFromRequestObject(Request $request, string $base_path,
                                         string  $file_name_in_request_obj = 'files', bool $get_full_path = false): ?string
    {

        $file = $request->file($file_name_in_request_obj);

        if (empty($file)) return null;

        $file = is_array($file) ? $file[0] : $file;

        $relativePath = parse_url($base_path, PHP_URL_PATH);
        // strip consecutive duplicate slashes
        $relativePath = str_replace('//', '/', $relativePath);

        $storedPath = $file->store($relativePath, 's3');
        Storage::disk('s3')->setVisibility($storedPath, 'public');

        return $get_full_path ? $storedPath : basename($storedPath);
    }
}

if (!function_exists('deleteFile')) {
    /**
     * @param string $filePath
     *
     * @return bool
     */
    function deleteFile(string $filePath): ?bool
    {
        $ignoredFiles = [
            'default.png',
            'profile.jpg',
        ]; // ignored files

        if (in_array($filePath, $ignoredFiles)) {
            return true;
        }

        try {
            $relativePath = parse_url($filePath, PHP_URL_PATH);
            return Storage::disk('s3')->delete($relativePath);
        } catch (\Throwable $throw) {
            return false;
        }
    }
}

if (!function_exists('formatColumnName')) {

    /**
     * @param string $column
     * @return string
     */
    function formatColumnName(string $column): string
    {
        return Str::of($column)
            ->remove('id')
            ->remove('university', false)
            ->camel()->snake(' ')
            ->title();
    }
}

if (!function_exists('transformUniversityDomain')) {

    /**
     * @param string $domain
     * @return string
     */
    function transformUniversityDomain(string $domain): string
    {
        return \Str::of($domain)->lower()->remove(['https', 'http', ':', 'www.', '/'])->trim();
    }
}


if (!function_exists('relativePercentage')) {

    /**
     * Calculates the Percentage between range of numbers
     * @param float|int $value
     * @param float|int $min
     * @param float|int $max
     * @return float|int
     */
    function relativePercentage(null|float|int $value, float|int $min, float|int $max): float|int
    {
        return (abs($value - $min) / abs($max - $min)) * 100;
    }
}

if (!function_exists('modelTableName')) {

    /**
     * @param string $model_class
     * @return string|null
     */
    function modelTableName(string $model_class): ?string
    {
        return resolve($model_class)->getTable();
    }
}

if (!function_exists('userCountryInfo')) {

    /**
     * @param Request $request
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[ArrayShape(['name' => "mixed", 'id' => "\Illuminate\Database\Eloquent\HigherOrderBuilderProxy|int|mixed"])]
    function userCountryInfo(Request $request): array
    {
        if (session()->get('user-ip') == null) {
            session()->put(['user-ip' => geoip($request->getClientIp())]);
        }
        $countryID = Countries::where('country_name', session()->get('user-ip')->country)->first('id');
        return ['name' => session()->get('user-ip')->country,
            'id' => $countryID->id];
    }
}

if (!function_exists('formatFactorNumber')) {
    /**
     * @param $factor_number
     * @return string
     */
    function formatFactorNumber($factor_number): string
    {
        return addZerosBeforeNumber(intval($factor_number), 2);
    }
}

if (!function_exists('addZerosBeforeNumber')) {
    /**
     * @param int $num
     * @param int $no_zeros
     * @return string
     */
    function addZerosBeforeNumber(int $num, int $no_zeros = 2): string
    {
        return sprintf("%0{$no_zeros}d", $num);
    }
}

if (!function_exists('getPageDirection')) {
    /**
     * @return string
     */
    function getPageDirection(): string
    {
        $rtl_languages = ['ar', 'he', 'ku', 'fa', 'ur', 'ps', 'dv'];
        return in_array(config('app.locale'), $rtl_languages) ? 'rtl' : 'ltr';
    }
}

if (!function_exists('languages')) {
    /**
     * @return mixed
     */
    function languages(): mixed
    {
        return Cache::rememberForever('languages-cache', function () {
            return Language::all();
        });
    }
}
if (!function_exists('countriesWithDifferentNameInDB')) {

    /**
     * @return array
     */
    function countriesWithDifferentNameInDB(): array
    {
        return collect([
            "Bonaire" => "Bonaire, Sint Eustatius and Saba",
            "Bosnia and Herzegovina" => 'Bosnia Herzegovina',
            "Cape Verde" => 'Cabo Verde',
            "Cocos [Keeling] Islands" => 'Cocos (Keeling) Islands',
            "Curacao" => 'Curaçao',
            "Democratic Republic of the Congo" => "DR Congo",
            "Dominican Republic" => 'Dominican',
            "Falkland Islands" => 'Falkland Islands (Malvinas)',
            "Ivory Coast" => "Cote d’Ivoire",
            "Macao" => 'Macau',
            "Myanmar [Burma]" => 'Myanmar',
            "Pitcairn Islands" => 'Pitcairn',
            "Republic of the Congo" => 'Congo',
            "Svalbard and Jan Mayen" => 'Svalbard and Jan Mayen Islands',
            "Swaziland" => 'Eswatini',
            "U.S. Minor Outlying Islands" => 'United States Minor Outlying Islands',
            "U.S. Virgin Islands" => 'United States Virgin Islands',
            "virgin islands (u.s.)" => 'United States Virgin Islands',
            "Vatican City" => 'Vatican City State',
            "Wallis and Futuna" => 'Wallis and Futuna Islands',
            "Åland" => 'Aland Islands',
            'united states of america' => 'united states',
            'bosnia and herzegovina' => 'bosnia herzegovina',
            'croatia (local name: hrvatska)' => 'croatia',
            'brunei darussalam' => 'brunei',
            'burma / myanmar' => 'myanmar',
            'iran (islamic republic of)' => 'iran',
            'kazakstan' => "kazakhstan",
            'palestinian territories' => "palestine",
            'republic of korea' => 'south korea',
            'syrian arab republic' => 'syria',
            'cape verde' => 'cabo verde',
            "côte d'ivoire" => 'cote d’ivoire',
            'dem. republic of the congo' => 'dr congo',
            'swaziland' => 'eswatini',
            'tanzania, united republic of' => 'tanzania',
            'the republic of gambia' => "gambia",
            'federated states of micronesia' => 'micronesia',
            'man, isle of' => 'Isle of Man',
            'virgin islands (british)' => 'British Virgin Islands',
            'russian federation' => 'Russia',
            'the bahamas' => 'Bahamas',
            'moldova, republic of' => 'Moldova',
        ])->keyBy(fn($item, $key) => Str::lower($key))->toArray();
    }
}

if (!function_exists('changeCountryNameAsInDb')) {
    /**
     * @param string $country
     * @return string
     */
    function changeCountryNameAsInDb(string $country): string
    {
        $country = Str::lower(trim($country));
        $change_name = countriesWithDifferentNameInDB();
        if (empty($change_name[$country])) {
            return $country;
        }
        $new_name = $change_name[$country];
        return Str::lower($new_name);
    }
}

if (!function_exists('communityDbAvailable')) {
    function communityDbAvailable()
    {
        return Schema::hasTable('community_accounts');
    }
}

if(!function_exists('findCountryUsingName')){

    /**
     * @param $country_name
     * @return mixed
     */
    function findCountryUsingName($country_name): mixed
    {
        $title = \AppConst::COUNTRIES_CACHE_BY_NAME . "-{$country_name}";
        $time = now()->addDays(30);
        return Cache::remember($title, $time, fn() => Countries::whereCountryName($country_name)->first());
    }
}

if(!function_exists('continentsWithoutCountries')){
    function continentsWithoutCountries(): EloquentCollection
    {
        return Cache::remember(\AppConst::CONTINENTS_WITHOUT_COUNTRIES_CACHE, now()->addDays(30), function () {
            $dontLoad = ['European Union', 'EECA', 'East Asia', 'Arabian Gulf'];
            return Continents::whereNotIn('name', $dontLoad)->get();
        });
    }
}

if (!function_exists('findContinentUsingName')){
    /**
     * @param $continent_name
     * @return mixed
     */
    function findContinentUsingName($continent_name): mixed
    {
        $title = \AppConst::CONTINENT_CACHE_BY_NAME . "-{$continent_name}";
        $time = now()->addDays(30);
        return Cache::remember($title, $time, fn() => Continents::whereName($continent_name)->first());
    }
}

if (!function_exists('continentCountries')){

    function continentCountries($continent_id): EloquentCollection
    {
        return Cache::remember(\AppConst::CONTINENT_COUNTRIES_CACHE . "-{$continent_id}", now()->addDays(30),
            function () use ($continent_id) {
                return Countries::query()
                    ->when($continent_id, function ($query, $continent_id) {
                        $query->where('continent_id_1', $continent_id)
                            ->orWhere('continent_id_2', $continent_id)
                            ->orWhere('continent_id_3', $continent_id);
                    })->orderBy('country_name')->get();
            });
    }
}

if (!function_exists('getContinentCountriesUsingName')){

    function getContinentCountriesUsingName($continent_name): EloquentCollection
    {
        $continent_id = findContinentUsingName($continent_name)?->id ?? "";
        return continentCountries($continent_id);
    }
}

if (!function_exists('transformUserSessions')){
    /**
     * @param Collection|EloquentCollection $sessionsCollection
     * @return Collection
     */
    function transformUserSessions(Collection | EloquentCollection $sessionsCollection): Collection
    {

        return $sessionsCollection->map(function ($session) {
            $agent = tap(new Agent, function ($agent) use ($session) {
                $agent->setUserAgent($session->user_agent);
            });

            return (object) [
                'agent' => [
                    'is_desktop' => $agent->isDesktop(),
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                ],
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === request()->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
    }
}
?>
