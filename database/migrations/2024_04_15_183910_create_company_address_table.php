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
        Schema::create('companies_address', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('cep', 14);
            $table->string('road');
            $table->text('number');
            $table->text('complement')->nullable();
            $table->text('city');
            $table->text('state');
            $table->text('country');
            $table->foreignUuid('company_id')
                ->references('id')
                ->on('companies')
                ->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_address');
    }
};
