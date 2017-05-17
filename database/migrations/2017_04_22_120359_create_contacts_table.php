<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contacts', function (Blueprint $table) {
          
            $table->increments('id');
            
            $table->string('name', 100);
            
            $table->string('email', 320);
            
            $table->string('phone',22);

            $table->text('address');
            
            $table->string('company', 250);
            
            $table->date('dob');

            $table->integer('user_id');
            
            $table->timestamp('deleted_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('contacts');
    }

}
