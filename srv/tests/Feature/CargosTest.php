<?php

namespace Tests\Feature;

use Tests\TestCase;

class CargosTest extends TestCase
{
    public function test_cargo_list_200(): void
    {
        $response = $this->get(route('cargo.index'));

        $response->assertStatus(200);
    }

    public function test_cargo_item_not_existing_slug_404(): void
    {
        $response = $this->get(route('cargo.show', ['cargo' => 9]));
        $response->assertStatus(404);
    }
}
