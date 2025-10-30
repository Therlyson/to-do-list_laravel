<?php

namespace App\Http\Requests;

use App\Enums\StatusTarefa;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTarefaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string'],
            'descricao' => ['nullable', 'string'],
            'status' => ['required', Rule::enum(StatusTarefa::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'titulo.string' => 'O título deve ser um texto válido.',
            'descricao.string' => 'A descrição deve ser um texto válido.',
            'status.required' => 'O campo status é obrigatório.',
            'status.enum' => 'O status selecionado é inválido.',
        ];
    }

    protected function prepareForValidation(): void
    {
        if (!$this->has('status') || empty($this->status)) {
            $this->merge([
                'status' => StatusTarefa::PENDENTE->value //default to PENDENTE
            ]);
        }
    }
}