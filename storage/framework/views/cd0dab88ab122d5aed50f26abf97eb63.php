<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop - Trang chủ</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body class="font-sans bg-gray-50">
    <!-- Header/Navigation -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-serif text-pink-600 font-bold">Flower Shop</a>
            <nav class="hidden md:flex space-x-8">
                <a href="<?php echo e(route('home')); ?>" class="text-gray-800 hover:text-pink-600">Trang chủ</a>
                <a href="<?php echo e(route('products.index')); ?>" class="text-gray-800 hover:text-pink-600">Sản phẩm</a>
                <a href="<?php echo e(route('about')); ?>" class="text-gray-800 hover:text-pink-600">Về chúng tôi</a>
                <a href="<?php echo e(route('contact')); ?>" class="text-gray-800 hover:text-pink-600">Liên hệ</a>
            </nav>
            <div class="flex items-center space-x-4">
                <a href="<?php echo e(route('cart')); ?>" class="text-gray-800 hover:text-pink-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </a>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('user.dashboard')); ?>" class="text-gray-800 hover:text-pink-600">Tài khoản</a>
                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="text-gray-800 hover:text-pink-600">Đăng xuất</button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="text-gray-800 hover:text-pink-600">Đăng nhập</a>
                    <a href="<?php echo e(route('register')); ?>" class="text-gray-800 hover:text-pink-600">Đăng ký</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Hero Banner -->
    <section class="bg-pink-50 py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-serif text-pink-700 mb-6">Welcome to Flower Shop</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-8">Khám phá thế giới hoa tươi đẹp nhất</p>
            <a href="<?php echo e(route('products.index')); ?>" class="bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 rounded-full font-medium transition duration-300">Mua ngay</a>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-serif text-center text-gray-800 mb-12">Sản phẩm nổi bật</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php $__currentLoopData = \App\Models\Product::take(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <div class="relative">
                            <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-64 object-cover" onerror="this.src='https://via.placeholder.com/600x600?text=Image+Not+Found'">
                            <?php if($product->discount > 0): ?>
                                <div class="absolute top-4 right-4 bg-pink-600 text-white px-3 py-1 rounded-full text-sm">-<?php echo e($product->discount); ?>%</div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo e($product->name); ?></h3>
                            <div class="flex items-center mb-4">
                                <span class="text-pink-600 font-bold text-lg"><?php echo e(number_format($product->price, 2)); ?> VND</span>
                                <?php if($product->discount > 0): ?>
                                    <span class="text-gray-400 line-through ml-2"><?php echo e(number_format($product->original_price, 2)); ?> VND</span>
                                <?php endif; ?>
                            </div>
                            <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="w-full bg-pink-100 hover:bg-pink-200 text-pink-700 py-2 rounded transition duration-300">Thêm vào giỏ</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="text-center mt-10">
                <a href="<?php echo e(route('products.index')); ?>" class="inline-block border-2 border-pink-600 text-pink-600 hover:bg-pink-600 hover:text-white px-6 py-2 rounded-full transition duration-300">Xem tất cả sản phẩm</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-serif mb-4">Flower Shop</h3>
                    <p class="text-gray-300">Mang đến những bó hoa tươi đẹp nhất cho mọi dịp đặc biệt trong cuộc sống của bạn.</p>
                </div>
                <div>
                    <h3 class="text-xl font-serif mb-4">Liên kết</h3>
                    <ul class="space-y-2">
                        <li><a href="<?php echo e(route('about')); ?>" class="text-gray-300 hover:text-white">Về chúng tôi</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>" class="text-gray-300 hover:text-white">Liên hệ</a></li>
                        <li><a href="<?php echo e(route('policy')); ?>" class="text-gray-300 hover:text-white">Chính sách</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-serif mb-4">Liên hệ</h3>
                    <p class="text-gray-300">123 Đường Hoa Hồng, Quận 1</p>
                    <p class="text-gray-300">Email: info@flowershop.com</p>
                    <p class="text-gray-300">Điện thoại: 0123 456 789</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>© 2025 Flower Shop. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
<?php /**PATH D:\web_gk_nc\resources\views/home.blade.php ENDPATH**/ ?>