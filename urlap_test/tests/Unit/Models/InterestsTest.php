<?php

namespace Tests\Feature;

use App\Models\Interest;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InterestsTest extends TestCase
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
    public function has_person()
    {
        $interests = Interest::factory()
            ->count(10)
            ->create();

        $selectedInterests = $interests->random(3);

        $this->person->interests()->sync($selectedInterests);

        $this->assertInstanceOf(Interest::class, $this->person->interests->first());
//        $this->assertInstanceOf(Person::class, $this->interests->person->first());
    }
}
