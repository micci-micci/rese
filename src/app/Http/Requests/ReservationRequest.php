<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'date' => 'required|date|after:today',
            'time' => 'required|date_format:H:i|after:today',
            'number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '予約日を入力してください',
            'date.after' => '今日より後の日付を指定してください。',
            'time.required' => '予約時間を入力してください',
            'time.after' => '日付を見直してください。',
            'number.required' => '予約人数を入力してください',
        ];
    }
}
