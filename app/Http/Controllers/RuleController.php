<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::paginate(15);

        return view('rules.index', compact('rules'));
    }

    public function destroy(Rule $rule)
    {
        $rule->delete();

        return redirect()->route('rules.index');
    }

    public function edit(Rule $rule)
    {
        return view('rules.edit', compact('rule'));
    }
}
