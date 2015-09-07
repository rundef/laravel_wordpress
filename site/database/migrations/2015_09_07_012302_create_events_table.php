<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(1);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement('ALTER TABLE events ADD FULLTEXT full_name(name)');
        DB::statement('ALTER TABLE events ADD FULLTEXT full_description(description)');
    }

    public function down()
    {
        Schema::drop('events');
    }
}
