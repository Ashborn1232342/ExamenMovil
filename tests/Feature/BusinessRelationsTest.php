<?php

namespace Tests\Feature;

use App\Models\Clientes;
use App\Models\Comercios;
use App\Models\OperacionesDeVenta;
use App\Models\Productos;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BusinessRelationsTest extends TestCase
{
    use RefreshDatabase;

    public function test_sales_are_related_to_the_selected_customer_and_product(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        $comercio = Comercios::create([
            'nombre' => 'Comercio principal',
            'direccion' => 'Centro',
            'telefono' => '5551234567',
            'email' => 'comercio@example.com',
            'estado' => 'activo',
            'user_id' => $user->id,
        ]);

        $cliente = Clientes::create([
            'nombre' => 'Cliente de prueba',
            'email' => 'cliente@example.com',
            'direccion' => 'Norte',
            'telefono' => '5559876543',
            'comercio_id' => $comercio->id,
        ]);

        $producto = Productos::create([
            'nombre' => 'Producto de prueba',
            'descripcion' => 'Descripción',
            'precio' => 25.50,
            'stock' => 10,
            'estado' => 'activo',
            'comercio_id' => $comercio->id,
        ]);

        $venta = OperacionesDeVenta::create([
            'cantidad' => 2,
            'precio_unitario' => 25.50,
            'total' => 51.00,
            'producto_id' => $producto->id,
            'cliente_id' => $cliente->id,
        ]);

        $this->assertSame('activo', $cliente->refresh()->estado);
        $this->assertSame($cliente->id, $venta->refresh()->cliente->id);
        $this->assertSame($producto->id, $venta->producto->id);
        $this->assertSame($venta->id, $cliente->operacionesDeVenta()->sole()->id);
        $this->assertSame($venta->id, $producto->operacionesDeVenta()->sole()->id);
        $this->assertSame(1, $comercio->clientes()->count());
        $this->assertSame(1, $comercio->productos()->count());

        $this->actingAs($user)
            ->get('/admin')
            ->assertOk()
            ->assertSee('Clientes')
            ->assertSee('StatsOverview');

        foreach ([
            '/admin/clientes',
            '/admin/comercios',
            '/admin/productos',
            '/admin/proveedores',
            '/admin/operaciones-de-ventas',
            '/admin/operaciones-de-ventas/create',
        ] as $path) {
            $this->get($path)->assertOk();
        }
    }
}
