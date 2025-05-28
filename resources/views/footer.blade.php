<footer class="bg-gradient-to-tr from-emerald-50 via-white to-indigo-50 border-t-4 border-emerald-400 rounded-t-2xl shadow-xl mt-12">
    <div class="container mx-auto px-4 py-8 md:py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
            <!-- Logo & Description -->
            <div class="mb-6 md:mb-0 flex flex-col justify-between">
                <a href="{{ url('/') }}">
                    <x-application-mark class="w-20 mb-2" />
                </a>
                <p class="text-gray-500 text-sm mb-3">
                    RNFINTECH is your trusted portal for comparing, applying, and tracking loans from multiple banks and NBFCs.
                </p>
                <div class="flex space-x-2 mt-2">
                    <img src="https://cdn-icons-png.flaticon.com/512/3064/3064197.png" alt="Secure" title="256-bit Secure" class="h-6 w-6" />
                    <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" alt="RBI Trusted" title="RBI Trusted" class="h-6 w-6" />
                    <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="ISO Certified" title="ISO Certified" class="h-6 w-6" />
                </div>
            </div>
            <!-- Quick Links + Contact -->
            <div class="col-span-1 md:col-span-2 flex flex-col gap-6">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-emerald-700 font-semibold mb-2">Quick Links</h4>
                        <ul class="space-y-1">
                            <li><a href="{{ url('/') }}" class="text-gray-600 hover:text-emerald-600 text-sm">Home</a></li>
                            <li><a href="#features" class="text-gray-600 hover:text-emerald-600 text-sm">Features</a></li>
                            <li><a href="{{ route('documentation') }}" class="text-gray-600 hover:text-emerald-600 text-sm">Documentation</a></li>
                            <li><a href="{{ route('login') }}" class="text-gray-600 hover:text-emerald-600 text-sm">Login</a></li>
                            <li><a href="{{ route('register') }}" class="text-gray-600 hover:text-emerald-600 text-sm">Register</a></li>
                        </ul>
                    </div>
                    <!-- Contact Info -->
                    <div>
                        <h4 class="text-emerald-700 font-semibold mb-2">Contact</h4>
                        <ul class="space-y-1 text-gray-600 text-sm">
                            <li><i class="fa fa-envelope mr-2 text-emerald-500"></i> support@rnfintech.com</li>
                            <li><i class="fa fa-phone mr-2 text-emerald-500"></i> +91 12345 67890</li>
                            <li><i class="fa fa-map-marker-alt mr-2 text-emerald-500"></i> Mumbai, India</li>
                        </ul>
                    </div>
                </div>
                <!-- Social Media -->
                <div>
                    <h4 class="text-emerald-700 font-semibold mb-2">Follow Us</h4>
                    <div class="flex space-x-3 mb-1">
                        <a href="https://wa.me/911234567890" target="_blank" class="text-emerald-500 hover:text-emerald-700 text-xl" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://facebook.com/" target="_blank" class="text-indigo-600 hover:text-indigo-800 text-xl" title="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://instagram.com/" target="_blank" class="text-pink-600 hover:text-pink-800 text-xl" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://linkedin.com/" target="_blank" class="text-indigo-700 hover:text-indigo-900 text-xl" title="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="text-blue-400 hover:text-blue-600 text-xl" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                    <span class="text-xs text-gray-400">Stay connected for updates</span>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t mt-6 pt-3 pb-2 text-center text-gray-400 text-xs bg-emerald-50 rounded-b-2xl">
        &copy; {{ date('Y') }} RNFINTECH. All rights reserved.
    </div>
</footer>