<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMeetingFieldsInCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->after('image',function($table){
                $table->text("meeting_link")->nullable();
                $table->string("meeting_date",30)->nullable();
                $table->string("meeting_time",30)->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn("meeting_link");
            $table->dropColumn("meeting_date");
            $table->dropColumn("meeting_time");
        });
    }
}
