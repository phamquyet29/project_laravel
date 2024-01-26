    <?php

    use App\Http\Controllers\CartController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProductsController;
    use App\Http\Controllers\CategoriesController;
    use App\Http\Controllers\ProductUseController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\AccoutController;
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

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
        Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
        Route::get('/users/{user}', [AccoutController::class, 'index'])->name('accout.index');
        Route::get('/users/{user}', [AccoutController::class, 'show'])->name('users.show');
        Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
        Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
        Route::get('/users', [AccoutController::class, 'index'])->name('users.index');
    });     
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');


    Route::get('/', [ProductUseController::class, 'index'])->name('welcome');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [ProductsController::class, 'showCart'])->name('cart.show');
    Route::get('/cart/show', [ProductsController::class,'showCart'])->name('cart.show');
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/users', AccoutController::class);
