<?php

namespace Tests\Feature;

use App\Models\Interest;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_response()
    {
        $response = $this->get(route('member.create'));

        $response->assertStatus(200);
    }

    public function test_interests()
    {
        $interests = Interest::factory()
            ->count(10)
            ->create();

        $response = $this->get(route('member.create'));

        foreach ($interests as $interest) {
            $response->assertSee($interest->name);
        }
    }

    public function test_person_is_in_database()
    {
        $interests = Interest::factory()
            ->count(10)
            ->create();

        $selectedInterests = $interests->random(3);

        $formData = [
            'first_name' => 'kovacs',
            'last_name' => 'janos',
            'birth_date' => '2000-05-13 07:16',
            'birth_place' => 'gyergyo',
            'has_newsletter' => 'on',
            'introduction' => 'asdasd',
            'title' => 'Felséges',
            'blood_type' => '0+',
            'interests' => $selectedInterests->pluck('id')->toArray(),
        ];

        $expected = [
            'first_name' => 'kovacs',
            'last_name' => 'janos',
            'birth_date' => '2000-05-13 07:16:00',
            'birth_place' => 'gyergyo',
            'has_newsletter' => 1,
            'introduction' => 'asdasd',
            'title' => 'Felséges',
            'blood_type' => '0+',
        ];

        $this->post(route('member.store'), $formData);
        $this->assertDatabaseHas('people', $expected);
        $person = Person::first();
        $savedInterests = $person->interests;

        foreach ($selectedInterests as $selectedInterest) {
            $this->assertTrue($savedInterests->contains($selectedInterest));
        }
    }

    public function test_first_10_persons_name()
    {
        $people = Person::factory()
            ->count(15)
            ->create();

        $visible = $people->take(10);
        $invisible = $people->skip(10)->take(5);

        $response = $this->get(route('member.index'));

        foreach ($visible as $person) {
            $name = $person->title.' '.$person->first_name.' '.$person->last_name;
            $response->assertSee($name);
        }

        foreach ($invisible as $person) {
            $name = $person->title.' '.$person->first_name.' '.$person->last_name;
            $response->assertDontSee($name);
        }
    }

    public function test_persons_data()
    {
        $interests = Interest::factory()
            ->count(10)
            ->create();

        $selectedInterests = $interests->random(3);

        $person = Person::create([
            'first_name' => 'kovacs',
            'last_name' => 'janos',
            'birth_date' => '2000-05-13 07:16',
            'birth_place' => 'gyergyo',
            'has_newsletter' => 1,
            'introduction' => 'asdasd',
            'title' => 'Felséges',
            'blood_type' => '0+',
        ]);

        $person->interests()->sync($selectedInterests);

        $response = $this->get(route('member.show', ['person' => $person]));

        $response->assertSee('kovacs');
        $response->assertSee('janos');
        $response->assertSee('gyergyo');
        $response->assertSee('Feliratkozva');
        $response->assertSee('asdasd');
        $response->assertSee('Felséges');
        $response->assertSee('0+');

        foreach ($selectedInterests as $selectedInterest) {
            $response->assertSee($selectedInterest->erd_kor);
        }
    }
}
