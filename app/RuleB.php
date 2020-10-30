<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RuleB extends Model
{
    public function ruleDownloadSpeedGreaterThan100AndFiber(){
    	$products = DB::table('products')
    						->where('download_speed', '>', 100)
    						->where('technology', 'fiber')
    						->get();

    	return $products;
    }
}
