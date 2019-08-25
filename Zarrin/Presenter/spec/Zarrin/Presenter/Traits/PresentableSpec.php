<?php

namespace spec\Zarrin\Presenter\Traits;

use PhpSpec\ObjectBehavior;
use Zarrin\Presenter\Traits\Presentable;

class PresentableSpec extends ObjectBehavior
{
    function let()
    {
        $this->beAnInstanceOf(Foo::class);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Foo::class);
    }

    function it_has_the_proper_instance_of_class()
    {
        \Mockery::mock('FooPresenter');
        $this->present()->shouldBeAnInstanceOf('FooPresenter');
    }

    function it_should_have_same_object()
    {
        \Mockery::mock('FooPresenter');
        $one = $this->present();
        $two = $this->present();
        $one->shouldBe($two);
    }
}

class Foo {

    use Presentable;
    protected $presenter = 'FooPresenter';
}