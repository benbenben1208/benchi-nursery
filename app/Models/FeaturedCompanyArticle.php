<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FrikuCompany;
use App\Models\FeaturedArticleContent;
class FeaturedCompanyArticle extends Model
{
    use HasFactory;
    protected $connection = 'fukuriku';
    protected $guarded = [
        'id',
    ];
    public function frikuCompany()
    {
        return $this->belongsTo(FrikuCompany::class, 'company_id');
    }
    public function featuredArticleContent()
    {
        return $this->hasMany(FeaturedArticleContent::class, 'featured_company_article_id');
    }
}
