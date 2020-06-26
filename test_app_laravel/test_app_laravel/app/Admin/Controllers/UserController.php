<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('password', __('Password'));
        $grid->column('avatar', __('Avatar'));
        $grid->column('twitter_id', __('Twitter id'));
        $grid->column('twitter_name', __('Twitter name'));
        $grid->column('facebook_id', __('Facebook id'));
        $grid->column('facebook_name', __('Facebook name'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('password', __('Password'));
        $show->field('avatar', __('Avatar'));
        $show->field('twitter_id', __('Twitter id'));
        $show->field('twitter_name', __('Twitter name'));
        $show->field('facebook_id', __('Facebook id'));
        $show->field('facebook_name', __('Facebook name'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->password('password', __('Password'));
        $form->image('avatar', __('Avatar'));
        $form->text('twitter_id', __('Twitter id'));
        $form->text('twitter_name', __('Twitter name'));
        $form->text('facebook_id', __('Facebook id'));
        $form->text('facebook_name', __('Facebook name'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
