<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Model\Ticket\Ticket;

class TicketTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testCreateSuccess()
    {

      $data = [
        "user_id" => 1,
        "event_id" => 6
      ];

      $result = Ticket::create_ticket($data);

      $this->assertNotNull($result);
      $this->assertTrue($result instanceof Ticket);

      $result->forceDelete();

    }

    public function testCreateFail()
    {
      $data = [
        "user_id" => 1,
        "event_id" => 4
      ];

      $result = Ticket::create_ticket($data);

      $this->assertNull($result);
    }



}
