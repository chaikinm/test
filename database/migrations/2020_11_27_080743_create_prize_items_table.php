<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrizeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_items', function (Blueprint $table) {
            $table->id();
            $table->enum('kind', config('app.prizes.kinds'))->nullable(false);
            $table->string('name')->nullable();
            $table->integer('count')->default(0);
            $table->integer('min')->default(0);
            $table->integer('max')->default(0);
            $table->timestamps();
            $table->index(['kind', 'count']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prize_items');
    }
}
