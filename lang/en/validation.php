<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute must not be greater than :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'The :attribute must not be greater than :max characters.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',
    'captcha' => 'The code value is invalid.',
    'recaptcha' => 'The code value is invalid.',


    /*
    |--------------------------------------------------------------------------
    | Comes for L8
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in laravel 8.
    */
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'current_password' => 'The password is incorrect.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'enum' => 'The selected :attribute is invalid.',
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'strength_password' => ':attribute ضعیف است. کلمه عبور باید شامل حروف بزرگ، کوچک، عدد و کاراکترهای خاص مثل(!@#$%^&*) باشد.',
        'billing_id' => '`:attribute` نامعتبر است.',
        'debit_card' => '`:attribute` نامعتبر است..',
        'uuid' => '`:attribute` نامعتبر است.',
        'individual_national_id' => ':attribute نامعتبر است.',
        'subdomain' => ':attribute نامعتبر یا رزرو شده است.',
        'invalid_given_data' => 'داده های وارد شده معتبر نمی باشند.',
        'mobile' => 'شماره همراه مندرج نامعتبر است.',
        'persian_alpha' => 'فقط کاراکترهای فارسی برای  :attribute مجاز می باشد.',
        'persian_alpha_number' => 'فقط کاراکترهای فارسی برای  :attribute مجاز می باشد.',
        'bank_sheba_number' => ':attribute نامعتبر است.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'نام',
        'username' => 'نام کاربری',
        'email' => 'ایمیل',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'password' => 'رمز عبور',
        'password_confirmation' => 'تکرار رمز عبور',
        'country' => 'کشور',
        'country_id' => 'کشور',
        'province' => 'استان',
        'province_id' => 'استان',
        'city' => 'شهر',
        'city_id' => 'شهر',
        'address' => 'آدرس',
        'phone' => 'شماره ثابت',
        'phone_no' => 'شماره ثابت',
        'mobile' => 'شماره همراه',
        'age' => 'سن',
        'sex' => 'جنسیت',
        'gender' => 'جنسیت',
        'day' => 'روز',
        'month' => 'ماه',
        'year' => 'سال',
        'hour' => 'ساعت',
        'minute' => 'دقیقه',
        'second' => 'ثانیه',
        'title' => 'عنوان',
        'text' => 'متن',
        'content' => 'محتوا',
        'description' => 'توضیحات',
        'excerpt' => 'گزیده مطلب',
        'date' => 'تاریخ',
        'time' => 'زمان',
        'available' => 'موجود',
        'size' => 'اندازه',
        'terms' => 'شرایط',
        'priority' => 'اولویت',
        'category_id' => 'دسته بندی',
        'type_id' => 'نوع',
        'national_id' => 'کد ملی',
        'image' => 'تصویر',
        'specialty_id' => 'تخصص',
        'subdomain_name' => 'زیر دامنه',
        'website_name' => 'نام وب سایت',
        'marital_status' => 'وضعیت تاهل',
        'religion' => 'دین',
        'military_service_status' => 'وضعیت نظام وظیفه',
        'sheba_number' => 'شماره شبای بانکی',

        'bank_id' => 'نام بانک',
        'account_no' => 'شماره حساب',
        'branch_name' => 'نام شعبه',
        'card_no' => 'شماره کارت',
        'iban_no' => 'شماره شبا',
        'comment' => 'توضیحات',
        'phone_no_reception' => 'تلفن پذیرش',
        'field_of_study' => 'مقطع',
        'place_of_graduation' => 'محل فارغ التحصیلی/تحصیل',
        'position_id' => 'موقعیت نمایش',
        'abbreviation' => 'مخفف',
        'passport_number' => ' شماره پاسپورت',
        'medical_id' => 'شماره نظام پزشکی',
        'about_me' => 'درباره من',
        'comment_share' => 'شعار',
        'old_password' => 'کلمه عبور قبلی',
        'token' => 'کد بازیابی',
        'latitude' => 'مسیریابی روی نقشه',
        'plate' => 'پلاک',
        'unit' => 'واحد',
    ],
];


