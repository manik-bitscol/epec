<?php

use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ImageUploadController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PhaseController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SisterConcernController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TypeController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth', 'verified'])->group(function ()
{
    Route::controller(DashboardController::class)->group(function ()
    {
        Route::get('/dashboard', 'index')->name('admin.dashboard');

        Route::get('/prfile/show-profile', 'show')->name('admin.profile.show');
        Route::get('/profile/change-password', 'changePassword')->name('admin.change.password');
        Route::patch('/profile/change-password', 'updatePassword')->name('admin.change.password.update');
        Route::get('/create-admin', 'create')->name('admin.create');
        Route::post('/store-admin', 'store')->name('admin.store');
        Route::get('/prfile/edit-profile', 'edit')->name('admin.profile.edit');
        Route::patch('/prfile/edit-update', 'update')->name('admin.profile.update');

    });
    Route::post('/timymce/image/upload', [ImageUploadController::class, 'upload'])->name('tinymce.image.upload');
    Route::get('/admin/about-section/edit/{id}', [AboutSectionController::class, 'edit'])->name('admin.about.edit');
    Route::put('/admin/about-section/update/{id}', [AboutSectionController::class, 'update'])->name('admin.about.update');

    Route::controller(GalleryController::class)->group(function ()
    {
        Route::get('/admin/gallery', 'index')->name('admin.gallery.index');
        Route::post('/admin/gallery', 'store')->name('admin.gallery.store');
        Route::get('/admin/gallery/edit/{id}', 'edit')->name('admin.gallery.edit');
        Route::put('/admin/gallery/update/{id}', 'update')->name('admin.gallery.update');
        Route::delete('/admin/gallery/delete/{id}', 'destroy')->name('admin.gallery.delete');
    });
    Route::controller(SliderController::class)->group(function ()
    {
        Route::get('/admin/slider', 'index')->name('admin.slider.index');
        Route::get('/admin/slider/create', 'create')->name('admin.slider.create');
        Route::post('/admin/slider/store', 'store')->name('admin.slider.store');
        Route::get('/admin/slider/edit/{id}', 'edit')->name('admin.slider.edit');
        Route::put('/admin/slider/update/{id}', 'update')->name('admin.slider.update');
        Route::delete('/admin/slider/delete/{id}', 'destroy')->name('admin.slider.delete');
    });
    Route::controller(ServiceController::class)->group(function ()
    {
        Route::get('/admin/service', 'index')->name('admin.service.index');

        Route::post('/admin/service/store', 'store')->name('admin.service.store');
        Route::get('/admin/service/edit/{id}', 'edit')->name('admin.service.edit');
        Route::put('/admin/service/update/{id}', 'update')->name('admin.service.update');
        Route::delete('/admin/service/delete/{id}', 'destroy')->name('admin.service.delete');
    });
    Route::controller(TestimonialController::class)->group(function ()
    {
        Route::get('/admin/testimonial', 'index')->name('admin.testimonial.index');

        Route::post('/admin/testimonial/store', 'store')->name('admin.testimonial.store');
        Route::get('/admin/testimonial/edit/{id}', 'edit')->name('admin.testimonial.edit');
        Route::put('/admin/testimonial/update/{id}', 'update')->name('admin.testimonial.update');
        Route::delete('/admin/testimonial/delete/{id}', 'destroy')->name('admin.testimonial.delete');
    });
    Route::controller(ContactController::class)->group(function ()
    {
        Route::get('/admin/contacts', 'index')->name('admin.contact.index');

        Route::post('/admin/contact/store', 'store')->name('admin.contact.store');
        Route::get('/admin/contact/edit/{id}', 'edit')->name('admin.contact.edit');
        Route::put('/admin/contact/update/{id}', 'update')->name('admin.contact.update');
        Route::delete('/admin/contact/delete/{id}', 'destroy')->name('admin.contact.delete');
    });

    Route::controller(TeamController::class)->group(function ()
    {
        Route::get('/admin/teams', 'index')->name('admin.team.index');
        Route::get('/admin/team-view/{id}', 'show')->name('admin.team.show');
        Route::get('/admin/team/create', 'create')->name('admin.team.create');
        Route::post('/admin/team/store', 'store')->name('admin.team.store');
        Route::get('/admin/team/edit/{id}', 'edit')->name('admin.team.edit');
        Route::put('/admin/team/update/{id}', 'update')->name('admin.team.update');
        Route::delete('/admin/team/delete/{id}', 'destroy')->name('admin.team.delete');
    });
    Route::controller(RoleController::class)->group(function ()
    {
        Route::get('/admin/roles', 'index')->name('admin.role.index');
        Route::post('/admin/role/store', 'store')->name('admin.role.store');
        Route::get('/admin/role/edit/{id}', 'edit')->name('admin.role.edit');
        Route::put('/admin/role/update/{id}', 'update')->name('admin.role.update');
        Route::delete('/admin/teamrole/delete/{id}', 'destroy')->name('admin.role.delete');
    });

    Route::controller(PageController::class)->group(function ()
    {
        Route::get('/admin/pages', 'index')->name('admin.page.index');
        Route::get('/admin/page/create', 'create')->name('admin.page.create');
        Route::post('/admin/page/store', 'store')->name('admin.page.store');
        Route::get('/admin/page/edit/{id}', 'edit')->name('admin.page.edit');
        Route::put('/admin/page/update/{id}', 'update')->name('admin.page.update');
        Route::delete('/admin/page/delete/{id}', 'destroy')->name('admin.page.delete');
    });
    Route::controller(SisterConcernController::class)->group(function ()
    {
        Route::get('/admin/sister-concerns', 'index')->name('admin.concern.index');
        Route::get('/admin/sister-concern/create', 'create')->name('admin.concern.create');
        Route::post('/admin/sister-concern/store', 'store')->name('admin.concern.store');
        Route::get('/admin/sister-concern/edit/{id}', 'edit')->name('admin.concern.edit');
        Route::put('/admin/sister-concern/update/{id}', 'update')->name('admin.concern.update');
        Route::delete('/admin/sister-concern/delete/{id}', 'destroy')->name('admin.concern.delete');
    });
    Route::controller(SettingController::class)->group(function ()
    {
        Route::get('/admin/settings', 'index')->name('admin.setting.index');
        Route::patch('/admin/setting/logo', 'logo')->name('admin.setting.logo');
        Route::patch('/admin/setting/footer-logo', 'footerLogo')->name('admin.setting.footer.logo');
        Route::patch('/admin/setting/favicon', 'favicon')->name('admin.setting.favicon');
        Route::patch('/admin/setting/address', 'address')->name('admin.setting.address');
        Route::patch('/admin/setting/phone-1', 'phoneOne')->name('admin.setting.phone.first');
        Route::patch('/admin/setting/phone-2', 'phoneTwo')->name('admin.setting.phone.second');
        Route::patch('/admin/setting/email', 'email')->name('admin.setting.email');
        Route::patch('/admin/setting/facebok', 'facebook')->name('admin.setting.facebook');
        Route::patch('/admin/setting/twitter', 'twitter')->name('admin.setting.twitter');
        Route::patch('/admin/setting/whatsapp', 'whatsapp')->name('admin.setting.whatsapp');
        Route::patch('/admin/setting/linkedin', 'linkedin')->name('admin.setting.linkedin');
        Route::patch('/admin/setting/instagram', 'instagram')->name('admin.setting.instagram');
        Route::patch('/admin/setting/mail-sender', 'mailSender')->name('admin.setting.sender');
        Route::patch('/admin/setting/sender-password', 'senderPassword')->name('admin.setting.sender.password');
        Route::patch('/admin/setting/seo-title', 'seoTitle')->name('admin.setting.footer.seoTitle');
        Route::patch('/admin/setting/seo-keyword', 'seoKeyword')->name('admin.setting.footer.seoKeyword');
        Route::patch('/admin/setting/seo-description', 'seoDescription')->name('admin.setting.footer.seoDescription');
        Route::patch('/admin/setting/location-map', 'locationMap')->name('admin.setting.footer.locationMap');
        Route::patch('/admin/setting/copyright-text', 'copyRightText')->name('admin.setting.footer.copyText');

    });
    Route::controller(PhaseController::class)->group(function ()
    {
        Route::get('/admin/phases', 'index')->name('admin.phase.index');
        Route::post('/admin/phase/store', 'store')->name('admin.phase.store');
        Route::get('/admin/phase/edit/{id}', 'edit')->name('admin.phase.edit');
        Route::put('/admin/phase/update/{id}', 'update')->name('admin.phase.update');
        Route::delete('/admin/phase/delete/{id}', 'destroy')->name('admin.phase.delete');
    });
    Route::controller(CategoryController::class)->group(function ()
    {
        Route::get('/admin/categories', 'index')->name('admin.category.index');
        Route::post('/admin/category/store', 'store')->name('admin.category.store');
        Route::get('/admin/category/edit/{id}', 'edit')->name('admin.category.edit');
        Route::put('/admin/category/update/{id}', 'update')->name('admin.category.update');
        Route::delete('/admin/category/delete/{id}', 'destroy')->name('admin.category.delete');
    });
    Route::controller(LocationController::class)->group(function ()
    {
        Route::get('/admin/locations', 'index')->name('admin.location.index');
        Route::post('/admin/location/store', 'store')->name('admin.location.store');
        Route::get('/admin/location/edit/{id}', 'edit')->name('admin.location.edit');
        Route::put('/admin/location/update/{id}', 'update')->name('admin.location.update');
        Route::delete('/admin/location/delete/{id}', 'destroy')->name('admin.location.delete');
    });
    Route::controller(TypeController::class)->group(function ()
    {
        Route::get('/admin/types', 'index')->name('admin.type.index');
        Route::post('/admin/type/store', 'store')->name('admin.type.store');
        Route::get('/admin/type/edit/{id}', 'edit')->name('admin.type.edit');
        Route::put('/admin/type/update/{id}', 'update')->name('admin.type.update');
        Route::delete('/admin/type/delete/{id}', 'destroy')->name('admin.type.delete');
    });
    Route::controller(AwardController::class)->group(function ()
    {
        Route::get('/admin/awards', 'index')->name('admin.award.index');
        Route::post('/admin/award/store', 'store')->name('admin.award.store');
        Route::get('/admin/award/edit/{id}', 'edit')->name('admin.award.edit');
        Route::put('/admin/award/update/{id}', 'update')->name('admin.award.update');
        Route::delete('/admin/award/delete/{id}', 'destroy')->name('admin.award.delete');
    });
    Route::controller(ClientController::class)->group(function ()
    {
        Route::get('/admin/clients', 'index')->name('admin.client.index');
        Route::post('/admin/client/store', 'store')->name('admin.client.store');
        Route::get('/admin/client/edit/{id}', 'edit')->name('admin.client.edit');
        Route::put('/admin/client/update/{id}', 'update')->name('admin.client.update');
        Route::delete('/admin/client/delete/{id}', 'destroy')->name('admin.client.delete');
    });
    Route::controller(SectionController::class)->group(function ()
    {
        Route::get('/admin/sections', 'index')->name('admin.section.index');
        Route::get('/admin/section/edit/{id}', 'edit')->name('admin.section.edit');
        Route::put('/admin/section/update/{id}', 'update')->name('admin.section.update');
    });
    Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.message.index');;
    Route::controller(ProjectController::class)->group(function ()
    {
        Route::get('/admin/projects', 'index')->name('admin.project.index');
        Route::get('/admin/project/create', 'create')->name('admin.project.create');
        Route::post('/admin/project/store', 'store')->name('admin.project.store');
        Route::get('/admin/project/edit/{id}', 'edit')->name('admin.project.edit');
        Route::get('/admin/project/edit-gallery/{id}', 'editGallery')->name('admin.project.edit.gallery');
        Route::patch('/admin/project/update/{id}', 'update')->name('admin.project.update');
        Route::patch('/admin/project/update-banner/{id}', 'updateBanner')->name('admin.project.update.banner');
        Route::post('/admin/project/add-slider/{id}', 'AddSlider')->name('admin.project.add.slider');
        Route::post('/admin/project/add-gallery/{id}', 'AddGallery')->name('admin.project.add.gallery');
        Route::post('/admin/project/add-video/{id}', 'AddVideo')->name('admin.project.add.video');
        Route::delete('/admin/project/delete/{id}', 'destroy')->name('admin.project.delete');
        Route::delete('/admin/project/gallery-delete/{id}', 'deleteGalleryItem')->name('admin.project.delete.gallery');
    });
});