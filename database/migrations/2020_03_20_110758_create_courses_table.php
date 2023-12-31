longText<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            // $table->string('level')->nullable();
            $table->enum('level',['Beginner','Advanced','All Levels','Terbuka','Tertutup']);
            $table->enum('rating',['1','2','3','4','5'])->default(1);
            $table->longText('short_description')->nullable();
            $table->longText('big_description')->nullable();
            $table->string('image');
            $table->string('overview_url')->nullable(); //there are course overview video
            $table->enum('provider',['Youtube','HTMLS','Video'])->nullable();
            $table->json('requirement')->nullable(); //save all course requirement json
            $table->json('outcome')->nullable();
            $table->json('tag')->nullable();

            //this is for free
            $table->boolean('is_free')->default(false);
            //if course is not free
            $table->double('price')->nullable();
            // $table->double('price')->nullable();
            //this is for discount
            $table->boolean('is_discount')->default(false);
            //this is after discount price / calculate the discount from controller
            $table->double('discount_price')->nullable();
            //this is for video language dropdown from language
            $table->string('language')->default('english');
            //meta data
            $table->text('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->boolean('is_published')->default(false);
            //fk
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
            // tahapan pelatihan
            $table->longText('tahapan_pelatihan');
            // pendaftaran
            
            $table->date('mulai_pendaftaran')->default(now());
            $table->date('berakhir_pendaftaran')->default(now());
            $table->integer('jumlah_peserta')->default(0);
            $table->boolean('need_dtks')->default(false);
            $table->boolean('allow_disability')->default(false);
            $table->boolean('has_tes_tulis')->default(false);
            $table->boolean('has_tes_wawancara')->default(false);
            $table->boolean('has_pendaftaran_ulang')->default(false);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
