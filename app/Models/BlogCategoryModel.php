<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BlogCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'blog_category';


    static public  function getSingle($id)
    {
        return  self::find($id);
    }
    static public  function getSingleSlug($slug)
    {
        return  self::where('slug', '=', $slug)
            ->where('blog_category.status', '=', 0)
            ->where('blog_category.is_delete', '=', 0)
            ->first();
    }

    static public function getRecord()
    {
        return self::select('blog_category.*')
            ->where('blog_category.is_delete', '=', 0)
            ->orderby('blog_category.id', 'desc')
            ->get();
    }

    static public function getRecordActive()
    {
        return self::select('blog_category.*')
            ->where('blog_category.is_delete', '=', 0)
            ->where('blog_category.status', '=', 0)
            ->orderby('blog_category.name', 'asc')
            ->get();
    }
    static public function getRecordActiveHome()
    {
        return self::select('blog_category.*')
            ->where('blog_category.is_delete', '=', 0)
            ->where('blog_category.status', '=', 0)
            ->where('blog_category.is_home', '=', 1)
            ->orderby('blog_category.name', 'asc')
            ->get();
    }

    static public function getBlogCategory()
    {
        return self::select('blog_category.*')
            ->where('blog_category.is_delete', '=', 0)
            ->where('blog_category.status', '=', 0)
            ->orderby('blog_category.name', 'asc')
            ->get();
    }

    public function getCountBlog()
    {
        return $this->hasMany(BlogModel::class, 'blog_category_id')
            ->where('blog.is_delete', '=', 0)
            ->where('blog.status', '=', 0)
            ->count();
    }
}
