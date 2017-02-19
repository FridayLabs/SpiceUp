<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_widgets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('widget_id')->nullable();
            $table->string('position'); // x|y
            $table->boolean('is_active')->default(false);
            $table->text('data'); // json
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
        Schema::dropIfExists('state_widgets');
    }
}
