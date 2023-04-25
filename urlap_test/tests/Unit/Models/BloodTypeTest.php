<?php

namespace Tests\Feature;

use App\Models\BloodType;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BloodTypeTest extends TestCase
{
    use RefreshDatabase;

    private BloodType $bloodType;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bloodType = BloodType::factory()
            ->create();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function has_person()
    {
        Person::factory()
            ->for($this->bloodType, "person")
            ->create();

        $this->assertInstanceOf(Person::class, $this->bloodType->person);
    }
}
