<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct() {}

    public function index()
    {

        $config = [
            'js' => [
                'backend/js/core/libs.min.js',
                'backend/vendor/sheperd/dist/js/sheperd.min.js',
                'backend/js/plugins/tour.js',
                'backend/vendor/flatpickr/dist/flatpickr.min.js',
                'backend/js/plugins/flatpickr.js',
                'backend/js/plugins/slider-tabs.js',
                'backend/js/plugins/select2.js',
                'backend/vendor/lodash/lodash.min.js',
                'backend/js/iqonic-script/utility.min.js',
                'backend/js/iqonic-script/setting.min.js',
                'backend/js/setting-init.js',
                'backend/js/core/external.min.js',
                'backend/js/charts/widgetcharts.js?v=2.2.0',
                'backend/js/charts/dashboard.js?v=2.2.0',
                'backend/js/charts/alternate-dashboard.js?v=2.2.0',
                'backend/js/hope-ui.js?v=2.2.0',
                'backend/js/hope-uipro.js?v=2.2.0',
                'backend/js/sidebar.js?v=2.2.0'
            ]
        ];

        $template = 'backend.dashboard.home.index';
        return view('backend.dashboard.layout', compact(
            'template',
            'config'
        ));
    }
}
