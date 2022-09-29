<?php

namespace PalauaAndSons\TagsField\Tests;

use Cartalyst\Tags\IlluminateTag as Tag;
use Illuminate\Support\Facades\Gate;

class TagsFieldControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Gate::define('viewNova', fn ($user) => true);

        $this->createTags();
    }

    /** @test */
    public function it_can_find_tags_containing_a_given_string()
    {
        $this
            ->getJson('nova-vendor/palauaandsons/nova-tags-field?filter[containing]=on')
            ->assertSuccessful()
            ->assertJsonCount(3)
            ->assertDontSee('two');
    }

    /** @test */
    public function it_can_limit_the_suggestions()
    {
        $this
            ->getJson('nova-vendor/palauaandsons/nova-tags-field?limit=2')
            ->assertSuccessful()
            ->assertJsonCount(2);
    }

    /** @test */
    public function limiting_on_zero_returns_no_tags()
    {
        $this
            ->getJson('nova-vendor/palauaandsons/nova-tags-field?limit=0')
            ->assertSuccessful()
            ->assertJsonCount(0);
    }

    protected function createTags()
    {
        Tag::firstOrCreate(['name' => 'one', 'slug' => 'one', 'namespace' => 'Test\\Dumy']);
        Tag::firstOrCreate(['name' => 'Another One', 'slug' => 'another-one', 'namespace' => 'Test\\Dumy']);
        Tag::firstOrCreate(['name' => 'Another ONE with different casing', 'slug' => 'Another-ONE-with-different-casing', 'namespace' => 'Test\\Dumy']);
        Tag::firstOrCreate(['name' => 'two', 'slug' => 'two', 'namespace' => 'Test\\Dumy']);
    }
}
