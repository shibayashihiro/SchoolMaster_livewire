<?php

namespace App\Helpers\Interfaces;

/**
 * App\Helpers\Interfaces\Paths.
 *
 * @property int LOGO
 * @property int ICONS
 * @property int LANGUAGE
 * @property int FLAGS
 * @property int FAV_ICONS
 * @property int USER_DP
 * @property int BOOTH_GRAPHICS
 * @property int BOOTH_VIDEOS
 * @property int BOOTH_LAYOUTS
 * @property int BOOTH_PLACEHOLDER_BANNERS
 * @property int BOOTH_LOBBY_MENU
 * @property int BOOTH_LOBBY_VIDEOS
 * @property int UPLOADS_DIR
 * */
interface Paths
{
    const CDN_PATH = "https://d73ojsnoesnuw.cloudfront.net";
    const IMAGES_BASE_URL = "images";
    const IMAGES_CDN_URL = self::CDN_PATH.'/'.self::IMAGES_BASE_URL;
    const SM_DIR = 'schools-master';
    const SM_IMAGES_BASE = self::IMAGES_BASE_URL.'/'.self::SM_DIR;
    const SM_IMAGES_CDN = self::IMAGES_CDN_URL.'/'.self::SM_DIR;
    const SM_LOGOS_CDN = self::SM_IMAGES_CDN.'/'.'logos';
    const SM_LOGOS_BASE = self::SM_IMAGES_BASE.'/'.'logos';
    const SCHOOL_LOGOS = self::SM_IMAGES_CDN . "/school-logos";

    const ADS_IMAGES = self::IMAGES_CDN_URL . "/ads";
    const AGENCY_LOGOS = self::IMAGES_CDN_URL . "/agencies-logos";
    const AWARDS_IMAGES = self::IMAGES_CDN_URL . "/awards";
    const EMPLOYERS_LOGOS = self::IMAGES_CDN_URL . "/employers";
    const GRAPH_LOGO = self::IMAGES_CDN_URL . "/graph";
    const HOUSING_IMAGES = self::IMAGES_CDN_URL . "/housing";
    const PLACEHOLDER_IMAGES = self::IMAGES_CDN_URL . "/placeholders";
    const SITE_LOGOS = self::IMAGES_CDN_URL . "/site-logos";
    const ICONS = self::IMAGES_CDN_URL . "/icons";
    const FAVICONS = self::IMAGES_CDN_URL . "/favicon";
    const FLAGS = self::IMAGES_CDN_URL . "/flags";
    const UNI_GALLERY_IMAGES = self::IMAGES_CDN_URL . "/universities-gallery-images";
    const UNI_LOGOS = self::IMAGES_CDN_URL . "/universities-logos";
    const UNI_LOGOS_BASE = self::IMAGES_BASE_URL . "/universities-logos";
    const USER_DP = self::IMAGES_CDN_URL . "/users-profile-photos";
    const FACILITY_HOUSING_IMAGES = self::IMAGES_CDN_URL . "/facility-housing-images";
    const MAIN_BUILDING_IMAGES = self::IMAGES_CDN_URL . "/facility-main-building-images";
    const LAB_IMAGES = self::IMAGES_CDN_URL . "/facility-lab-images";
    const ATHLETIC_IMAGES = self::IMAGES_CDN_URL . "/facility-athletic-images";
    const TRANSPORTATION_IMAGES = self::IMAGES_CDN_URL . "/facility-transportation-images";
    const STUDENT_LIFE_IMAGES = self::IMAGES_CDN_URL . "/facility-student-lives-images";
    const STUDENT_SUPPORT_IMAGES = self::IMAGES_CDN_URL . "/facility-student-support-images";
    const UNI_FRONT_VIDEOS = self::IMAGES_CDN_URL . "/universities-front-video";
    const UNI_FRONT_BANNERS = self::IMAGES_CDN_URL . "/universities-front-banners";
    const USER_EXPERINECES = self::IMAGES_CDN_URL.'/user-experiences';
    const USER_EDUCATIONS = self::IMAGES_CDN_URL.'/user-educations';
    const COMPANY_LOGOS = self::IMAGES_CDN_URL.'/company_logos';
    const FEATURED = self::IMAGES_CDN_URL.'/featured';


    const CSS_DIR = self::CDN_PATH . "/css";
    const LIVEICON_CSS = self::CSS_DIR . "/live-icon";
    const SVG = self::LIVEICON_CSS . "/svg";
    const JS_DIR = self::CDN_PATH . "/js";
    const COMPONENTS = self::JS_DIR . "/components";
    const CARDS = self::COMPONENTS . "/cards";
    const CHARTS = self::COMPONENTS . "/charts";
    const CHARTS_CONFIG = self::CHARTS . "/config";
    const SUNBURST = self::CHARTS . "/sunburst";
    const DRAGABLE = self::COMPONENTS . "/dragable";
    const GALLERY = self::COMPONENTS . "/gallery";
    const SEARCH_MODAL = self::COMPONENTS . "/search-modal";
//    const SEARCH_MODAL = "/universities-rankings/public/assets/js/components/search-modal";
    const LIB = self::JS_DIR . "/lib";
    const D3 = self::LIB . "/d3";
    const LIVEICON_JS = self::JS_DIR . "/live-icon";
    const TOOLS_LIVEICON = self::LIVEICON_JS . "/tools";
    const SHARED_JS = self::JS_DIR . "/shared";




}
