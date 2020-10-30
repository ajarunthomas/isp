<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Rule;
use App\RuleA;
use App\RuleB;

class RuleController extends Controller
{
    public function welcome(){
    	$custom_rules = DB::table('rules')->distinct()->get(['name']);

    	return view('welcome', ['products' => [], 'rule' => '', 'custom_rules' => $custom_rules]);
    }

    public function getRule(Request $request){
    	$rule = $request->input('rule');

    	switch($rule){
    		case "UploadSpeedLessThan10":$rule_a = new RuleA();
							    	$products = $rule_a->ruleUploadSpeedLessThan10();
							    	break;
    		case "UploadSpeedLessThan10AndFiber":$rule_a = new RuleA();
							    	$products = $rule_a->ruleUploadSpeedLessThan10AndFiber();
							    	break;
    		case "DownloadSpeedGreaterThan100AndFiber":$rule_b = new RuleB();
							    	$products = $rule_b->ruleDownloadSpeedGreaterThan100AndFiber();
							    	break;
			default: $products = [];
						break;
    	}

    	$custom_rules = DB::table('rules')->distinct()->get(['name']);

    	return view('welcome', [
    		'products' => $products, 
    		'rule' => $rule,
    		'custom_rules' => $custom_rules
    	]);
    }

    public function getCustomRule(Request $request){
    	$rule = $request->input('rule');
    	$products = [];

    	$criteria = DB::table('rules')
    						->where('name', $rule)
    						->get();

    	$query = DB::table('products');

    	for($i=0;$i<count($criteria);$i++){
    		$query->where($criteria[$i]->field, $criteria[$i]->operand, $criteria[$i]->value);
    	}

    	$products = $query->get();

    	$custom_rules = DB::table('rules')->distinct()->get(['name']);

    	return view('welcome', [
    		'products' => $products, 
    		'rule' => $rule,
    		'custom_rules' => $custom_rules
    	]);
    }

    public function createRule(){
    	return view('create_rule');
    }

    public function createRuleSubmit(Request $request){
    	$rule = new Rule([
    		'name' => $request->input('name'),
    		'field' => $request->input('field'),
    		'operand' => $request->input('operand'),
    		'value' => $request->input('value')
    	]);

    	$rule->save();

    	return redirect()->back();
    }
}
