    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void {
            Schema::create('states', function (Blueprint $table) {
                $table->bigIncrements('state_id');
                $table->string('state_name', 255);
                $table->timestamps();
            });
        }

        public function down(): void {
            Schema::dropIfExists('states');
        }
    };

