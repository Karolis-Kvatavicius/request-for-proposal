<?php

use App\Models\Request;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardcopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardcopies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Request::class, 'material_id');
            $table->foreignIdFor(User::class, 'user_id');
            $table->timestamp('taken');
            $table->timestamp('return')->nullable();
            $table->timestamp('deadline');
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
        Schema::dropIfExists('hardcopies');
    }
}
