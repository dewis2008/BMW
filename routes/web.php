<?php

use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\GalleryItemController;
use App\Http\Controllers\Auth\AdminSessionController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuoteRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('quote-requests', [QuoteRequestController::class, 'store'])
    ->middleware('throttle:quote-submissions')
    ->name('quoteRequests.store');

Route::post('contact-messages', [ContactMessageController::class, 'store'])
    ->middleware('throttle:contact-submissions')
    ->name('contactMessages.store');

Route::middleware('guest')->group(function (): void {
    Route::get('admin/login', [AdminSessionController::class, 'create'])->name('admin.login');
    Route::post('admin/login', [AdminSessionController::class, 'store'])->name('admin.login.store');
});

Route::post('admin/logout', [AdminSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.logout');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function (): void {
        Route::redirect('/', '/admin/enquiries')->name('dashboard');
        Route::get('enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
        Route::get('enquiries/{source}/{enquiry}', [EnquiryController::class, 'show'])->name('enquiries.show');
        Route::patch('enquiries/{source}/{enquiry}', [EnquiryController::class, 'update'])->name('enquiries.update');
        Route::delete('enquiries/{source}/{enquiry}', [EnquiryController::class, 'destroy'])->name('enquiries.destroy');
        Route::resource('gallery-items', GalleryItemController::class)
            ->except(['show'])
            ->names('galleryItems');
    });
