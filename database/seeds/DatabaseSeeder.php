<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Griego;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // $table = new Griego();

        $palabras = Griego::all();

        foreach ($palabras as $key => $palabra) {
          $slug = str_replace(' ','',strtolower($palabra->palabra)).str_replace(' ','',strtolower($palabra->significado));
          // $table->slug = $slug;
          // $table->save();

          DB::table('griegos')
            ->where('id', $palabra->id)
            ->update(['slug' => $slug]);
        }
    }
}
