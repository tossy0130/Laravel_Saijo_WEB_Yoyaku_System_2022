<?php

// === コントローラー読み込み ===
use App\Http\Controllers\WebYoyakuController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\WarekiController;
use App\Http\Controllers\InformController;
use App\Http\Controllers\PdfOutputController;
use App\Http\Controllers\ShisetuController;
use App\Http\Controllers\SyokisetteiController;
use App\Http\Controllers\UserhosyuController;

// === コントローラー読み込み END ===

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/**
 *  ==================　ユーザー使用画面　（表　WEB側） ====================
 */
// Route::get('/', 'WebYoyakuController@index');

Route::get('/', [WebYoyakuController::class, 'index'])->name('yoyaku.index');

// ログイン　フォーム画面へ遷移
Route::get('/yoyaku/login', [WebYoyakuController::class, 'go_login'])->name('yoyaku.login');
// ログイン 後画面へ遷移
Route::post('/yoyaku/login', [WebYoyakuController::class, 'in_to_login'])->name('yoyaku.login_in');
Route::get('/yoyaku/login_top', [WebYoyakuController::class, 'login_top'])->name('yoyaku.login_top');

//=== カレンダー => 予約フォーム
Route::get('/yoyaku/yoyaku_form', [WebYoyakuController::class, 'yoyaku_form'])->name('yoyaku.yoyaku_form');
Route::post('/yoyaku/yoyaku_form', [WebYoyakuController::class, 'yoyaku_form_store'])->name('yoyaku.yoyaku_form_store');

Route::get('/yoyaku/yoyaku_confirm', [WebYoyakuController::class, 'yoyaku_confirm'])->name('yoyaku.yoyaku_confirm');
Route::post('/yoyaku/yoyaku_confirm', [WebYoyakuController::class, 'yoyaku_confirm_send'])->name('yoyaku.yoyaku_confirm_send');

Route::get('/yoyaku/yoyaku_complete', [WebYoyakuController::class, 'yoyaku_complete'])->name('yoyaku.yoyaku_complete');

// === ユーザー保守画面
Route::get('/yoyaku/user_hosyu', [UserhosyuController::class, 'index'])->name('yoyaku.user_hosyu');
// パスワード変更処理
Route::post('yoyaku/user_hosyu', [WebYoyakuController::class, 'pass_change'])->name('yoyaku.pass');


// === 管理画面 ===
Route::get('/kanri', [WebYoyakuController::class, 'go_kanri'])->name('kanri.index');
Route::get('/kanri_menu', [WebYoyakuController::class, 'go_kanri_top'])->name('kanri_menu.index');

// 予約状況
Route::get('/yoyaku/yoyaku_joukyou', [WebYoyakuController::class, 'yoyaku_joukyou'])->name('yoyaku.yoyaku_joukyou');




/**
 *  ==================　ユーザー使用画面　（表　WEB側）END ====================
 */

// =============== お知らせ案内 ================
Route::group(['prefix' => 'news'], function () {
    // 一覧表示
    Route::get('/', [InformationController::class, 'index'])->name('news.index');
    // 新規作成
    Route::get('create', [InformationController::class, 'create'])->name('news.create');
    // 新規 フォーム保存 post
    Route::post('store', [InformationController::class, 'store'])->name('news.store');
    // 詳細ページ
    Route::get('show/{id}', [InformationController::class, 'show'])->name('news.show');
});


Route::group(['prefix' => 'info'], function () {
    // 一覧表示
    Route::get('/', [InformController::class, 'index'])->name('info.index');
    // 新規登録　画面表示
    Route::get('/create', [InformController::class, 'create'])->name('info.create');
    // 新規登録処理
    Route::post('/store', [InformController::class, 'store'])->name('info.store');
    // 詳細画面
    Route::get('/show/{id}', [InformController::class, 'show'])->name('info.show');
    // 編集
    Route::get('/edit/{id}', [InformController::class, 'edit'])->name('info.edit');
    // 編集処理
    Route::post('/update/{id}', [InformController::class, 'update'])->name('info.update');
    // 削除
    Route::post('/destroy{id}', [InformController::class, 'destroy'])->name('info.destroy');
});



//================ 和暦 =================
Route::group(['prefix' => 'wareki'], function () {
    // 一覧表示
    Route::get('/', [WarekiController::class, 'index'])->name('wareki.index');
    // 新規作成 画面表示
    Route::get('/create', [WarekiController::class, 'create'])->name('wareki.create');
    // 新規登録処理
    Route::post('/store', [WarekiController::class, 'store'])->name('wareki.store');
    // 詳細画面
    Route::get('/show/{id}', [WarekiController::class, 'show'])->name('wareki.show');
    // 編集
    Route::get('/edit/{id}', [WarekiController::class, 'edit'])->name('wareki.edit');
    // 編集　登録処理
    Route::post('/update/{id}', [WarekiController::class, 'update'])->name('wareki.update');
    // 削除
    Route::post('/destroy{id}', [WarekiController::class, 'destroy'])->name('wareki.destroy');
});

/**
 *  施設
 */
Route::get('/sisetu', [ShisetuController::class, 'index'])->name('sisetu.index');
/*
* 初期設定 = 基本情報設定
*/
Route::get('/syokisettei', [SyokisetteiController::class, 'index'])->name('syokisettei.index');
/**
 *  PDF 書類 [許可申請書] 
 */
Route::get('/output/pdf', [PdfOutputController::class, 'output'])->name('pdf.pdf_output');
/*
*  PDF 書類 [分骨証明申請書]
*/
Route::get('/output/bunkotu', [PdfOutputController::class, 'bunkotu_pdf'])->name('pdf.pdf_bunkotu_output');
