<?php

namespace App\Admin\Controllers;

use App\Models\PusherApplication;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Str;

class PusherApplicationController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new PusherApplication(), function (Grid $grid) {
            $grid->column('id');
            $grid->column('name');
            $grid->column('key');
            $grid->column('secret');
            $grid->column('path');
            $grid->column('enable_statistics')->switch();
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new PusherApplication(), function (Show $show) {
            $show->field('id');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new PusherApplication(), function (Form $form) {
            if ($form->isCreating()) {
                $form->hidden('id')->value(substr(md5(Str::uuid()), 8, 16));
                $form->hidden('key')->value(substr(md5(Str::uuid()), 8, 16));
                $form->hidden('secret')->value(md5(Str::uuid()));
            } else {
                $form->display('id');
                $form->display('key');
                $form->display('secret');
            }

            $form->text('name');
            $form->text('path');
            $form->switch('enable_statistics')->default(true);
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
