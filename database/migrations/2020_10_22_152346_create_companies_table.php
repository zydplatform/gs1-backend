<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_code')->nullable();
            $table->integer('is_verified')->default(0);
            $table->string('password');
            $table->string('ownership');
            $table->string('owners');
            $table->string('companysize');
            $table->string('contactperson');
            $table->string('contacts');
            $table->string('businessregno');
            $table->string('businessname');
            $table->string('businesscontact');
            $table->string('country');
            $table->string('businesstype');
            $table->string('businessline');
            $table->string('employeesize');
            $table->string('physicaladdress');
            $table->string('postaladdress');
            $table->string('district');
            $table->string('tax_id_number');
            $table->rememberToken();
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
        Schema::dropIfExists('companies');
    }
}
