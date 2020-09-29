<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


use App\Project;
use Facades\Tests\Setup\ProjectFactory;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function a_project_can_have_tasks()
    {
        // $this->signIn();

        $project = ProjectFactory::create();

        $this->actingAs($project->owner)
                ->post($project->path(). '/tasks', ['body' => 'Tasks Items']);


        $this->get($project->path())
                ->assertSee('Tasks Items');
    }

    /** @test */
    public function a_task_can_be_updated()
    {
        $project = ProjectFactory::withTasks(1)->create();
        

        $this->actingAs($project->owner)
             ->patch($project->tasks[0]->path(), [
                'body' => 'changed',
                'completed' => true
            ]);

        $this->assertDatabaseHas('tasks', [
            'body' => 'changed',
            'completed' => true
        ]);
    }


    /** @test */
    public function only_a_owner_of_a_project_may_add_task()
    {
        $this->signIn();

        $project = factory(Project::class)->create();

        $this->post($project->path() . '/tasks', ['body', 'Test task'])
            ->assertStatus(403);


        $this->assertDatabaseMissing('tasks', ['body' => 'Test task']);
    }

    /** @test */
    public function only_a_owner_of_a_project_may_update_a_task()
    {
        $this->signIn();
 


        $project = ProjectFactory::withTasks(1)->create();

 
        $this->patch($project->tasks[0]->path(), ['body' => 'Changed'])
             ->assertStatus(403);
 
 
        $this->assertDatabaseMissing('tasks', ['body' => 'Changed']);
    }
    /** @test */
    public function a_task_require_a_body()
    {
        $project = $project = ProjectFactory::create();

        $attributes = factory('App\Task')->raw(['body' => '']);

        $this->actingAs($project->owner)
                ->post($project->path() . '/tasks', $attributes)
                ->assertSessionHasErrors('body');
    }
}
