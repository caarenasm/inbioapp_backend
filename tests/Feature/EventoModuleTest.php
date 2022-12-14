<?php

namespace Tests\Feature;

use App\Models\Evento;
use App\Models\TipoEvento;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class EventoModuleTest extends TestCase
{
    use RefreshDatabase;

    private $usuario;
    private $evento;
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->usuario = User::factory()->create();
        $this->tipo_eventos = TipoEvento::factory()->create();

        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $this->evento = Evento::factory([
            'id' => 1,
            'titulo' => 'Test titulo',
            'slug' => 'Test titulo',
            'imagen_url' => $file,
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'fecha_evento' => '2021-06-15',
            'hora' => '05:47:00',
            'tipo_evento_id' => $this->tipo_eventos->id,
            'created_at' => now(),
            'updated_at' => now(),
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
    public function test_eventos()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('eventos.index'));
        $response->assertStatus(200);
    }

    public function test_edit_eventos()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('eventos.edit', 1));
        $response->assertStatus(200);
    }

    public function test_list_eventos()
    {

        $this->withoutExceptionHandling();

        $response = $this->get(route('eventos.index'));

        $response->assertStatus(200);

        $response->assertViewIs('livewire.admin.eventos.eventos');
    }


    public function test_post_eventos()
    {
        $this->WithoutMiddleware();
        //    $this->withoutExceptionHandling();

        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post(route('eventos.store'), [

            'titulo' => 'Test titulo',
            'slug' => 'Test titulo',
            'imagen_url' => $file,
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'fecha_evento' => '2021-06-15',
            'hora' => '05:47:00',
            'tipo_evento_id' => $this->tipo_eventos->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response->assertStatus(302);

        $this->assertCount(1, Evento::all());

        $eventos = Evento::all()->last();

        $this->assertEquals($eventos->titulo, 'Test titulo');
    }

    public function test_update_eventos()
    {

        $this->WithoutMiddleware();
        $this->withoutExceptionHandling();

        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->put(route('eventos.update', $this->evento->id), [
            'titulo' => 'Test titulo 2', 
            'slug' => 'Test titulo 2',
            'imagen_url' => $file,
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'fecha_evento' => '2021-06-15',
            'hora' => '05:47:00',
            'tipo_evento_id' => $this->tipo_eventos->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response->assertStatus(302);

        $this->assertCount(1, Evento::all());

        $eventos = Evento::find(1);

        $this->assertEquals($eventos->titulo, 'Test titulo 2');
    }

    public function test_delete_eventos()
    {

        $this->WithoutMiddleware();

        $response = $this->delete(route('eventos.delete', $this->evento->id));

        $response->assertStatus(302);

        $this->assertCount(0, Evento::all());
    }
}
