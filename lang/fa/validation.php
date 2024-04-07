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

    'accepted' => ':attribute باید پذیرفته شده باشد.',
    'active_url' => 'آدرس :attribute معتبر نیست',
    'after' => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal' => ':attribute باید تاریخی بعد از :date، یا مطابق با آن باشد.',
    'alpha' => ':attribute باید فقط حروف الفبا باشد.',
    'alpha_dash' => ':attribute باید فقط حروف الفبا، عدد و خط تیره(-) باشد.',
    'alpha_num' => ':attribute باید فقط حروف الفبا و عدد باشد.',
    'array' => ':attribute باید آرایه باشد.',
    'before' => ':attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal' => ':attribute باید تاریخی قبل از :date، یا مطابق با آن باشد.',
    'between' => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file' => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string' => ':attribute باید بین :min و :max کاراکتر باشد.',
        'array' => ':attribute باید بین :min و :max آیتم باشد.',
    ],
    'boolean' => 'فیلد :attribute فقط می‌تواند صحیح و یا غلط باشد',
    'confirmed' => ':attribute با فیلد تکرار مطابقت ندارد.',
    'date' => ':attribute یک تاریخ معتبر نیست.',
    'date_format' => ':attribute با الگوی :format مطاقبت ندارد.',
    'different' => ':attribute و :other باید متفاوت باشند.',
    'digits' => ':attribute باید :digits رقم باشد.',
    'digits_between' => ':attribute باید بین :min و :max رقم باشد.',
    'dimensions' => 'ابعاد تصویر :attribute قابل قبول نیست.',
    'distinct' => 'فیلد :attribute تکراری است.',
    'email' => ':attribute باید یک ایمیل معتبر باشد',
    'exists' => ':attribute انتخاب شده، معتبر نیست.',
    'file' => ':attribute باید یک فایل باشد',
    'filled' => 'فیلد :attribute الزامی است',
    'gte' => [
        'numeric' => 'فیلد :attribute باید مساوی یا بزرگتر از :value باشد.',
    ],
    'image' => ':attribute باید تصویر باشد.',
    'in' => ':attribute انتخاب شده، معتبر نیست.',
    'in_array' => 'فیلد :attribute در :other وجود ندارد.',
    'integer' => ':attribute باید عدد صحیح باشد.',
    'ip' => ':attribute باید IP معتبر باشد.',
    'ipv4' => ':attribute باید یک آدرس معتبر از نوع IPv4 باشد.',
    'ipv6' => ':attribute باید یک آدرس معتبر از نوع IPv6 باشد.',
    'json' => 'فیلد :attribute باید یک رشته از نوع JSON باشد.',
    'max' => [
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file' => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string' => ':attribute نباید بیشتر از :max کاراکتر باشد.',
        'array' => ':attribute نباید بیشتر از :max آیتم باشد.',
    ],
    'mimes' => ':attribute باید یکی از فرمت های :values باشد.',
    'mimetypes' => ':attribute باید یکی از فرمت های :values باشد.',
    'min' => [
        'numeric' => ':attribute نباید کوچکتر از :min باشد.',
        'file' => ':attribute نباید کوچکتر از :min کیلوبایت باشد.',
        'string' => ':attribute نباید کمتر از :min کاراکتر باشد.',
        'array' => ':attribute نباید کمتر از :min آیتم باشد.',
    ],
    'not_in' => ':attribute انتخاب شده، معتبر نیست.',
    'not_regex' => 'فرمت :attribute معتبر نیست.',
    'numeric' => ':attribute باید عدد باشد.',
    'present' => 'فیلد :attribute باید در پارامترهای ارسالی وجود داشته باشد.',
    'regex' => 'فرمت :attribute معتبر نیست',
    'required' => 'فیلد :attribute الزامی است',
    'required_if' => 'هنگامی که :other برابر با :value است، فیلد :attribute الزامی است.',
    'required_unless' => 'فیلد :attribute ضروری است، مگر آنکه :other در :values موجود باشد.',
    'required_with' => 'در صورت وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_with_all' => 'در صورت وجود فیلدهای :values، فیلد :attribute الزامی است.',
    'required_without' => 'در صورت عدم وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_without_all' => 'در صورت عدم وجود هر یک از فیلدهای :values، فیلد :attribute الزامی است.',
    'same' => ':attribute و :other باید مانند هم باشند.',
    'size' => [
        'numeric' => ':attribute باید برابر با :size باشد.',
        'file' => ':attribute باید برابر با :size کیلوبایت باشد.',
        'string' => ':attribute باید برابر با :size کاراکتر باشد.',
        'array' => ':attribute باسد شامل :size آیتم باشد.',
    ],
    'string' => 'فیلد :attribute باید متن باشد.',
    'timezone' => 'فیلد :attribute باید یک منطقه زمانی قابل قبول باشد.',
    'unique' => ':attribute قبلا انتخاب شده است.',
    'uploaded' => 'آپلود فایل :attribute موفقیت آمیز نبود.',
    'url' => 'فرمت آدرس :attribute اشتباه است.',
    'captcha' => 'کد اعتبار سنجی نامعتبر می باشد.',
    'recaptcha' => 'کد اعتبار سنجی نامعتبر می باشد.',
    'prohibited_if' => 'وقتی :other برابر با :value است، فیلد :attribute مجاز نیست.',
    'enum' => ' :attribute انتخاب شده نامعتبر است',
    'prohibits' => 'وقتی فیلد :attribute  وجود دارد ، فیلد :other مجاز نیست.',


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
        'strength_password' => ':attribute ضعیف است. کلمه عبور باید شامل حروف بزرگ، کوچک، عدد و کاراکترهای خاص مثل(!@#$%^&*) باشد.',
        'billing_id' => '`:attribute` نامعتبر است.',
        'debit_card' => '`:attribute` نامعتبر است.',
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
    ],
];
