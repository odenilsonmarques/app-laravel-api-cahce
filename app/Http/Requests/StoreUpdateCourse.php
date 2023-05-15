<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCourse extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        //pegando o parametro definido na rota edicao que declarei como identify, mas poderia ser qualquer nome. Verifica se esse paremetro existe caso contrario pega o valor null
        $uuid = $this->identify ?? '';

        return [
            // 'name' => ['required','min:3', 'max:255','unique:courses'],
            'name' => ['required','min:3', 'max:255',"unique:courses,name,{$uuid},uuid"],//definindo que a coluna nome do curso é unico, porem o resto pode ser alterado
            'description' => ['nullable','min:3','max:255'],
        ];
    }
}
