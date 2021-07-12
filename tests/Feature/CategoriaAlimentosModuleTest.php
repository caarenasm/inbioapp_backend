<?php

namespace Tests\Feature;

use App\Models\CategoriaAlimento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CategoriaAlimentosModuleTest extends TestCase
{

    // para que se borre la base de datos antes de cada test
    use RefreshDatabase;

    private $usuario;
    private $categoria_alimento;
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->usuario = User::factory()->create();

        // Aca se crea una categorias, y podemos controlar los datos creados
        $this->categoria_alimento = CategoriaAlimento::factory([
            'id'=>1,
            'nombre_categoria'=>'Prueba',
            'created_at'=>now(),
            'updated_at'=>now(),
        ])->create();

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
    public function test_categorias_alimentos()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('categoria-alimentos'));
        $response->assertStatus(200);
    }

    public function test_create_categorias_alimentos()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('categoria-alimentos.create'));
        $response->assertStatus(200);
    }

    public function test_edit_categorias_alimentos()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('categoria-alimentos.edit', 1));
        $response->assertStatus(200);
    }

    public function test_list_categorias_alimentos()
    {

        $this->withoutExceptionHandling();

        $response = $this->get(route('categoria-alimentos'));

        $response->assertStatus(200);

        $response->assertViewIs('livewire.admin.categoria-alimentos.categoria-alimentos');
    }


    public function test_post_categorias_alimentos()
    {
        $this->WithoutMiddleware();
        $this->withoutExceptionHandling();

        $response = $this->post(route('categoria-alimentos.store'), [
            'nombre_categoria' => 'Test nombre',
            'create_at' => now(),
            'update_at' => now(),
        ]);

        $response->assertStatus(302);

        // Acá deben haber 2 la creada en el setup y la agregada en post
        $this->assertCount(2, CategoriaAlimento::all());

        $categoria_alimento = CategoriaAlimento::all()->last();

        $this->assertEquals($categoria_alimento->nombre_categoria, 'Test nombre');
    }

    public function test_update_categorias_alimentos()
    {

        $response = $this->put(route('categoria-alimentos.update', $this->categoria_alimento), [
            // el parametro es el del name del formulario, por eso no te funcionaba con solamente nombre
            'nombre_categoria' => 'Test nombre',
        ]);

        $response->assertStatus(302);

        // Acá deben haber 2 la creada en el setup y la agregada en post
        $this->assertCount(1, CategoriaAlimento::all());

        // Acá revisamos el primer registro agregado y modificado
        $categoria_alimento = CategoriaAlimento::find(1);

        $this->assertEquals($categoria_alimento->nombre_categoria, 'Test nombre');
    }

    public function test_delete_categorias_alimentos()
    {

        $response = $this->delete(route('categoria-alimentos.delete', $this->categoria_alimento));

        $response->assertStatus(302);

        $this->assertCount(0, CategoriaAlimento::all());
    }
}