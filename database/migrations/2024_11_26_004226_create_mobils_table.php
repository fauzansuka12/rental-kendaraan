<?php

use App\Models\User;
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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table ->foreignIdFor(App\Models\User::class);
            $table ->string('nopolisi')->nullable();
            $table ->string('merk')->nullable();
            $table ->enum('jenis',['pickup','truck','minibus'])->nullable();
            $table ->string('kapasitas')->nullable();
            $table ->string('harga') ->nullable();
            $table ->string('foto') -> nullable();
            $table->timestamps();
            $table ->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
