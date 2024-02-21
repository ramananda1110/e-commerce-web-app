<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // $this->call(UsersTableSeeder::class);
         Category::create(['name'=>'laptop','slug'=>'laptop','description'=>'laptop category','image'=>'files/photo1.jpeg']);
         Category::create(['name'=>'mobile phone','slug'=>'mobile-phone','description'=>'mobile phone category','image'=>'files/photo1.jpeg']);
 
         Category::create(['name'=>'books','slug'=>'books','description'=>'bookx category','image'=>'files/photo1.jpeg']);
 
         Subcategory::create(['name'=>'dell','category_id'=>1]);
         Subcategory::create(['name'=>'hp','category_id'=>1]);
         Subcategory::create(['name'=>'lenovo','category_id'=>1]);
 
 
         Product::create([
             'name'=>'HP LAPTOPS ',
             'image'=>'product/61Qe0euJJZL.jpg',
             'price'=> rand(700,1000),
             'description'=>'This is the description of a product',
             'additional_info'=>'This is additional info',
             'category_id'=> 1,
             'subcategory_id'=>1
 
         ]);
 
         Product::create([
             'name'=>'Dell LAPTOPS ',
             'image'=>'product/61Qe0euJJZL.jpg',
             'price'=> rand(800,1000),
             'description'=>'This is the description of a product',
             'additional_info'=>'This is additional info',
             'category_id'=> 1,
             'subcategory_id'=>1
 
         ]);
 
         Product::create([
             'name'=>'LENOVO LAPTOPS ',
             'image'=>'product/61Qe0euJJZL.jpg',
             'price'=> rand(700,1000),
             'description'=>'This is the description of a product',
             'additional_info'=>'This is additional info',
             'category_id'=> 1,
             'subcategory_id'=>2
 
 
 
         ]);
         User::create([
             'name'=>'Ecom Admin',
             'email'=>'admin@gmail.com',
             'password'=>bcrypt('password'),
             'email_verified_at'=>NOW(),
             'address'=>'Bangladesh',
             'phone_number'=>'01738039685',
             'is_admin'=>1
         ]);
     }
 
    
}
