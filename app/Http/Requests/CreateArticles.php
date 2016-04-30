<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class CreateArticles extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|min:3',
            'body'=>'required',
            'tags' => 'required',
            'category_id' => 'required'
        ];
    }

    protected function formatErrors(Validator $validator) {
        return $validator->errors()->all();
    }
}
