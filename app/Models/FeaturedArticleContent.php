<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedArticleContent extends Model
{
    use HasFactory;
    protected $connection = 'fukuriku';
    protected $fillable = [
        'featured_company_article_id',
        'subTitle',
        'image1',
        'image1Caption',
        'image2',
        'image2Caption',
        'body'
    ];
    public function featuredCompanyArticle()
    {
        return $this->belongsTo(FeaturedCompanyArticle::class);
    }
}
