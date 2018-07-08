<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FacultyTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/faculties GET
     * 
     * should return a list of Faculties
     *
     * @return void
     */
    public function testGetFacultyList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('faculties'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            [
                'name',
                'dean_id'
            ]
        ]);
    }

    /**
     * /api/faculties/1 GET
     * 
     * should return a Faculty
     *
     * @return void
     */
    public function testGetFaculty()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('faculties/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'name',
            'dean_id'
        ]);
    }
    
    /**
     * /api/faculties POST
     * 
     * should create a new Faculty
     *
     * @return void
     */
    public function testCreateFaculty()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('faculties'), [
                            'name' => 'Science',
                            'school_id' => 1,
                            'dean_id' => 1
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'name',
            'dean_id'
        ]);

        $response->assertJson([
            'name' => 'Science'
        ]);
    }
    
    /**
     * /api/faculties/1 PUT
     * 
     * should modify the Faculty's name
     *
     * @return void
     */
    public function testUpdateFaculty()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('faculties/1'), [
                            'name' => 'Culture Update'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'name',
            'dean_id'
        ]);

        $response->assertJson([
            'name' => 'Culture Update'
        ]);
    }
    
    /**
     * /api/faculties/1 DELETE
     * 
     * should delete the Faculty
     *
     * @return void
     */
    public function testDeleteFaculty()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('faculties/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }

    /**
     * /api/faculties/1?with_departments GET
     */
    public function testGetFacultyWithDepartments()
    {
        return $this->getSingleWithFilter('faculties/1?with_departments', [
            'departments' => []
        ]);
    }

    /**
     * /api/faculties/1?with_programs GET
     */
    public function testGetFacultyWithPrograms()
    {
        return $this->getSingleWithFilter('faculties/1?with_programs', [
            'programs' => []
        ]);
    }

    /**
     * /api/faculties/1?with_students GET
     */
    public function testGetFacultyWithStudents()
    {
        return $this->getSingleWithFilter('faculties/1?with_students', [
            'students' => []
        ]);
    }

    /**
     * /api/faculties/1?with_staff GET
     */
    public function testGetFacultyWithStaff()
    {
        return $this->getSingleWithFilter('faculties/1?with_staff', [
            'staff' => []
        ]);
    }

    /**
     * /api/faculties/1?with_users GET
     */
    public function testGetFacultyWithUsers()
    {
        return $this->getSingleWithFilter('faculties/1?with_users', [
            'users' => []
        ]);
    }
}
