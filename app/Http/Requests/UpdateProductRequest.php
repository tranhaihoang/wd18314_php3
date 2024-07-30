<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'=>['required','string','max:255'],
            'price'=>['required','integer','min:0'],
            'quantity'=>['required','integer','min:1'],
            'image'=>['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
            'category_id'=>['required','exists:categories,id'],
            'describe'=>['required','string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=> 'Trường tên là bắt buộc',
            'name.string'=>'Tên phải là chuỗi ký tự',
            'name.max'=>'Tên không vượt quá 255 ký tự',
            'price.required'=>'Giá là bắt buộc',
            'price.integer'=>'Giá là số nguyên',
            'price.min'=>'Giá nhỏ nhất là 0',
            'quantity.required'=>'Số lượng là bắt buộc',
            'quantity.integer'=>'Số lượng là số nguyên',
            'quantity.min'=>'Số lượng nhỏ nhất là 1',
            'image.required'=>'Tệp là bắt buộc',
            'image.image'=>'Tệp bắt buộc là hình ảnh',
            'image.mimes'=>'Hình ảnh là các tệp loại:jpeg,png,jpg,gif',
            'image.max'=>'kích thước ảnh không vượt quá 2048 kylobytes',
            'category_id.required'=>'Trường danh mục là bắt buộc',
            'category_id.exists'=>'Danh mục đã chọn không hợp lệ',
            'describe.required'=>'Mô tả là bắt buộc',
            'describe.string'=>'Mô tả là chuỗi ký tự',
        ];
    }
}
