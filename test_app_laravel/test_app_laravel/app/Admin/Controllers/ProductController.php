<?php

namespace App\Admin\Controllers;

use App\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('tag_category_id', __('Tag category id'));
        $grid->column('name', __('Name'));
        $grid->column('content', __('Content'));
        $grid->column('price', __('Price'));
        $grid->column('postal', __('Postal'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('tag_category_id', __('Tag category id'));
        $show->field('name', __('Name'));
        $show->field('content', __('Content'));
        $show->field('price', __('Price'));
        $show->field('postal', __('Postal'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->number('tag_category_id', __('Tag category id'));
        $form->text('name', __('Name'));
        $form->textarea('content', __('Content'));
        $form->number('price', __('Price'));
        $form->number('postal', __('Postal'));

        return $form;
    }
}
