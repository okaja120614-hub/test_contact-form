<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => ['required', 'string', 'max:8'],
            'first_name' => ['required', 'string', 'max:8'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'tel-before' => ['required', 'numeric', 'digits_between:1,5'],
            'tel-center' => ['required', 'numeric', 'digits_between:1,5'],
            'tel-after' => ['required', 'numeric', 'digits_between:1,5'],
            'address' => ['required'],
            'category' => ['required'],
            'detail' => ['required', 'max:120']
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'last_name.string' => '姓を文字列で入力してください',
            'last_name.max' => '姓を8文字以下で入力してください',
            'first_name.required' => '名を入力してください',
            'first_name.string' => '名を文字列で入力してください',
            'first_name.max' => '名を8文字以下で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel-before.required' => '電話番号を入力してください',
            'tel-before.numeric' => '電話番号は 半角英数字で入力してください',
            'tel-before.digits_between' => '電話番号は 5桁まで数字で入力してください',
            'tel-center.required' => '電話番号を入力してください',
            'tel-center.numeric' => '電話番号は 半角英数字で入力してください',
            'tel-center.digits_between' => '電話番号は 5桁まで数字で入力してください',
            'tel-after.required' => '電話番号を入力してください',
            'tel-after.numeric' => '電話番号は 半角英数字で入力してください',
            'tel-after.digits_between' => '電話番号は 5桁まで数字で入力してください',
            'address.required' => '住所を入力してください',
            'category.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
