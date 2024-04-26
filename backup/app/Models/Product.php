<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }
    public function sizes()
    {
        return $this->hasMany(ProductSize::class,'product_id');
    }
    public function customs()
    {
        return $this->hasMany(ProductCustom::class,'product_id');
    }
    public function discountedPrice()
    {
        $discountedPrice = $this->price - ($this->price * $this->discount/100);
        return number_format($discountedPrice, 2);
    }

    public function league()
    {
        return $this->belongsTo(League::class,'league_id');
    }
    public function league_team()
    {
        return $this->belongsTo(LeagueTeam::class,'league_team_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function country_team()
    {
        return $this->belongsTo(CountryTeam::class,'country_team_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
}
