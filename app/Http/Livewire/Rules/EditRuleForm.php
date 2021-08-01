<?php

namespace App\Http\Livewire\Rules;

use App\Models\Rule;
use Livewire\Component;

class EditRuleForm extends Component
{
    public Rule $rule;

    protected function rules() {
        return [
            'rule.email' => 'required|email|unique:rules,email,' . $this->rule->id,
            'rule.bucket' => 'required',
            'rule.region' => 'required',
            'rule.key' => 'required',
            'rule.secret' => 'required',
            'rule.path' => 'required',
            'rule.mimeType' => 'required'
        ];
    }
    public function mount(Rule $rule)
    {
        $this->rule = $rule;
    }
    public function render()
    {
        return view('livewire.rules.edit-rule-form');
    }

    public function back()
    {
        return redirect()->route('rules.index');
    }

    public function updateRule()
    {
        $this->validate();

        $this->rule->save();
        return redirect()->route('rules.index');
    }
}
