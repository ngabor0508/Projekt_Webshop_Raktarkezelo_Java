<?php

use App\Models\Rendeles;
use App\Models\Termekek;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kosar', function (Blueprint $table) {
            $table->foreignIdFor(Rendeles::class)->constrained('rendeles');
            $table->foreignIdFor(Termekek::class)->constrained('termekek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kosar', function (Blueprint $table) {
            $table->dropForeignIdFor(Rendeles::class);
            $table->dropForeignIdFor(Termekek::class);
        });
    }
};
