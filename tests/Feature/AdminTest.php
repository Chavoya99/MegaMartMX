<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function test_login_como_admin(): void
    {   
        $response = $this->get('/producto');
        $response->assertRedirect('/login');
        Artisan::call('db:seed');
        $user = User::factory()->create([
            'name' => "Administrador de prueba",
            'email' => "adminprueba@admin.com",
            'tipo_usuario' => "superAdmin",
        ]);
        $this->actingAs($user);
        
        $response = $this->get('/producto');
        $response->assertStatus(200)->assertSee("Lista de productos");
        $response->assertStatus(200)->assertSee("Sabritas Naturales 160g");
    }

    public function test_formulario_creacion_producto(): void
    {
        $user = User::factory()->create([
            'name' => "Administrador de prueba",
            'email' => "adminprueba@admin.com",
            'tipo_usuario' => "superAdmin",
        ]);

        $this->actingAs($user);

        $response = $this->post(route('proveedor.store'),
        [
            'nombre' => 'Proveedor de prueba',
            'direccion' => 'Dirección de prueba',
            'correo' => 'proveedor@gmail.com',
            'telefono' => '9999999999',
            'estado' => 'Activo',
        ]);


        $this->assertDatabaseHas('proveedores',[
            'nombre' => 'Proveedor de prueba', 
        ]);
        
        $response->assertRedirect(route('proveedor.index'));
    }

    public function test_verifica_validacion_al_crear_proveedor(){

        $user = User::factory()->create([
            'name' => "Administrador de prueba",
            'email' => "adminprueba@admin.com",
            'tipo_usuario' => "superAdmin",
        ]);

        $this->actingAs($user);

        $response = $this->post(route('proveedor.store'),
        [
            //Falta nombre
            'direccion' => 'Dirección de prueba',
            'correo' => 'proveedor@gmail.com',
            'telefono' => '9999999999',
            'estado' => 'Activo',
        ]);
        
        $response->assertInvalid(['nombre']);
    }

    public function test_verifica_eliminacion_proveedor(){

        $user = User::factory()->create([
            'name' => "Administrador de prueba",
            'email' => "adminprueba@admin.com",
            'tipo_usuario' => "superAdmin",
        ]);

        $this->actingAs($user);

        $proveedor = Proveedor::create(
        [
            'nombre' => 'Proveedor de prueba',
            'direccion' => 'Dirección de prueba',
            'correo' => 'proveedor@gmail.com',
            'telefono' => '9999999999',
            'estado' => 'Activo',
        ]);
        
        $response = $this->delete(route('borrar_proveedor', $proveedor));
        $this->assertDatabaseMissing('proveedores', ['id' => $proveedor->id]);

        $response->assertStatus(302);
        $response->assertRedirect(route('proveedor.index'));   
    }

    public function test_verifica_eliminacion_categoria(){

        $user = User::factory()->create([
            'name' => "Administrador de prueba",
            'email' => "adminprueba@admin.com",
            'tipo_usuario' => "superAdmin",
        ]);

        $this->actingAs($user);

        $categoria = Categoria::create(
        [
            'nombre' => 'Categoría de prueba'
        ]);
        
        $response = $this->delete(route('categoria.destroy', $categoria));
        $this->assertDatabaseMissing('categorias', ['id' => $categoria->id]);

        $response->assertStatus(302);
        $response->assertRedirect(route('categoria.index'));   
    }

    public function test_verifica_permiso_de_eliminacion_admin(){

        $user = User::factory()->create([
            'name' => "Administrador de prueba",
            'email' => "adminprueba@admin.com",
            'tipo_usuario' => "admin", 
            //Admin no tiene permiso de eliminar sólo superAdmin
        ]);

        $this->actingAs($user);

        $categoria = Categoria::create(
        [
            'nombre' => 'Categoría de prueba'
        ]);
        
        $response = $this->delete(route('categoria.destroy', $categoria));
        $response->assertStatus(403); 

         
    }
}
