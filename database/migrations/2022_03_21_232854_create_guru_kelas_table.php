<?php

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Guru::class);
            $table->foreignIdFor(Kelas::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru_kelas');
    }
}
