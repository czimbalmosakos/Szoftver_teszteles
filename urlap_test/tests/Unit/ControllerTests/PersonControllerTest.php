<?php

namespace Tests\Feature;

use App\Http\Controllers\PersonController;
use App\Models\BloodType;
use App\Models\Interest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        // Arrange
        $interests = [
            new Interest(['name' => 'Hiking']),
            new Interest(['name' => 'Reading']),
        ];
        $blood_types = [
            new BloodType(['name' => 'A']),
            new BloodType(['name' => 'B']),
            new BloodType(['name' => 'AB']),
            new BloodType(['name' => 'O']),
        ];
        $controller = new PersonController();

        // Act
        $view = $controller->create();

        // Assert
        $this->assertInstanceOf('Illuminate\View\View', $view);
        $this->assertArrayHasKey('interests', $view->getData());
        $this->assertArrayHasKey('blood_types', $view->getData());
        $this->assertEquals($interests, $view->getData()['interests']->toArray());
        $this->assertEquals($blood_types, $view->getData()['blood_types']->toArray());
    }
}
