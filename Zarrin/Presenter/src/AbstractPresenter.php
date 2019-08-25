<?php
namespace Zarrin\Presenter;
use Zarrin\Presenter\Exceptions\PresenterMethodNotFound;

class AbstractPresenter
{

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->$property();
        }

        if(property_exists($this->model, $property)) {
            return $this->model->{$property};
        }

        throw new PresenterMethodNotFound('Method you are referring to is not defined in your presenter!');
    }
}