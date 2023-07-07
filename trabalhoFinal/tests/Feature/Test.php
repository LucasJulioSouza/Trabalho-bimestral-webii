<?php


use Tests\TestCase;
use App\Models\Eixo;

class Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    

    public function test_Route()
    {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('Gerenciamento');
    }

    public function test_Model_Contem_Dados_Corretos()
    {
        
        $dadosEsperados = [
            'nome' => 'Nome do Eixo',
        ];

        $model = new Eixo($dadosEsperados);

        $this->assertEquals($dadosEsperados, $model->toArray());
    }
    

    
}
    

