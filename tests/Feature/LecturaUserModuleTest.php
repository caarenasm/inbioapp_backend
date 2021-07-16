<?php

namespace Tests\Feature;

use App\Models\CategoriaDiario;
use App\Models\LecturaUser;
use App\Models\TipoLectura;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class LecturaUserModuleTest extends TestCase
{
  // para que se borre la base de datos antes de cada test
  use RefreshDatabase;

  private $usuario;
  private $categoria_diario;
  private $tipo_lectura;
  private $lectura_usuario;
  public function setUp(): void
  {
      parent::setUp(); // TODO: Change the autogenerated stub

      $this->usuario = User::factory()->create();

      $this->categoria_diario = CategoriaDiario::factory()->create();

      $this->tipo_lectura = TipoLectura::factory()->create();

      $this->lectura_usuario = LecturaUser::factory()->create();

      Sanctum::actingAs(
          $this->usuario,
          ['*']
      );
  }
  /**
   * A basic feature test example.
   *
   * @return void
   */

  public function test_post_alimentos()
  {
      $this->WithoutMiddleware();
      $this->withoutExceptionHandling();

      $response = $this->post('api/auth/tipo/lectura/users', [
          'user_id' => $this->usuario->id,
          'tipo_lectura_id' => $this->tipo_lectura->id,
          'datos_leidos' => '{"id":1,"nombre":"Sueño leve"}',
          'create_at' => now(),
          'update_at' => now(),
      ]);
      
      $response->assertStatus(200);

    
      $this->assertCount(2, LecturaUser::all());

      $alimento = LecturaUser::all()->last();

      $this->assertEquals($alimento->user_id, 1);
  }

}
