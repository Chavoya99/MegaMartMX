<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('subcategoria_id')->constrained()->onDelete('cascade');
            $table->decimal('precio', 10, 2);
            $table->string('codigoBarras');
            $table->bigInteger('existencia')->default(0);
            $table->foreignId('proveedor_id')->constrained(table: 'proveedores', indexName: 'id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
