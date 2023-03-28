<?php

namespace Tests\Unit\Models;

use App\Models\BloodType;
use App\Models\Interest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Person;

class PersonTest extends TestCase
{
    use RefreshDatabase;

    private Person $person;

    protected function setUp(): void
    {
        parent::setUp();

        $this->person = Person::factory()
            ->create();
    }

    /** @test */
    public function has_interests()
    {
        $interests = Interest::factory()
            ->count(10)
            ->create();

        $selectedInterests = $interests->random(3);


        $this->person->interests()->sync($selectedInterests);

        $this->assertInstanceOf(Interest::class, $this->person->interests->first());
//        $this->assertInstanceOf(Interest::class, $this->person->interests);
    }

    /** @test */
    public function has_bloodType()
    {
        BloodType::factory()
            ->count(1)
            ->create();

        $this->assertInstanceOf(BloodType::class, $this->person->bloodtype->first());
    }
}
