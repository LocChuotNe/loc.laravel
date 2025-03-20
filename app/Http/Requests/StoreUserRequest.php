<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users|max:191',
            'name' => 'required|string',
            'user_catalogue_id' => 'required|integer|gt:0',
            'password' => 'required|string|min:6',
            're_password' => 'required|string|same:password',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập vào Email',
            'email.email' => 'Email chưa đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'email.string' => 'Email phải là dạng ký tự',
            'email.max' => 'Email dài tối đa 91 ký tự',
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.string' => 'Họ và tên phải là dạng ký tự',
            'user_catalogue_id.gt' => 'Bạn chưa chọn nhóm thành viên',
            'password.required' => 'Bạn chưa nhập vào Password',
            're_password.required' => 'Bạn chưa nhập vào ô nhập lại mật khẩu',
            're_password.same' => 'Mật khẩu không khớp',
            'image.image' => 'File phải là hình ảnh',
            'image.mimes' => 'Ảnh chỉ chấp nhận định dạng: jpeg, png, jpg, gif, webp',
            'image.max' => 'Ảnh có kích thước tối đa 2MB',
        ];
    }
}
