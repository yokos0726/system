<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

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
        factory(Product::class, 3)->create();

        // $datas = [
        //   ['product_name' => '水'],
        //   ['product_name' => '麦茶'],
        //   ['product_name' => 'オレンジジュース'],
        //   ['produc
        //   ['product_name' => 'スポーツドリンク'],
        //   ['product_name' => 'コーヒー'],
        // ];
        //
        // DB::table('products')->insert($datas);
    }
}
