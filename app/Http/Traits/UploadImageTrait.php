<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

Trait UploadImageTrait
{
    public function uploadImage(Request $request, $folderName) {
        // التحقق من وجود ملف الصورة
        if ($request->hasFile('photo')) {
            // الحصول على اسم الصورة الأصلي
            $image = $request->file('photo')->getClientOriginalName();
            
            // رفع الصورة وتخزينها في المجلد المحدد
            $path = $request->file('photo')->storeAs($folderName, $image, 'moumena');
            
            // إرجاع مسار الصورة بعد رفعها
            return $path;
        }

        // إذا لم تكن الصورة موجودة في الطلب، إرجاع null
        return null;
    }
}


?>