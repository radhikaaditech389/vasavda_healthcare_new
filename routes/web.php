<?php

use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FooterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PatientServiceController;
use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\WhyVasavadasController;

// Route::get('/', function () {
//     return view('welcome');
// });

// sitemap route
Route::get('sitemap.xml', function () {
    return response()->view('sitemap')->header('Content-Type', 'xml');
});

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about_us', [HomeController::class, 'about_us'])->name('about_us');

Route::get('/contact_us', [HomeController::class, 'contact'])->name('contact');

Route::get('/appointment', [HomeController::class, 'book_appointment'])->name('appointment');

Route::get('/facilities', [HomeController::class, 'facilities'])->name('facilities');

Route::get('/home_care_service', [HomeController::class, 'home_care'])->name('homecareservices');

Route::get('/doctors', [HomeController::class, 'doctors'])->name('doctors');

Route::get('/why_vasavada', [HomeController::class, 'why_vasavada'])->name('why_vasavada');

Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');

Route::get('/3d_4d_sonography', [HomeController::class, 'sonography'])->name('service.sonography');
Route::get('/gynec_cancer_care', [HomeController::class, 'cancer_care'])->name('service.cancer_care');
Route::get('/special_clinics', [HomeController::class, 'clinic'])->name('service.clinic');
Route::get('/cosmetic_gynecology', [HomeController::class, 'cosmetic_gynecology'])->name('service.cosmetic_gynecology');
Route::get('/dietitian', [HomeController::class, 'dietitian'])->name('service.dietitian');
Route::get('/home_care', [HomeController::class, 'service_home_care'])->name('service.home_care');
Route::get('/infertility', [HomeController::class, 'interfertility'])->name('service.interfertility');
Route::get('/laparoscopy_and_hysteroscopy', [HomeController::class, 'laproscopy'])->name('service.laproscopy');
Route::get('/mental_health', [HomeController::class, 'mental_health'])->name('service.mental_health');
Route::get('/pediatric', [HomeController::class, 'pediatric'])->name('service.pediatric');
Route::get('/physiotherapy_and_antenatal_anc_classes', [HomeController::class, 'physiotherpy'])->name('service.physiotherpy');
Route::get('/pregnancy_care_delivery', [HomeController::class, 'pragnancy_care'])->name('service.pragnancy_care');
Route::get('/preventive_oncogynecology_health_checkup', [HomeController::class, 'preventive_oncocgynocology'])->name('service.preventive_oncogynocology');
Route::get('/sexual_health', [HomeController::class, 'sexual_health'])->name('service.sexual_health');
Route::get('/urogynocology', [HomeController::class, 'urogynocology'])->name('service.urogynocology');
Route::get('/vacination', [HomeController::class, 'vacination'])->name('service.vacination');

Route::get('/services', [HomeController::class, 'service'])->name('service');

Route::get('/dr_mitali', [HomeController::class, 'dr_mitali'])->name('dr_mitali');

Route::get('/clinic_inner_page', [HomeController::class, 'clinic_inner_page'])->name('clinic_inner_page');

Route::get('/setu_newborn', [HomeController::class, 'setu_newborn'])->name('setu_newborn');

Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/admin/patients', [AppointmentController::class, 'index'])->name('admin.patients.list');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/admin/contact_list', [ContactController::class, 'index'])->name('admin.contact.list');

//Menu routes
Route::get('/admin/menu', [MenuController::class, 'index'])->name('admin.menu');
Route::post('/admin/menu', [MenuController::class, 'store'])->name('admin.menu.store');
Route::put('admin/menu/update/{id}', [MenuController::class, 'update'])->name('admin.menu.update');
Route::delete('admin/menu/delete/{id}', [MenuController::class, 'destroy'])->name('admin.menu.delete');
// Update menu sequence
Route::post('/menus/update-sequence', [MenuController::class, 'updateSequence'])
    ->name('menus.updateSequence');

//Submenu routes
Route::get('/admin/submenu', [MenuController::class, 'createSubmenu'])->name('submenu.create');
Route::post('/admin/submenu', [MenuController::class, 'storeSubmenu'])->name('submenu.store');
Route::put('admin/submenu/update/{id}', [MenuController::class, 'updateSubmenu'])->name('admin.submenu.update');
Route::delete('admin/submenu/delete/{id}', [MenuController::class, 'destroySubmenu'])->name('admin.submenu.delete');

// Slider routes - make sure these routes are defined BEFORE any other admin routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/slider', [SliderController::class, 'index'])->name('admin.slider');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('admin.slider.store');
    Route::put('/slider/update/{id}', [SliderController::class, 'update'])->name('admin.slider.update');
    Route::delete('/slider/delete/{id}', [SliderController::class, 'destroy'])->name('admin.slider.delete');
});

// Patient Service routes
Route::get('/admin/add_services', [PatientServiceController::class, 'index'])->name('admin.add_services');
Route::post('/admin/add_services', [PatientServiceController::class, 'store'])->name('admin.add_services.store');

Route::get('/admin/services/{id}/patient-services', [PatientServiceController::class, 'getPatientServices']);

Route::put('/admin/services/update', [PatientServiceController::class, 'update'])->name('admin.add_services.update');

Route::delete(
    '/admin/services/{serviceId}/patient-services/{patientServiceId}',
    [PatientServiceController::class, 'deletePatientService']
)
    ->name('admin.patient-services.delete');

Route::post('/admin/services/store', [PatientServiceController::class, 'store'])->name('admin.services.store');
Route::post('/admin/services/update/{id}', [PatientServiceController::class, 'update'])->name('admin.services.update');

Route::delete('/admin/services/{id}', [PatientServiceController::class, 'destroy'])->name('admin.services.destroy');

// About Section routes
Route::get('/admin/about_section', [AboutSectionController::class, 'index'])->name('admin.about_section');
Route::post('/admin/about_section', [AboutSectionController::class, 'store'])->name('admin.about_section.store');
Route::put('/admin/about_section', [AboutSectionController::class, 'update'])->name('admin.about_section.update');
Route::delete('/admin/about_section/{id}', [AboutSectionController::class, 'destroy'])->name('admin.about_section.delete');

Route::get('/admin/about_section/{id}/education', [AboutSectionController::class, 'getEducation']);
Route::delete('/admin/about_section/image/{imageId}', [AboutSectionController::class, 'deleteImage']);

// Doctors section routes
Route::get('/admin/doctors', [DoctorsController::class, 'index'])->name('admin.doctors');
Route::post('/admin/doctors', [DoctorsController::class, 'store'])->name('admin.doctors.store');
Route::put('/admin/doctors/{id}', [DoctorsController::class, 'update'])->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', [DoctorsController::class, 'destroy'])->name('admin.doctors.destroy');

// Docttor details routes
Route::get('/admin/doctor/details', [DoctorsController::class, 'doctorDetails'])->name('admin.doctor.details');
Route::post('/admin/doctor/details', [DoctorsController::class, 'storeDoctorDetails'])->name('admin.doctor.details.store');
Route::put('/admin/doctor/details/{id}', [DoctorsController::class, 'updateDoctorDetails'])->name('admin.doctor.details.update');
Route::delete('/admin/doctor/details/{id}', [DoctorsController::class, 'destroyDoctorDetails'])->name('admin.doctor.details.destroy');

// FAQ section routes
Route::get('/admin/faq', [FaqController::class, 'index'])->name('admin.faq');
Route::post('/admin/faq', [FaqController::class, 'store'])->name('admin.faq.store');
Route::put('admin/faq/update/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
Route::delete('admin/faq/delete/{id}', [FaqController::class, 'destroy'])->name('admin.faq.delete');

// Footer section routes
Route::get('/admin/footer', [FooterController::class, 'index'])->name('admin.footer');
Route::post('/admin/footer', [FooterController::class, 'store'])->name('admin.footer.store');
Route::put('admin/footer/update/{id}', [FooterController::class, 'update'])->name('admin.footer.update');
Route::delete('admin/footer/delete/{id}', [FooterController::class, 'destroy'])->name('admin.footer.delete');

// Route::get('/explore_our_space', function () {
//     return view('patient.360_view');
// });

Route::get('/explore_our_space', [HomeController::class, 'explore_our_space'])->name('360_view');

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Why Vasavada's section routes
Route::get('/admin/why_vasavada', [WhyVasavadasController::class, 'index'])->name('admin.why_vasavada');
Route::get('/admin/why_vasavada/{id}/edit', [WhyVasavadasController::class, 'edit'])->name('admin.why_vasavada.edit');
Route::post('/admin/why_vasavada', [WhyVasavadasController::class, 'store'])->name('admin.why_vasavada.store');
Route::put('/admin/why_vasavada/update/{id}', [WhyVasavadasController::class, 'update'])->name('admin.why_vasavada.update');
Route::delete('admin/why_vasavada/delete/{id}', [WhyVasavadasController::class, 'destroy'])->name('admin.why_vasavada.delete');
