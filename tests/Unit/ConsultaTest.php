<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Consulta extends TestCase{
    public function testConsultaIndex(){
        $this->get('/')->assertStatus(200);
        $this->get('/')->assertViewHas('medicos');
    }

    public function testConsultaList(){
        $this->post('list')->assertStatus(200);
        $this->post('list')->assertViewHas('consultas');
        $this->json('POST', 'list', [
            'nomeMedico[]' => ['João','Maria'],
            'de' => '2017-08-18',
            'ate' => '2019-08-18',
        ])->assertStatus(200);
    }
}
