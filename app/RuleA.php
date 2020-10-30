<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RuleA extends Model
{
    public function ruleUploadSpeedLessThan10(){
		$products = DB::table('products')
						->where('upload_speed', '<', 10)
						->get();
						
    	return $products;
    }

    public function ruleUploadSpeedLessThan10AndFiber(){
    	$products = DB::table('products')
    						->where('upload_speed', '<', 10)
    						->where('technology', 'fiber')
    						->get();

    	return $products;
    }
}
