<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * Seeds the homepage "Product category" items as Service Categories
 * (attributes.type = 0) so they can be managed from
 * Admin > Services > Categories.
 *
 * Run: php artisan db:seed --class=ProductCategorySeeder
 */
class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $subCategories = [
            ['Knit', 'product-5.jpg'],
            ['Woven', 'product-2.jpg'],
            ['Sweater', 'product-3.jpg'],
        ];

        $mainCategories = [
            ["Men's Apparel", 'product-1.jpg', $subCategories],
            ["Ladies' Apparel", 'product-4.jpg', $subCategories],
            ['Kids & Baby', 'product-7.jpg', $subCategories],
            ['Lingerie & Swimwear', 'product-4.jpg', []],
            ['Outerwear & Workwear', 'product-6.jpg', []],
            ['Sportswear & Activewear', 'product-5.jpg', []],
        ];

        foreach ($mainCategories as $order => [$name, $image, $subs]) {
            $main = $this->category($name, null, $image, $order + 1, true);

            foreach ($subs as $subOrder => [$subName, $subImage]) {
                $this->category($subName, $main, $subImage, $subOrder + 1, false);
            }
        }
    }

    private function category($name, $parent, $image, $order, $featured)
    {
        $category = Attribute::where('type', 0)
            ->where('name', $name)
            ->where('parent_id', $parent ? $parent->id : null)
            ->first();

        if (!$category) {
            $category = new Attribute();
            $category->type = 0;
            $category->name = $name;
            $category->parent_id = $parent ? $parent->id : null;
            $category->status = 'active';
            $category->fetured = $featured;
            $category->view = $order;
            $category->addedby_id = 1;
            $category->save();

            $slug = Str::slug($parent ? $parent->name.' '.$name : $name);
            if (Attribute::where('type', 0)->where('slug', $slug)->where('id', '<>', $category->id)->exists()) {
                $slug .= '-'.$category->id;
            }
            $category->slug = $slug;
            $category->save();
        }

        if (!$category->imageFile) {
            $this->attachImage($category, $image);
        }

        return $category;
    }

    private function attachImage($category, $image)
    {
        $source = public_path('welcome/images/gsh/'.$image);
        if (!File::exists($source)) {
            return;
        }

        $folder = 'medies/'.now()->format('M_Y');
        File::ensureDirectoryExists(public_path($folder));

        $ext = File::extension($source);
        $rename = time().'.'.uniqid().'.'.$ext;
        File::copy($source, public_path($folder.'/'.$rename));

        $media = new Media();
        $media->src_type = 3;
        $media->use_Of_file = 1;
        $media->src_id = $category->id;
        $media->file_name = $image;
        $media->alt_text = $category->name;
        $media->file_rename = $rename;
        $media->file_size = File::size($source);
        $media->mine_type = File::mimeType($source);
        $media->file_type = 1;
        $media->file_url = $folder.'/'.$rename;
        $media->file_path = $folder;
        $media->addedby_id = 1;
        $media->save();
    }
}
