<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Entities\SwitchPort;



class SwitchPortTest extends TestCase
{
    
    protected $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function index_return_json_switch_list()
    {
        $response = $this->actingAs($this->user)->json('GET', '/switch-port');
        $response->assertOk();
        $response->assertJson(['data' => ['data' => []]]);
    }

    /** @test */
    public function update_switch_port_data()
    {
        $switchPort = $this->getSwitchPortData();
        
        $switchPortUpdated = $switchPort;
        $switchPortUpdated['switch_name'] = 'cacilds_1';
        $s = factory(SwitchPort::class)->create($switchPort);

        $uri = '/switch-port/' . $s->id;
        $response = $this->actingAs($this->user)->json('PUT', $uri, $switchPortUpdated);
        $response->assertOk();
        $response->assertJson(['message' => 'Porta do Switch Atualizada']);

    }

    /** @test */
    public function create_switch_port()
    {

        $switchPort = $this->getSwitchPortData();

        $uri = '/switch-port';

        $response = $this->actingAs($this->user)->json('POST', $uri, $switchPort);
        $response->assertOk();
        $response->assertJson(['message' => 'Porta do switch criada com sucesso']);

    }

    /** @test */
    public function show_switch_port()
    {
        $s = factory(SwitchPort::class)->create($this->getSwitchPortData());
        $uri = '/switch-port/' . $s->id;

        $response = $this->actingAs($this->user)->get($uri);
        $response->assertOk();
        $response->assertSeeText('cacilds');
    }

    /** @test */
    public function delete_switch_port()
    {
        $s = factory(SwitchPort::class)->create($this->getSwitchPortData());
        $uri = '/switch-port/' . $s->id;

        $response = $this->actingAs($this->user)->delete($uri);
        $switch = SwitchPort::find($s->id);
        $this->assertEquals(null, $switch);
    }

    protected function getSwitchPortData()
    {
        return [
            'port_number' => '1',
            'poe' => 0,
            'poe_status' => 0,
            'vlan' => '20',
            'switch_name' => 'cacilds',
            'switch_brand' => 'cacilds',
            'switch_code' => 'cacilds',
            'stack_name' => 'cacilds',
            'stack_ip' => '1.0.0.10',
            'rack_id' => 1,
        ];
    }

}
