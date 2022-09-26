<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Category;
use App\Models\ChangeConstant;
use App\Models\Card;
use App\Models\City;
use App\Models\CourseFeature;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Review;
use App\Models\SubTitle;
use App\Models\Title;
use App\Models\FamousProgrammer;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'             => 'backend', 
            'slug'              => 'backend',
        ]);
        Course::create([
            'title'             => 'backend diploma', 
            'slug'              => 'backend diploma',
            'description'       => '
            المكان الوحيد اللى هيأهلك ويدربك وينزلك سوق العمل 
            هتدرس المسار كامل , وهتدرب شهر كامل , وهتنضم لاكبر قاعده مبرمجين في الوطن العربي , وهنرشحك ونساعدك في التقديم لوظائف بعد إنتهائك من الدراسة .
            ',
            'coursefeatures'      =>'المحاضر اللى بيشرح الكورس مهندس برمجيات خبره اكبر من 10 سنين 
            الكورس تطبيق عملي بالكامل علي كل خطوه بيتم شرحها 
            بعد ما تنتهي من الكورس هتبدأ في عمل مشاريع كامله حقيقيه علشان تخوض التجربه بشكل حقيقي
            هتنضم لجروب فيه مجموعه من انجح المبرمجين اللى درسوا معانا وبدأو في المجال وخبرات كبيرة ومتنوعه 
            بيكون في ايفينتات بنعملها كل فتره وبيكون موجود فيها اكبر وانجح الناس في المجال علشان تفيدك بخبرتها
            متابعه بعد التدريب مستمره بشكل كامل وفريق معاك للرد علي كل اسئلتك اللى بتطرحها
            بيكون ليك فرصه فى التدريب معانا لمده شهر كامل بعد الانتهاء من الكورس 
            بنحاول بقدر الامكان نوفر وظائف للناس اللى انتهت من الكورس و بنساعد في تأهيلهم لإيجاد وظائف',
            'image'             => 'back-2_1627326624.webp',
            'rating'            => '5',
            'lectures'          => '60',
            'price'             => '3000',
            'offer'             => '150',
            'explanation_video' => '<iframe width="1076" height="400" src="https://www.youtube.com/embed/O6vtEiJxOZ8" title="php project - registration system using php and mysql (arabic)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'review_video'      => '<iframe width="636" height="400" src="https://www.youtube.com/embed/2jT4Zto8gs8" title="eraasoft" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'category_id'       => '1',
            'status'            => 'publish',
            
        ]);
        City::create([
            'city'             => 'cairo', 
        ]);
        Card::create([
            'name'             => 'mostafa elgamal', 
            'description'      => 'website for course backend', 
            'url'              => 'http://elgamalcourse.herokuapp.com/dashborad', 
            'rating'           => '5',
            'image'           => 'courses-4.jpg',  
            'course_id'        => '1', 
        ]);
        Faq::create([
            'question'           => 'بناخد كام محاضره في الاسبوع ؟', 
            'answer'             => '1', 
            'course_id'          => '1', 
        ]);
        Review::create([
            'review_video'          => '<iframe width="560" height="315" src="https://www.youtube.com/embed/DYlYhuk2ZtE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>', 
            'review_image'          => 'r1_1652729127.webp', 
            'course_id'             => '1', 
        ]);
        Title::create([
            'title'                 => 'introduction to back-end', 
            'description'           => 'ليه اصلا تعرف وتفهم الاساسيات بتاعت الـ باك اند ؟', 
            'course_id'             => '1',
        ]);
        SubTitle::create([
            'subtitle'             => 'get and post', 
            'title_id'             => '1',
        ]);
        FamousProgrammer::create([
            'image'                => 'unnamed.jpg', 
        ]);
        ChangeConstant::create([
            'enrollnow'                => 'سجل الان', 
            'title_section_content'    => 'محتوى الدبلومة ', 
            'title_video1'             => 'اعرف اكتر عن ايراسوفت وعن اللى بنقدمه ', 
            'title_video2'             => 'ده فيديو من المحاضرات اللى موجوده فى الدبلومة , تقدر تشوفه كامل', 
            'title_section_review'     => 'ودى بعض اراء الطلبه معانا فى الدبلومه', 
            'title_form'               => 'تقدر تسجل الوقت وتستفيد بالخصم المتاح قبل انتهاء العدد او المدة للخصم', 
            'title_form_offer'         => 'خصم 10% لو سجلت فى الدبلومه خلال 24 ساعه', 
            'submit_form'              => 'سجل الان', 
            'title_card'               => 'اعمال طلابنا', 
            'title_coursefeature'      => 'إيه هيا المميزات اللي هتطلع بيها كمتدرب من الكورس ؟', 
            'title_famousprogrammer'   => 'اكبر المبرمجين الناجحين في الوطن العربي', 
        ]);
    }
}