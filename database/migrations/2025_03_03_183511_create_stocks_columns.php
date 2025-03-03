<?php

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
        Schema::table('stocks', function (Blueprint $table) {
            $table->string('name', 255)->after('id');
            $table->string('description', 255)->after('name');
            $table->foreignId('category_id')->constrained()->onDelete('restrict')->after('description');
            $table->float('price', 10, 2)->after('category_id');
            $table->integer('quantity')->after('price');
            $table->string('image', 255)->nullable()->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks_columns');
    }
};
