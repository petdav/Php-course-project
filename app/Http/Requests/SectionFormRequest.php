<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2',
            'body' => 'required'
        ];
    }
    public function persist()
    {
        Section::create([
            'name' => $this->name,
            'body' => $this->body,
        ]);
    }

    public function validate(){
        foreach ($user->roles as $role) {
            if ($role->permissions->pluck('name')->contains('can-add-sections')) {
                return Gate::allows('can-add-sections', $request->user);
            }
            else{
                return Gate::denies('can-add-sections', $request->user);
            }
        }
        return Gate::allows('can-add-sections', $request->user);
    }

}