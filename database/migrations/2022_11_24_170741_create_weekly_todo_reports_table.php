<?php

use App\Models\User;
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
        Schema::create('weekly_todo_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->integer('done')->default(0);
            $table->integer('todo')->default(0);
            $table->integer('in_progress')->default(0);
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
        Schema::dropIfExists('weekly_todo_reports');
    }
};
