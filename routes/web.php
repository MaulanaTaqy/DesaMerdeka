<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\AppConfigController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqBannerController;
use App\Http\Controllers\BlogBannerController;
use App\Http\Controllers\GuestEventController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\UpdateNoteController;
use App\Http\Controllers\EventBannerController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\GalleryVideoController;
use App\Http\Controllers\AboutUsBannerController;
use App\Http\Controllers\ContactBannerController;
use App\Http\Controllers\DeveloperNoteController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GalleryBannerController;
use App\Http\Controllers\MemberStartupController;
use App\Http\Controllers\ProductBannerController;
use App\Http\Controllers\RoadmapBannerController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\MemberAsosiasiController;
use App\Http\Controllers\MemberKomunitasController;
use App\Http\Controllers\MemberKemenperinController;
use App\Http\Controllers\MemberTechnoparkController;
use App\Http\Controllers\MemberTypeBannerController;
use App\Http\Controllers\MetaBlogCategoryController;
use App\Http\Controllers\MetaEventCategoryController;
use App\Http\Controllers\MetaMemberCategoryController;
use App\Http\Controllers\MetaGalleryCategoryController;
use App\Http\Controllers\MetaProductCategoryController;
use App\Http\Controllers\UpdateProfileMemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test-qzwrsyd2', [AuthController::class, 'testEmail']);
Route::get('/donation', function(){
    $data['app'] = \App\Models\AppConfig::first();
    return view('homepage.content.donasi.index', $data);
});
Route::post('/donate', [DonationController::class, 'donate'])->name('donation.donate');




Route::get('/','App\Http\Controllers\landingpage\HomeController@index')->name('home.index');
Route::get('/map_virtual','App\Http\Controllers\landingpage\HomeController@map_virtual')->name('home.map_virtual');
Route::get('/about','App\Http\Controllers\landingpage\AboutController@index')->name('about.index');
Route::get("/detail-partner/{id?}/detail", 'App\Http\Controllers\landingpage\HomeController@detail_partner')->name("partner.detail");
Route::get('/road-map','App\Http\Controllers\landingpage\RoadmapController@index')->name('home.roadmap');
Route::get('/kontak','App\Http\Controllers\landingpage\ContactController@index')->name('contact.index');
Route::post('/kontak/send','App\Http\Controllers\landingpage\ContactController@sendMessage')->name('contact.send');
Route::get('/home/faq','App\Http\Controllers\landingpage\FaqController@index')->name('home.faq.index');

Route::get('/home/daftar/{id?}','App\Http\Controllers\landingpage\GuestController@index')->name('daftar.index');
// Route::get('/home/daftar/{id?}','App\Http\Controllers\landingpage\GuestController@daftar')->name('daftar.daftar');

Route::get('/home/blog/{id?}','App\Http\Controllers\landingpage\BlogController@index')->name('home.blog.all');
Route::get('/home/blog/{id?}/created-by','App\Http\Controllers\landingpage\BlogController@createdBy')->name('home.blog.created-by');
Route::get('/home/blog/{id?}/detail_blog','App\Http\Controllers\landingpage\BlogController@detail')->name('home.blog.detail');

Route::get('/home/event/{id?}/{tags?}','App\Http\Controllers\landingpage\EventController@index')->name('home.event.all');
Route::get('/home/event-by/{id?}','App\Http\Controllers\landingpage\EventController@createdBy')->name('home.event.created-by');
Route::get('/home/detail_event/{id?}/detail','App\Http\Controllers\landingpage\EventController@detail')->name('home.event.detail');

Route::get('/home/member/{id?}','App\Http\Controllers\landingpage\MemberController@index')->name('home.member.all');
Route::get('/home/member/{id?}/detail','App\Http\Controllers\landingpage\MemberController@show')->name('home.member.detail');

Route::get('/home/sponsor/all','App\Http\Controllers\landingpage\SponsorController@index')->name('home.sponsor.all');
Route::get('/home/sponsor/register','App\Http\Controllers\landingpage\SponsorController@register')->name('home.sponsor.register');
Route::resource('home/sponsor', 'App\Http\Controllers\landingpage\SponsorController');

Route::get('/album/{id?}','App\Http\Controllers\landingpage\GalleryController@index')->name('home.gallery.index');
Route::get('/album/{id?}/created-by','App\Http\Controllers\landingpage\GalleryController@createdBy')->name('home.gallery.created-by');
Route::get('/album/{id?}/detail','App\Http\Controllers\landingpage\GalleryController@show')->name('home.gallery.detail');

Route::get('/album/member/{id?}/detail','App\Http\Controllers\landingpage\GalleryController@showMember')->name('home.member.gallery.detail');
Route::get('/album/member/{id?}/{member_id?}','App\Http\Controllers\landingpage\GalleryController@indexMember')->name('home.member.gallery.index');

Route::get('/apps/{id?}','App\Http\Controllers\landingpage\AppController@index')->name('app.index');
Route::get('/apps/{id?}/created_by','App\Http\Controllers\landingpage\AppController@createdBy')->name('app.created-by');
Route::get('/apps/{id?}/detail','App\Http\Controllers\landingpage\AppController@show')->name('app.detail');
Route::post('/apps/send-message','App\Http\Controllers\landingpage\AppController@sendMessage')->name('app.send-message');

Route::get('/{id?}/account-activation-guest/{rand?}', [AuthController::class, 'accountActivationGuest'])->name('activation-guest');
Route::get('/{id?}/account-activation/{rand?}', [AuthController::class, 'accountActivation'])->name('activation');
Route::post('/daftar/guest/{id}', 'App\Http\Controllers\AuthController@daftarGuest')->name('daftarGuest');
Route::post('/daftar/member/{id}', 'App\Http\Controllers\AuthController@daftar')->name('daftar');


Route::get('/forgot-password', function (){
    return view('forgot-password');
})->middleware('guest')->name('forgot-password');

Route::post('/forgot-password', [AuthController::class, 'mailSend'])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'passwordReset'])->middleware('guest')->name('password.update');

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'create')->name('register.process');

    Route::view('/login', 'homepage.content.login.index')->name('login');
    // Route::view('/login', 'login')->name('login');

    Route::post('/login-process', 'authenticate')->name('login.process');
    Route::get('/logout', 'logout')->name('logout');

    Route::get('/team-selection', 'coreSelection')->name('selection');
    Route::get('/team-selection/{member_id?}', 'proccessSelection')->name('proccess.selection');
    Route::post('/register/guest', 'registerGuest')->name('registerGuest.process');

});


// Auntenticated users only
Route::middleware('auth')->group(function () {

    /* ================================================================================================================ *
    *                                                                                                                   *
    *                                                   General User                                                    *
    *                                                                                                                   *
    * ================================================================================================================= */
    Route::get('dashboard/datatable', [DashboardController::class, 'datatable'])->name('dashboard.datatable');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('profile-member', UpdateProfileMemberController::class);
    Route::resource('profile', UpdateProfileController::class);

    Route::get('event/upcomingEvent', [EventController::class, 'upcomingEvent'])->name('event.upcoming-event');
    Route::get('event/guest/list', [EventController::class, 'index'])->name('event.guest.index');


    //dashboard guest
    Route::get('guest-dashboard/incomingEvent', [DashboardController::class, 'incomingEvent'])->name('guest-dashboard.incoming-event');
    Route::resource('guest-dashboard', DashboardController::class);

    Route::prefix('meta')->name('meta.')->group(function () {
        Route::get('speakers/select-data', [SpeakerController::class, 'select2'])->name('speakers.select2');
        Route::get('blog-category/select-data', [MetaBlogCategoryController::class, 'select2'])->name('blog-category.select2');
        Route::get('member-category/select-data', [MetaMemberCategoryController::class, 'select2'])->name('member-category.select2');
        Route::get('product-category/select-data', [MetaProductCategoryController::class, 'select2'])->name('product-category.select2');
        Route::get('event-category/select-data', [MetaEventCategoryController::class, 'select2'])->name('event-category.select2');
        Route::get('gallery-category/select-data', [MetaGalleryCategoryController::class, 'select2'])->name('gallery-category.select2');
    });

    
    Route::get('update-noted/datatable', [UpdateNoteController::class, 'datatable'])->name('update-noted.datatable');
    Route::resource('update-noted', UpdateNoteController::class);
    
    Route::get('panduan', [GuideController::class, 'index'])->name('panduan.index');
    Route::get('panduan/registrasi', [GuideController::class, 'indexRegis'])->name('panduan.regis.indexRegis');
    Route::get('panduan/dashboard', [GuideController::class, 'indexDashboard'])->name('panduan.dashboard.indexDashboard');
    Route::get('panduan/upload-event', [GuideController::class, 'indexUpload'])->name('panduan.upload.indexUpload');
    Route::get('panduan/upload-apps', [GuideController::class, 'indexApp'])->name('panduan.app.indexApp');
    Route::get('panduan/upload-berita', [GuideController::class, 'indexBerita'])->name('panduan.berita.indexBerita');
    Route::get('panduan/mail', [GuideController::class, 'indexMail'])->name('panduan.mail.indexMail');
    Route::get('panduan/chat', [GuideController::class, 'indexChat'])->name('panduan.chat.indexChat');
    Route::get('panduan/aktivasi-acount', [GuideController::class, 'indexAktivasi'])->name('panduan.aktivasi.indexAktivasi');
    Route::resource('panduan', GuideController::class);

    Route::group(['middleware' => ['role:guest']], function () {
        Route::post('event/store-register-event', [EventController::class, 'storeRegisterEvent'])->name('event.store-register-event');
        Route::get('event/register-event', [EventController::class, 'registerEvent'])->name('event.register-event');
    });

    /* ================================================================================================================ *
    *                                                                                                                   *
    *                                            Access Gate For Admin Only                                             *
    *                                                                                                                   *
    * ================================================================================================================= */
    Route::group(['middleware' => ['role:admin']], function () {
        
        Route::prefix('meta')->name('meta.')->group(function () {
            Route::get('blog-category/datatable', [MetaBlogCategoryController::class, 'datatable'])->name('blog-category.datatable');
            Route::resource('blog-category', MetaBlogCategoryController::class);
            
            Route::get('speakers/datatable', [SpeakerController::class, 'datatable'])->name('speakers.datatable');
            Route::resource('speakers', SpeakerController::class);
    
            Route::get('member-category/datatable', [MetaMemberCategoryController::class, 'datatable'])->name('member-category.datatable');
            Route::resource('member-category', MetaMemberCategoryController::class);
    
            Route::get('product-category/datatable', [MetaProductCategoryController::class, 'datatable'])->name('product-category.datatable');
            Route::resource('product-category', MetaProductCategoryController::class);
    
            Route::get('event-category/datatable', [MetaEventCategoryController::class, 'datatable'])->name('event-category.datatable');
            Route::resource('event-category', MetaEventCategoryController::class);
    
            Route::get('gallery-category/datatable', [MetaGalleryCategoryController::class, 'datatable'])->name('gallery-category.datatable');
            Route::resource('gallery-category', MetaGalleryCategoryController::class);
        });

        Route::get('home-about', [AboutUsController::class, 'index'])->name('home-about.index');
        Route::resource('home-about', AboutUsController::class);

        Route::get('home-contact', [AppConfigController::class, 'index'])->name('homepagecontact.index');
        Route::resource('home-contact', AppConfigController::class);

        Route::get('kemenperin/datatable', [MemberKemenperinController::class, 'datatable'])->name('kemenperin.datatable');
        Route::resource('kemenperin', MemberKemenperinController::class);
        
        Route::get('desa/datatable', [MemberTechnoparkController::class, 'datatable'])->name('desa.datatable');
        Route::resource('desa', MemberTechnoparkController::class);
        
        Route::post('member/is-showed', [MemberController::class, 'isShowed'])->name('member.is-showed');

        Route::post('sponsors/is-showed', [SponsorController::class, 'isShowed'])->name('sponsors.is-showed');
        
        Route::get('faq/datatable', [FaqController::class, 'datatable'])->name('faq.datatable');
        Route::resource('faq', FaqController::class);

        Route::get('roadmap/datatable', [RoadmapController::class, 'datatable'])->name('roadmap.datatable');
        Route::resource('roadmap', RoadmapController::class);

        Route::get('blog-banner/datatable', [BlogBannerController::class, 'datatable'])->name('blog-banner.datatable');
        Route::resource('blog-banner', BlogBannerController::class);

        Route::get('faq-banner/datatable', [FaqBannerController::class, 'datatable'])->name('faq-banner.datatable');
        Route::post('faq/privacy-policy', [FaqController::class, 'privacyPolicy'])->name('faq.privacy-policy');
        Route::post('faq/term-condition', [FaqController::class, 'termCondition'])->name('faq.term-condition');
        Route::resource('faq-banner', FaqBannerController::class);

        Route::get('gallery-banner/datatable', [GalleryBannerController::class, 'datatable'])->name('gallery-banner.datatable');
        Route::resource('gallery-banner', GalleryBannerController::class);

        Route::get('about-us-banner/datatable', [AboutUsBannerController::class, 'datatable'])->name('about-us-banner.datatable');
        Route::resource('about-us-banner', AboutUsBannerController::class);

        Route::get('contact-banner/datatable', [ContactBannerController::class, 'datatable'])->name('contact-banner.datatable');
        Route::resource('contact-banner', ContactBannerController::class);

        Route::get('roadmap-banner/datatable', [RoadmapBannerController::class, 'datatable'])->name('roadmap-banner.datatable');
        Route::resource('roadmap-banner', RoadmapBannerController::class);
        
        Route::get('product-banner/datatable', [ProductBannerController::class, 'datatable'])->name('product-banner.datatable');
        Route::resource('product-banner', ProductBannerController::class);
        
        Route::get('event-banner/datatable', [EventBannerController::class, 'datatable'])->name('event-banner.datatable');
        Route::resource('event-banner', EventBannerController::class);

        Route::get('member-type-banner/select-data', [MemberTypeBannerController::class, 'select2'])->name('member-type-banner.select2');
        Route::get('member-type-banner/datatable', [MemberTypeBannerController::class, 'datatable'])->name('member-type-banner.datatable');
        Route::resource('member-type-banner', MemberTypeBannerController::class);



        Route::resource('developer-notes', DeveloperNoteController::class);
    });
    
    
    /* ================================================================================================================ *
    *                                                                                                                   *
    *                                        Access Gate For Admin and Technopark                                       *
    *                                                                                                                   *
    * ================================================================================================================= */
    Route::group(['middleware' => ['role_or_permission:admin|member-account']], function () {

        Route::post('blog/approval', [BlogController::class, 'approval'])->name('blog.approval');
        Route::post('member/approval', [AuthController::class, 'approval'])->name('auth.approval');
        Route::post('event/approval', [EventController::class, 'approval'])->name('event.approval');
        Route::post('product/approval', [ProductController::class, 'approval'])->name('product.approval');
        Route::post('sponsors/approval', [SponsorController::class, 'approval'])->name('sponsors.approval');

        Route::get('umkm/datatable', [MemberStartupController::class, 'datatable'])->name('umkm.datatable');
        Route::resource('umkm', MemberStartupController::class);

        Route::get('komunitas-asosiasi/datatable', [MemberAsosiasiController::class, 'datatable'])->name('komunitas-asosiasi.datatable');
        Route::resource('komunitas-asosiasi', MemberAsosiasiController::class);

        Route::get('industri/datatable', [MemberKomunitasController::class, 'datatable'])->name('industri.datatable');
        Route::resource('industri', MemberKomunitasController::class);
    });
    

    /* ================================================================================================================ *
    *                                                                                                                   *
    *                                Access Gate For Admin or all Member which has approved                             *
    *                                                                                                                   *
    * ================================================================================================================= */
    Route::group(['middleware' => ['role_or_permission:admin|approved']], function () {
        

        Route::prefix('meta')->name('meta.')->group(function () {    
            Route::get('speakers/datatable', [SpeakerController::class, 'datatable'])->name('speakers.datatable');
            Route::resource('speakers', SpeakerController::class);
        });

        Route::get('blog/datatable', [BlogController::class, 'datatable'])->name('blog.datatable');
        Route::resource('blog', BlogController::class);
    
        Route::get('event/datatable', [EventController::class, 'datatable'])->name('event.datatable');
        Route::delete('event/images/{id?}/delete', [EventController::class, 'imagesDelete'])->name('event.images.delete');
        Route::resource('event', EventController::class);  
        
        Route::get('sponsors/datatable', [SponsorController::class, 'datatable'])->name('sponsors.datatable');
        Route::get('sponsors/select-data', [SponsorController::class, 'select2'])->name('sponsors.select2');
        Route::resource('sponsors', SponsorController::class);

        Route::get('product/datatable', [ProductController::class, 'datatable'])->name('product.datatable');
        Route::post('product/hki', [ProductController::class, 'hki'])->name('product.hki');
        Route::delete('product/images/{id?}/delete', [ProductController::class, 'imagesDelete'])->name('product.images.delete');
        Route::resource('product', ProductController::class);


        Route::get('gallery/datatable', [GalleryController::class, 'datatable'])->name('gallery.datatable');
        Route::resource('gallery', GalleryController::class);

        
        // Route::get('gallery_image/datatable', [GalleryImageController::class, 'datatable'])->name('gallery_image.datatable');
        // Route::resource('gallery_image', GalleryImageController::class);
        
        //service
        Route::get('service/datatable', [ServiceController::class, 'datatable'])->name('service.datatable');
        Route::resource('service', ServiceController::class);
        
        Route::get('team-member/datatable', [TeamMemberController::class, 'datatable'])->name('team-member.datatable');
        Route::resource('team-member', TeamMemberController::class);
        
        Route::get('guest-event/show/{id?}', [GuestEventController::class, 'show'])->name('guest-event.show');
        Route::get('guest-event/datatable/{id?}', [GuestEventController::class, 'datatable'])->name('guest-event.datatable');
        Route::get('guest-event/{id?}', [GuestEventController::class, 'index'])->name('guest-event.index');

        Route::get('galleryImages/{id?}/datatable', [GalleryImageController::class, 'datatable'])->name('galleryImages.datatable');
        Route::get('galleryImages/{id?}', [GalleryImageController::class, 'show'])->name('galleryImages.showDetail');
        Route::resource('galleryImages', GalleryImageController::class);

        Route::get('gallery_video/{id?}/datatable', [GalleryVideoController::class, 'datatable'])->name('gallery_video.datatable');
        Route::resource('gallery_video', GalleryVideoController::class);
    });
});
