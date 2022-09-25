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
            'description'       => 'full diploma',
            'image'             => 'mostafa@eraasoft.com',
            'rating'            => '5',
            'lectures'          => '60',
            'price'             => '3000',
            'offer'             => '150',
            'explanation_video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/v228zMxqW2k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'review_video'      => '<iframe width="560" height="315" src="https://www.youtube.com/embed/9to0zcK2hxA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
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
            'image'           => '5',  
            'course_id'        => '1', 
        ]);
        CourseFeature::create([
            'title'             => 'في ناس كتير بتدرس ولكن بعد الدراسه بتكون محتاجه  يتابع معاها ويوجهها هل هيا ماشيه صح والا غلط , وناس تانيه بتكون محتاجه مساعده او تريكات علشان تنزل سوق العمل وتتوظف فلذلك إحنا مش مكان بيوفر كورس فقط إحنا مكان متكامل لبدايه دراستك وتدريبك وتاهيلك لسوق العمل بأكبر قدر ممكن , ودا اللى بنوفره من خلالنا ومش هتلاقيه في مكان تاني ', 
            'description'       => 'المحاضر اللى بيشرح الكورس مهندس برمجيات خبره اكبر من 10 سنين 
            الكورس تطبيق عملي بالكامل علي كل خطوه بيتم شرحها 
            بعد ما تنتهي من الكورس هتبدأ في عمل مشاريع كامله حقيقيه علشان تخوض التجربه بشكل حقيقي
            هتنضم لجروب فيه مجموعه من انجح المبرمجين اللى درسوا معانا وبدأو في المجال وخبرات كبيرة ومتنوعه 
            بيكون في ايفينتات بنعملها كل فتره وبيكون موجود فيها اكبر وانجح الناس في المجال علشان تفيدك بخبرتها
            متابعه بعد التدريب مستمره بشكل كامل وفريق معاك للرد علي كل اسئلتك اللى بتطرحها
            بيكون ليك فرصه فى التدريب معانا لمده شهر كامل بعد الانتهاء من الكورس 
            بنحاول بقدر الامكان نوفر وظائف للناس اللى انتهت من الكورس و بنساعد في تأهيلهم لإيجاد وظائف
            ', 
            'course_id'         => '1', 
        ]);
        Faq::create([
            'question'           => 'بناخد كام محاضره في الاسبوع ؟', 
            'answer'             => '1', 
            'course_id'          => '1', 
        ]);
        Review::create([
            'review_video'          => '<iframe width="560" height="315" src="https://www.youtube.com/embed/v228zMxqW2k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 
            'course_id'             => '1', 
        ]);
        Title::create([
            'title'                 => 'php', 
            'description'           => 'what is php?', 
            'course_id'             => '1',
        ]);
        SubTitle::create([
            'subtitle'             => 'get and post', 
            'title_id'             => '1',
        ]);
    }
}