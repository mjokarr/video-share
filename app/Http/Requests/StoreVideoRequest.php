<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreVideoRequest extends FormRequest
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
            'name' => ['required'],
            'length' => ['required', 'integer'],
            'slug' => ['required', 'unique:videos,slug', 'alpha_dash'],
            'file' => ['required', 'mimetypes:video/mp4', 'max:20000'],
            'thumbnail' => ['required', 'url'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
            // 'file' => $this->url,
        ]);
    }


    public function messages()
    {
        return ['file.*' => 'وجود فایلی با تایپ mp4 و کمتر از 20 مگابایت، برای ثبت ویدئو ضروری‌ست'];
    }

}
