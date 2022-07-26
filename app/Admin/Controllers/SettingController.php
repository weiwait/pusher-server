<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\Examples;
use App\Http\Controllers\Controller;
use Dcat\Admin\Http\Controllers\Dashboard;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;
use Weiwait\DcatAuth\Setting;

class SettingController extends Controller
{
    public function index(Content $content): Content
    {
        $tab = new Tab();
        $tab->add('登录', Setting::make());

        return $content
            ->header('系统配置')
            ->body($tab->withCard());
    }
}
