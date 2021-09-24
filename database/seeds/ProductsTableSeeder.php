<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Product::class, 10)->create();

        // $datas = [
        //   ['product_name' => '水'],
        //   ['product_name' => '麦茶'],
        //   ['product_name' => 'オレンジジュース'],
        //   ['product_name' => '緑茶'],
        //   ['product_name' => 'スポーツドリンク'],
        //   ['product_name' => 'コーヒー'],
        // ];
        //
        // DB::table('products')->insert($datas);
    }
}
