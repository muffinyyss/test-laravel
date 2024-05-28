<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::factory()->count(10)->create();
        //Blog ไปเรียกใช้ใน factory ที่เชื่อมกัน เอา modle blog มาใช้ จำนวนที่ถูกสร้าง10บทความ เรียกใช้ func create
    }
}
