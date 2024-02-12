<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Curso;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\CursoController;

class CursoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $curso = Curso::factory()->create();

        $response = $this->get(route('curso.index'));

        $response->assertOk();
        $response->assertViewIs('curso.index');
        $response->assertViewHas('curso', function ($viewCurso) use ($curso) {
            return $viewCurso->contains($curso);
        });
    }

    public function testCreate()
    {
        $response = $this->get(route('curso.create'));

        $response->assertOk();
        $response->assertViewIs('curso.create');
    }

    public function testStore()
    {
        $data = [
            'nome' => 'Curso Teste',
            'descricao' => 'Descrição teste',
            'duracao' => '4'
        ];

        $response = $this->post(route('curso.store'), $data);

        $this->assertDatabaseHas('cursos', $data);
        $response->assertRedirect(route('curso.index'));
    }

    public function testShow()
    {
        $curso = Curso::factory()->create();

        $response = $this->get(route('curso.show', $curso->id));

        $response->assertOk();
        $response->assertViewIs('curso.show');
        $response->assertViewHas('curso', $curso);
    }

    public function testEdit()
    {
        $curso = Curso::factory()->create();

        $response = $this->get(route('curso.edit', $curso->id));

        $response->assertOk();
        $response->assertViewIs('curso.edit');
        $response->assertViewHas('curso', $curso);
    }

    public function testUpdate()
    {
        $curso = Curso::factory()->create();

        $data = [
            'nome' => 'Curso Alterado',
            'descricao' => 'Descrição alterada',
            'duracao' => '30'
        ];

        $response = $this->put(route('curso.update', $curso->id), $data);

        $this->assertDatabaseHas('cursos', $data);
        $response->assertRedirect(route('curso.index'));
    }

    public function testDestroy()
    {
        $curso = Curso::factory()->create();

        $response = $this->delete(route('curso.destroy', $curso->id));

        $this->assertDeleted($curso);
        $response->assertRedirect(route('curso.index'));
    }
}
